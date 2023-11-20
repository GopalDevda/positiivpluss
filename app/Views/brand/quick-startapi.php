<!--<form method="post"action="https://www.dhbvn.org.in/web/portal/auth?p_auth=toJF8u55&p_p_id=LoginApdrp_WAR_Rapdrp&p_p_lifecycle=1&p_p_state=normal&p_p_mode=view&p_p_col_id=column-1&p_p_col_count=1&_LoginApdrp_WAR_Rapdrp_myaction=loginPage">-->
<!--<input id="accountNo" name="accountNo" class="text_input required" tabindex="1" placeholder="Account No*" type="text" value="" size="10" maxlength="10" alt="accountNo" autocomplete="off">    -->
<!-- <input id="password" name="password" class="text_input required" tabindex="2" placeholder="Password*" type="password" value="" size="15" maxlength="15" alt="password" autocomplete="off">   -->
<!--<input type="submit" value="LOGIN" id="submit" class="button" name="submit" tabindex="3">-->
<!--</form>-->

<?php



use Goutte\Client;


// //  # accountNo = '1901530000'
// //     # password ="Nishant@123"

// $client = new \GuzzleHttp\Client();
//  $client = new \GuzzleHttp\Client(['headers' => ['ID' => '1901530000','password' => 'Nishant@123']]);
//  $response = $client->request('GET', 'http://127.0.0.1:8000/docs');

//  echo $response->getStatusCode(); // 200
//  echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
//  echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

// //  Send an asynchronous request.
// $request = new \GuzzleHttp\Psr7\Request('GET', 'http://127.0.0.1:8000/docs',['accountNo' => '1901530000','password' => 'Nishant@123'
// ]); $promise = $client->sendAsync($request)->then(function ($response) {
//     echo 'I completed! ' . $response->getBody();
// });

// $promise->wait();


// $client = new Client();

// $crawler = $client->request('GET', 'https://www.dhbvn.org.in/web/portal/view-bill/');

// $link = $crawler->selectLink('Plugins')->link();

// // $link = $crawler->filter('#return-button')->link();
// $crawler = $client->click($link);


// $form = $crawler->selectButton('sign in')->form();
// $crawler = $client->submit($form, array('signin[accountNo]' => '1901530000', 'signin[password]' => 'Nishant@123'));

// $nodes = $crawler->filter('.error_list');

// if ($nodes->count())
// {
//   die(sprintf("Authentification error: %s\n", $nodes->text()));
// }

// printf("Nb tasks: %d\n", $crawler->filter('#nb_tasks')->text());

  # accountNo = '1901530000'
    # password ="Nishant@123"

    // $url = ' http://127.0.0.1:8000/getUnits?ID=1901530000&password=Nishant@123'; #OR http://127.0.0.1:800/login
     $url = 'http://127.0.0.1:8000/getUnits'; #OR http://127.0.0.1:800/login
    $data = array("ID" => "1901530000", "password"=>"Nishant@123");
    // $data = '{"ID" => "1901530000", "password"=>"Nishant@123"}';
    $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, 'GET' );
    curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
    curl_setopt($curl, CURLOPT_PORT, 8000); #OR without this option
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // For HTTPS
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // For HTTPS
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'Content-Type: application/json', 'server:uvicorn'
    ]);
    $response = curl_exec($curl);
    echo $response;
   
    var_dump($response);
    curl_close($curl);
  
?>