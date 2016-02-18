
<html>
<head>
<title>example</title>
</head>

<body>
	<form action="po4.php" method="get">
	image
	<input type="text" name="url">
	<input type="submit" value="GO!">
	</form>
</body>
</html>



<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://api.projectoxford.ai/face/v1.0/detect');
$img_url = $_GET['url'];



$headers = array(
    // Request headers
    'Content-Type' => 'application/json',
    'Ocp-Apim-Subscription-Key' => '268bd1768b1442eebe0ec0601f4cd908',
);


$request->setHeader($headers);

$parameters = array(
    'returnFaceId' => 'true',
    'returnFaceLandmarks' => 'false',
    'returnfaceAttributes' => 'age,smile,gender,facialHair,headPose',
);

//var_dump($parameters);


$request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
$url = $request->getUrl();
$url->setQueryVariables($parameters);
$req['url'] = $img_url;

$json = json_encode($req);
$request->setBody($json);

try
{
    $response = $request->send();
    echo $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}

?>