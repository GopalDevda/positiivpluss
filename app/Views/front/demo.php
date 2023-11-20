<?php
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://iatacodes-iatacodes-v1.p.rapidapi.com/api/v9/airports?icao_code=LFPG&iata_code=CDG",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: iatacodes-iatacodes-v1.p.rapidapi.com",
        "x-rapidapi-key: e4f445347fmshc6b32171512297ep1b4356jsn21b9cf684845"
    ],
]);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
die;


$url = "https://aviation-edge.com/v2/public/[ENDPOINT]?key=[API KEY]";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);



https://aviation-edge.com/v2/public/[ENDPOINT]?key=[API KEY]
die;
$url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?type=airport&key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

//die;
function getDistance($addressFrom, $addressTo, $unit = ''){
    // Google API key
    $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';
    // Change address format
    $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
    $formattedAddrTo     = str_replace(' ', '+', $addressTo);

    // Geocoding API request with start address
    $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
    $outputFrom = json_decode($geocodeFrom);
    if(!empty($outputFrom->error_message)){
        return $outputFrom->error_message;
    }
    
    // Geocoding API request with end address
    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
    $outputTo = json_decode($geocodeTo);
    if(!empty($outputTo->error_message)){
        return $outputTo->error_message;
    }
    // Get latitude and longitude from the geodata
    $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
    
    // Calculate distance between latitude and longitude
    $theta    = $longitudeFrom - $longitudeTo;
    $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist    = acos($dist);
    $dist    = rad2deg($dist);
    $miles    = $dist * 60 * 1.1515;
    // Convert unit and return distance
    $unit = strtoupper($unit);
    if($unit == "K"){
        return round($miles * 1.609344, 2).' km';
    }elseif($unit == "M"){
        return round($miles * 1609.344, 2).' meters';
    }else{
        return round($miles, 2).' miles';
    }
}
echo $distance = getDistance('Indore, Madhya Pradesh, India','Ujjain, Madhya Pradesh, India', "K");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>www.W3docs.com</title>
    <style>
      input {
        height: 30px;
        padding-left: 10px;
        border-radius: 4px;
        border: 1px solid rgb(186, 178, 178);
        box-shadow: 0px 0px 12px #EFEFEF;
      }
    </style>

   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU&libraries=places,geometry&type=airport"></script>
  </head>
  <body>
    <input type="text" id="autocomplete"/>
    <input type="text" id="autocomplete1"/>

    <script>
      var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input);

      var input1 = document.getElementById('autocomplete1');
      var autocomplete = new google.maps.places.Autocomplete(input1);

    </script>
  </body>
</html>
//https://stackoverflow.com/questions/27069920/google-places-autocomplete-for-airports
