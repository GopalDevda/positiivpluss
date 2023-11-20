<?php
ini_set('max_execution_time', 0);



require 'vendor/autoload.php'; // Include the autoload file for Guzzle
use Goutte\Client;

// Database connection settings
$dsn = "mysql:host=localhost;dbname=positiiv_db";
$username = "root";
$password = "POS2022";

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

function fetchDataFromDatabase($db) {
    try {
        $query = "SELECT id, corporate_identification_number, company_name FROM all_company_data WHERE id NOT IN (SELECT company_id FROM company_details) LIMIT 100";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error executing database query: " . $e->getMessage());
    }
}

function searchCompanyOnWebsite($id, $companyName, $db) {
    $client = new Client();

    try {
        $crawler = $client->request('GET', 'https://tikshare.com/?gstsearch=' . urlencode($companyName));
        $resultDiv = $crawler->filter('.resultdiv');

        if ($resultDiv->count() > 0) {
            $pTags = $resultDiv->filter('p')->each(function ($node) {
                return $node->text();
            });

            $textBeforeRegistered = preg_match('/(.*?)(?= registered)/', $pTags[0], $matches) ? trim($matches[0]) : '';
            $gstinMatch = preg_match('/GSTIN (\w+)/', $pTags[0], $matches) ? $matches[1] : '';
            $textAfterGSTIN = $gstinMatch ? $gstinMatch : '';

            if ($textBeforeRegistered) {
                $similarity = similar_text($companyName, $textBeforeRegistered, $percent);
                echo "Similarity between company_name and textBeforeRegistered: $percent%\n";

                if ($percent >= 90) {
                    echo "Company name matches with the text by at least 95%.\n";
                    $companyExists = checkCompanyExists($id, $db);

                    if (!$companyExists) {
                        $modifiedPAn = remove2FromFrontAnd3FromBack($textAfterGSTIN);
                        insertCompanyDetail($id, $textAfterGSTIN, $modifiedPAn, $db);
                        echo "Inserted GST number for company with id $id\n";
                    }
                } else {
                    echo "Company name does not match with the text by at least 95%.\n";
                }
            }
        }
    } catch (Exception $e) {
        echo "Error during web scraping: " . $e->getMessage() . "\n";
    }
}

function checkCompanyExists($id, $db) {
    try {
        $query = "SELECT id FROM company_details WHERE company_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        die("Error checking company existence: " . $e->getMessage());
    }
}

function insertCompanyDetail($id, $gstNo, $panNo, $db) {
    try {
        $query = "INSERT INTO company_details (company_id, gst_no, pan_no) VALUES (:id, :gstNo, :panNo)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":gstNo", $gstNo);
        $stmt->bindParam(":panNo", $panNo);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error inserting company detail: " . $e->getMessage());
    }
}

function remove2FromFrontAnd3FromBack($text) {
    if (strlen($text) >= 5) {
        return strtoupper(substr($text, 2, -3));
    }
    return $text;
}

function main($db) {
    try {
        $data = fetchDataFromDatabase($db);
        $batchSize = 10;
        $promises = [];

        foreach ($data as $record) {
            searchCompanyOnWebsite($record['id'], $record['company_name'], $db);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

main($db);
