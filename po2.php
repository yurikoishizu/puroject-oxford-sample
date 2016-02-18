<html>
<head>
<title>example</title>
</head>

<body>
	<form action="po2.php" method="get">
	image
	<input type="text" name="url">
	<input type="submit" value="GO!">
	</form>
</body>
</html>




<?php
 
$img_url = $_GET['url'];
 
require_once 'HTTP/Request2.php';
$headers = array(
	'Content-Type' => 'application/json',
);
 
$query_params = array(
	'subscription-key' => '268bd1768b1442eebe0ec0601f4cd908',
	'analyzesAge' => 'true',
	'analyzesGender' => 'true',
);
 
$request = new Http_Request2('https://api.projectoxford.ai/face/v0/detections');
$request->setConfig(array(
	'ssl_verify_peer' => false,
));
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setHeader($headers);
 
$url = $request->getUrl();
$url->setQueryVariables($query_params);
$req['url'] = $img_url;
$json = json_encode($req);
$request->setBody($json);
 
try
{
	$response = $request->send();
	var_dump(json_decode($response->getBody()));
}
catch (HttpException $ex)
{
   echo $ex;
}
 
?>

