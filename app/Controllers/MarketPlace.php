<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Allcompanydata;
use App\Models\BookmarksModel;
use App\Models\ClaimProfile;
use App\Models\ClaimcompanydetailsModel;


use Config\Database;
// use FreeGeoIp\FreeGeoIp;

class MarketPlace extends BaseController
{
    private $db;
    private $MP_model;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->MP_model = new Allcompanydata();
    }
    // public function index()
    // {


    //     // $location = '2ND FLOOR, "ATHARVA" 22, VARAHMIHIR MARG, FREEGANJ UJJAIN , Ujjain Unclassified MP 456010';
    //     // $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($location) . "&key=AIzaSyB8hP5KbOAG4oguBSpDuCMjEKdBuY3X2Sc";
    //     // $response = file_get_contents($url);
    //     // $place = json_decode($response, true);
    //     // print_r($place);
    //     // $city = $place['results'][0]['address_components'][2]['long_name'];
    //     // $state = $place['results'][0]['address_components'][3]['long_name'];
    //     // print_r($city);
    //     // print_r($state);
    //     // die;


    //     if (!check_session()) return redirect()->to('home/user_login');
    //     $data = SidebarData();
    //     $data['pg_nm'] = "";
    //     $data['credits'] = $this->db->query('SELECT company_credit FROM supplier where id=' . session('supplier_info')['supplier_id'])->getResultArray()[0]['company_credit'];
    //     $uniqueNames = array();
    //     $datas = $this->db->query("SELECT principal_bussiness_activity_as_per_cin FROM `all_company_data` WHERE status=1 group by principal_bussiness_activity_as_per_cin limit 10")->getResultArray();
    //     foreach ($datas as $i => $item) $uniqueNames[$i] = $item['principal_bussiness_activity_as_per_cin'];
    //     $data['industry'] = $uniqueNames;
    //     $data['creditpacage'] = $this->db->query("SELECT * FROM `credit_package`  WHERE status=1 ")->getResultArray();
    //     echo view('brand/market_place', $data);
    // }
    public function index()
{
if (!check_session()) return redirect()->to('home/user_login');
$data = SidebarData();
$data['pg_nm'] = "";
$uniqueNames = array();
$cache = \Config\Services::cache();

$cacheKey = 'p_b_a_p_c';
$com_details = $cache->get($cacheKey);

if (!$com_details) {
$datas = $this->MP_model->select('principal_bussiness_activity_as_per_cin')->where("status=1 group by principal_bussiness_activity_as_per_cin")->findAll(10);
foreach ($datas as $i => $item) $uniqueNames[$i] = $item['principal_bussiness_activity_as_per_cin'];
$cache->save($cacheKey, $uniqueNames, 600); // 600 seconds (10 minutes)
}
$data['industry'] = $com_details;
$data['creditpacage'] = $this->db->query("SELECT * FROM `credit_package`  WHERE status=1 ")->getResultArray();
echo view('brand/market_place', $data);
}
    public function industry_search()
    {
        return json_encode($this->MP_model->like('principal_bussiness_activity_as_per_cin', $this->request->getVar('industry'), "after")->groupBy('principal_bussiness_activity_as_per_cin')->findcolumn('principal_bussiness_activity_as_per_cin'));
    }


    public function get_data_api()
    {
        function findComponenst($address_components, $type)
        {
            if (!empty($address_components)) {
                foreach ($address_components as $component) {
                    if (in_array($type, $component['types'])) {
                        return $component;
                    }
                }
            }
            return null;
        }

        $companyName = $this->request->getVar('filter');
        $industry = $this->request->getVar('industry');
        $locations =  $this->request->getVar('location');
        $query = $this->MP_model;
        if ($locations) {
            foreach ($locations as $kk => $value) {
                $location = $value;
                $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($location) . "&key=AIzaSyB8hP5KbOAG4oguBSpDuCMjEKdBuY3X2Sc";
                $response = file_get_contents($url);
                $place = json_decode($response, true);
                $city = findComponent($place['results'][0]['address_components'], 'locality');
                $state = findComponent($place['results'][0]['address_components'], 'administrative_area_level_1');
                if ($kk == 0) {
                    if ($city) $query = $query->groupStart()->like('registered_office_address', $location);
                    else if ($state) {
                        $locationss = trim($location, ", ");
                        $query = $query->groupStart()->like('registered_state', $locationss);
                    }
                } else {
                    if ($city) $query = $query->orlike('registered_office_address', $location);
                    else if ($state) {
                        $locationss = trim($location, ", ");
                        $query = $query->orlike('registered_state', $locationss);
                    }
                }
            }
            if ($kk == (count($locations) - 1)) $query = $query->groupEnd();
        }

        if ($companyName) {
            $query = $query->select('*,all_company_data.id as id')->join('company_details', 'company_details.company_id=all_company_data.id', 'left')
                ->groupStart()
                ->like('all_company_data.company_name', $companyName, 'after')
                ->orlike('all_company_data.corporate_identification_number', $companyName, 'after')
                ->groupEnd();
        }
        if ($industry) $query = $query->where('principal_bussiness_activity_as_per_cin', $industry);


        $append = $this->request->getVar('append');
        $data = $query->findAll(500);
        $BM = new BookmarksModel();


        $ab = $BM->where('supplier_id', session('supplier_info')['supplier_id'])->findColumn('company_id');
        if ($ab) $bookmarks = json_decode($ab[0]);
        if (!isset($bookmarks)) $bookmarks = [0];
        $d = [];
        foreach ($data as $key => $value) {

            // $locationname = $value['registered_office_address'];
            // $pattern = '/(?<=, )([^,]+) Unclassified/';
            // if (preg_match($pattern, $locationname, $matches)) {
            //     $city = $matches[1];
            // }
            // $location = $city . ',   ' . $value['registered_state'] . ',  IN';
            $d[] = [$value['pppid'], '<img src="' . (isset($value['company_logo']) ? $value['company_logo'] : 'https://img.freepik.com/premium-vector/abstract-logo-company-made-with-color_341269-925.jpg?w=360') . '" id="account-upload-img" class="round" alt="profile image" width="100">', $value['company_name'], $value['registered_office_address'], $value['principal_bussiness_activity_as_per_cin'], '<a href="' . base_url("MarketPlace/company_data") . '/' . $value['corporate_identification_number'] . '"><i class="fa fa-eye fa-xl"></i></a><i onclick="AddBookmark($(this),' . $value['id'] . ')" class="' . (in_array($value['id'], $bookmarks) ? 'fa' : 'fa-regular') . ' fa-star fa-xl ms-2 "></i>', $value['corporate_identification_number']];
        }
        if ($append) return json_encode(["data" => $d, "append" => 1]);
        else return json_encode(['data' => $d, 'append' => 0]);
    }
    public function companydata_api()
    {
        $companyName = $this->request->getVar('filter');

        $data = $this->MP_model->select('*,all_company_data.id as id')->join('company_details', 'company_details.company_id=all_company_data.id', 'left')
            ->groupStart()
            ->like('all_company_data.company_name', $companyName, 'after')
            ->orlike('all_company_data.corporate_identification_number', $companyName, 'after')
            ->groupEnd()->findAll(100);

        $append = $this->request->getVar('append');

        foreach ($data as $key => $value) {

            $locationname = $value['registered_office_address'];
            $pattern = '/(?<=, )([^,]+) Unclassified/';
            if (preg_match($pattern, $locationname, $matches)) {
                $city = $matches[1];
            }
            if ($city) {
                $location = $city . ',   ' . $value['registered_state'] . ',  IN';
            } else {
                $location = ' ' . ',   ' . $value['registered_state'] . ',  IN';
            }
            $d[] = [$value['pppid'], '<img src="' . (isset($value['company_logo']) ? $value['company_logo'] : 'https://img.freepik.com/premium-vector/abstract-logo-company-made-with-color_341269-925.jpg?w=360') . '" id="account-upload-img" class="round" alt="profile image" width="100">', $value['company_name'], $value['registered_office_address'], $value['principal_bussiness_activity_as_per_cin'], '<a href="' . base_url("MarketPlace/company_data") . '/' . $value['corporate_identification_number'] . '">', $value['corporate_identification_number'], $location];
        }
        if ($append) return json_encode(["data" => $d, "append" => 1]);
        else return json_encode(['data' => $d, 'append' => 0]);
    }

    public function AddBookmark()
    {
        $id = $this->request->getVar('id');
        $model = new BookmarksModel();
        $sp_id = session('supplier_info')['supplier_id'];
        $data = $model->where('supplier_id', $sp_id)->first('company_id');
        if (!$data) {
            $model->insert(['supplier_id' => $sp_id, 'company_id' => json_encode([$id])]);
            return json_encode(['status' => true]);
        } else {
            $old_data = json_decode($data['company_id']);
            $key = array_search($id, $old_data);
            if ($key !== false) unset($old_data[$key]);
            else $old_data[] = $id;
            if (!$old_data) {
                $model->delete($data['id']);
                return json_encode(['success' => true]);
            } else {
                if ($model->where('supplier_id', $sp_id)->update($data['id'], ['company_id' => json_encode(array_values($old_data))])) return json_encode(['success' => true]);
                else return json_encode(['success' => false]);
            }
        }
    }

    public function view_bookmarks()
    {
        if (!check_session()) return redirect()->to('home/user_login');
        $data = SidebarData();
        $data['state_id'] = $this->db->query("SELECT * FROM `states` WHERE country_id=101")->getResultArray();
        $data['pg_nm'] = "Market Place";
        $model = new BookmarksModel();
        $ab = $model->where('supplier_id', session('supplier_info')['supplier_id'])->first('company_id');
        if ($ab) $ids = json_decode($ab['company_id']);
        if (isset($ids)) $data['list'] = $this->MP_model->select('*,all_company_data.id as id')->join('company_details', 'company_details.company_id=all_company_data.id', 'left')->whereIn('all_company_data.id', $ids)->findAll();
        else $data['list'] = [];
        return view('brand/view_bookmarks', $data);
    }

    public function location()
    {
        $location = $this->request->getVar('location');
        $db = \Config\Database::connect();
        $data = $db->query("SELECT * FROM `states`  WHERE name LIKE  '%$location%'")->getResultArray();
        $res = '';
        foreach ($data as $name) {
            $res .= '<option value="' . $name['name'] . '">' . $name['name'] . '</option>';
        }
        echo $res;
    }

    public function company_data($id)
    {
        // $rs = check_session();
        // if (!$rs) {
        //     return redirect()->to('home/user_login');
        // }
        $data = SidebarData();
        $data['pg_nm'] = '';
        $db = \Config\Database::connect();
        if ($id) {
            // $data['company_data']  =  $db->query("SELECT * FROM `all_company_data` WHERE  MATCH(`corporate_identification_number`) AGAINST('$id')")->getResultArray();
            $data['company_data'] = $this->MP_model->select('*')->join('company_details', 'company_details.company_id=all_company_data.id', 'left')
                ->join('company_ownership', 'company_ownership.company_id=all_company_data.id', 'left')->where('all_company_data.corporate_identification_number', $id)->findAll();
            // print_r($data['company_data']);
            // die;

            $apiKey = "AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU"; // Replace with your Google Maps API key
            $address = $data['company_data'][0]['registered_office_address'];

            $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=" . $apiKey;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($response, true);
            $arr = [];
            if ($result['status'] == 'OK') {
                $location = $result['results'][0]['geometry']['location'];
                $arr['lat'] = $data['latitude'] = $location['lat'];
                $arr['lng'] = $data['longitude'] = $location['lng'];
            }

            $arr['name'] = $address;
            $countrylk[] = $arr;
            // print_r($countrylk);
            // die;
            $data['countryRohit'] = $countrylk;


            return view('brand/companyProfile', $data);
        }
    }

    public function company_data_api($id)
    {

        $db = \Config\Database::connect();
        if ($id) {

            // $dataa  =  $db->query("SELECT * FROM `all_company_data` WHERE  MATCH(`corporate_identification_number`) AGAINST('$id')")->getResultArray();
            $dataa =
                $this->MP_model->select('*')->join('company_details', 'company_details.company_id=all_company_data.id', 'left')
                ->join('company_ownership', 'company_ownership.company_id=all_company_data.id', 'left')->where('all_company_data.corporate_identification_number', $id)->first();
            return json_encode(["data" => $dataa]);

            // return view('brand/companyProfile', $data);
        }
    }

    public function update_credit()
    {
        $data  = $this->db->query('UPDATE supplier SET company_credit=(company_credit+' . $this->request->getVar('credit') . ') where id=' . session('supplier_info')['supplier_id']);


        return redirect()->back()->with('success', 'Comapny Credit Buy successfully');
    }

    public function claim_profile()
    {


        $random_number = rand(1000, 9999);
        $random_letter = chr(rand(65, 90));
        $uniq_number =   $random_number . $random_letter;
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $occupation = $this->request->getVar('occupation');
        $contact = $this->request->getVar('contact');
        $cinno = $this->request->getVar('cinno');
        $db = \Config\Database::connect();
        $data =
            [
                'cinno' => $cinno,
                'name' => $name,
                'email' => $email,
                'contact_no' => $contact,
                'association_company' => $occupation,
                'to_email' => 'info@utopiic.com',
                'uniq_number' => $uniq_number,
            ];
        $ClaimProfile = new ClaimProfile();
        $ClaimProfile->insert($data);
        $comdata =  $this->MP_model->select('company_name,pppid')->where('corporate_identification_number', $cinno)->first();
        $companyname = $comdata['company_name'];
        $pppid = $comdata['pppid'];
        // print_r($companyname);
        // die;
        $t = time();
        $msg = '';
        $msg .= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><p><p  style="margin-bottom:13px; margin-top:13px;">
       
        Dear PositiivPlus Team,<br><br>        
        You have received a profile claim submitted by ' . $name . ' for ' . $companyname . '. The claim includes the following details:<br><br>
        <b>Claim Information</b><br><br>
        Full Name:</b> ' . $name . '<br>
        Email Address: ' . $email . '<br>
        Association with Company: ' . $occupation . '<br>
        Contact Number: ' . $contact . '<br><br>
        <b> Company Information</b><br><br>        
         Company Profile Name: ' .  $companyname . ' <br><br>
        ' . $name . ' has submitted a claim regarding the profile information mentioned above.<br><br>
        Please move forward with next steps which involve look into the company profile claim and taking necessary actions. <br><br>
        Thank you for your attention to this claim.<br><br>
        Regards,<br><br>
        PositiivPlus Support Team</p></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white!important;">Copyright © ' . date("Y", $t) . ', All Right Reserved UTOPIIC</span><div style="float: right;margin-top: 5px;font-size: 10px;">' . date("d-m-Y H:i:s", $t) . '</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/facebook.png"  style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.com/public/socialicon/tw.png"></a></div></div></div>';

        $claim = 'PPPID - ' . $pppid . '  claim request- ' . $uniq_number;

        $reciveemail = 'info@utopiic.com';
        $email = \Config\Services::email();
        $email->setFrom('info@positiivplus.com', 'PositiivPlus');
        $email->setTo($reciveemail);
        $email->setSubject($claim);
        $email->setMessage($msg);
        $a = $email->send();
    }
    public function connect_with_us()
    {
        $email_model = new ClaimcompanydetailsModel();
        $mail_type = $this->request->getVar('mail_type');
        $data = [
            'name' => $this->request->getVar('fullname'),
            'email' => $this->request->getVar('email'),
            'company_organization_name' => $this->request->getVar('Companyname'),
            'contact' => $this->request->getVar('phone'),
            'designation' => $this->request->getVar('designation'),
        ];
        $email_model->insert($data);
        $email = \Config\Services::email();
        $email->setFrom('info@positiivplus.com', 'PositiivPlus');
        $email->setTo('info@utopiic.com');
        $t = time();
        if ($mail_type == 1) {
            $email->setSubject('Connnect with us');
            $message = '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><p><p  style="margin-bottom:13px; margin-top:13px;">You have received a "Connnect with us" request submitted by ' . $data['name'] . ' for ' . $data['company_organization_name'] . '. The request includes the following details:<br><br>Name :' . $data['name'] . '<br>
        Email :' . $data['email'] . '<br>
        Company/Organization Name :' . $data['company_organization_name'] . '<br>
        Contact :' . $data['contact'] . '<br>
        Designation :' . $data['designation'] . '<br>Thank you<br><br>Regards,<br>PositiivPlus Support Team</p></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white!important;">Copyright © ' . date("Y", $t) . ', All Right Reserved UTOPIIC</span><div style="float: right;margin-top: 5px;font-size: 10px;">' . date("d-m-Y H:i:s", $t) . '</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/facebook.png"  style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.com/public/socialicon/tw.png"></a></div></div></div>';
        } elseif ($mail_type == 3) {
            $email->setSubject('New Subscription to Stay Up-to-Date on Sustainability Topics');
            $message = "Dear PositiivPlus Team,<br><br>
You have a new subscriber who has expressed an interest in staying up-to-date on sustainability topics. The individual provided the following information:<br><br>
            Subscriber's Email: " . $data['email'] . "<br><br>
            The subscriber has shown interest in receiving our monthly updates to stay informed about sustainability matters. Please ensure that the new subscriber is added to our mailing list and receives our monthly updates promptly. <br><br>            
            Thank you for your continued support in our efforts to promote sustainability and share valuable insights with our audience.<br><br>
            Regards,<br>
            PositiivPlus Support Team";
        } elseif ($mail_type == 4) {
            $email->setSubject('New Request for "Free Trial - Become a Pro Planet Business"');
            $message = 'Dear PositiivPlus Team,<br><br>
        You have received an email from an individual who has expressed interest in becoming a pro-planet business by starting a free trial. The person provided the following information:<br><br>
        Email Address: ' . $data['email'] . '<br><br>
        This shows a significant interest in our mission to support environmentally responsible practices among businesses. Please ensure that the individual is promptly contacted and guided through the process to start their free trial.<br><br>
        We are excited to see a growing interest in our pro-planet business initiative and look forward to onboarding this new member.<br><br>
        Thank you for your continued support in our efforts to promote sustainability and eco-friendly practices.<br><br>
        Regards,<br>
        PositiivPlus Support Team';
        } elseif ($mail_type == 5) {
            $email->setSubject('New Subscription to Stay Up-to-Date on Sustainability Topics');
            $message = "Dear PositiivPlus Team,<br><br>
        You have a new subscriber who has expressed an interest in staying up-to-date on sustainability topics. The individual provided the following information:<br><br>
        Subscriber's Email: " . $data['email'] . "<br><br>
        The subscriber has shown interest in receiving our monthly updates to stay informed about sustainability matters. Please ensure that the new subscriber is added to our mailing list and receives our monthly updates promptly. <br><br>
        Thank you for your continued support in our efforts to promote sustainability and share valuable insights with our audience.<br><br>
        Regards,<br>
        PositiivPlus Support Team";
        }
        $email->setMessage($message);
        $email->send();
        return json_encode(['success' => true]);
    }
}