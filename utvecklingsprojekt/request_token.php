<?php

define('AUTH_CODE', 'df6f8ba8-9178-6a42-0f4c-106db8617ade');
define('CLIENT_SECRET', 'JFF8M6j8Xv');
define('CONTENT_TYPE', 'application/xml');
define('ACCEPTS', 'application/xml');
define('ENDPOINT', 'https://api.fortnox.se/3/');

function apiCall ($requestMethod, $body = null) { 

 $curl = curl_init(ENDPOINT . $entity);
 $options = array(
  'Authorization-Code: '. AUTH_CODE .'',
  'Client-Secret: '. CLIENT_SECRET .'',
  'Content-Type: '. CONTENT_TYPE .'',
  'Accept: '. ACCEPTS .''
 );

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
 curl_setopt($curl, CURLOPT_HTTPHEADER, $options);
 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $requestMethod);

 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

 if ($requestMethod == 'POST' || $requestMethod == 'PUT') {
  curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
 }

 $curlResponse = curl_exec($curl);
 curl_close($curl);
 return $curlResponse;
}


echo apiCall('GET');