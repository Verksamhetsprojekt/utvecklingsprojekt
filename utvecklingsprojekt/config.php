<?php

$access_token = '7c949f6e-377e-4f6c-9e6b-48a44e5f27d7';

define('ACCESS_TOKEN', $access_token);
define('CLIENT_SECRET', 'JFF8M6j8Xv');
define('CONTENT_TYPE', 'application/json');
define('ACCEPTS', 'application/json');
define('ENDPOINT', 'https://api.fortnox.se/3/');

function apiCall ($requestMethod, $entity, $body = null) { 

 $curl = curl_init(ENDPOINT . $entity);
 $options = array(
  'Access-Token: '. ACCESS_TOKEN .'',
  'Client-Secret: '. CLIENT_SECRET .'',
  'Content-Type: '. CONTENT_TYPE .'',
  'Accept: '. ACCEPTS .''
 );

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
 curl_setopt($curl, CURLOPT_HTTPHEADER, $options);
 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $requestMethod);

 if ($requestMethod == 'POST' || $requestMethod == 'PUT') {
  curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
 }

 $curlResponse = curl_exec($curl);
 curl_close($curl);
 return $curlResponse;
}
//test
