
<html>
<head>
<title>example</title>
</head>

<body>
	<form action="po3.php" method="get">
	image
	<input type="text" name="url">
	<input type="submit" value="GO!">
	</form>
</body>
</html>



<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://api.projectoxford.ai/emotion/v1.0/recognize');
$url = $_GET['url'];

//$url = $request->getUrl();

$headers = array(
    // Request headers
    'Content-Type' => 'application/json',
    'Ocp-Apim-Subscription-Key' => '7961e8972efe49fdb45cc089f9296ca1',
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
    //'faceRectangles' => 'true',
);

//$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
$req['url'] = $url;

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