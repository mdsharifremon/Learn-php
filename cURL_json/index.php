<?php 

// $url = "https://jsonplaceholder.typicode.com/posts/";
// $resource = curl_init($url);
// curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
// $result = json_decode(curl_exec($resource), true);

// // $info = curl_getinfo($resource);
// // $info = curl_getinfo($resource, CURLINFO_HTTP_CODE);



// echo "<pre>"; 
// // print_r($info);
// print_r($result);
// echo "</pre>";

$url = 'https://www.amazon.com';
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_exec($curl);




?>