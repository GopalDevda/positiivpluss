<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://aerodatabox.p.rapidapi.com/airports/search/location/23.1765/75.7885/km/100/16",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: aerodatabox.p.rapidapi.com",
		"x-rapidapi-key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo '<pre>';
	print_r(json_decode($response));
}