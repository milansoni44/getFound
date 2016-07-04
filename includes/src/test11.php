<?php

require_once dirname(__FILE__) . '/src/Google/Client.php';
require_once dirname(__FILE__) . '/src/Google/Service/Analytics.php';
//require_once dirname(__FILE__) . '/src/Google/Auth/AssertionCredentials.php';
// require_once('googleAPIGoogle_Client.php');
// require_once('googleAPI/contrib/Google_AnalyticsService.php');

const CLIENT_ID = '609857927111-sdda40p9oofrm9aktcci2duo2rg0i3a3.apps.googleusercontent.com';
const SERVICE_ACCOUNT_NAME = '609857927111-sdda40p9oofrm9aktcci2duo2rg0i3a3@developer.gserviceaccount.com';


// $keyfile = $_SERVER['DOCUMENT_ROOT']."/My Project-94098b0725d1.p12";
$keyfile = dirname(__FILE__)."/My Project-94098b0725d1.p12";

$client = new Google_Client();
$client->setAccessType('offline');
$client->setApplicationName("cc insights");


$key = file_get_contents($keyfile);
$client->setClientId(CLIENT_ID);

$client->setAssertionCredentials(new Google_Auth_AssertionCredentials(
    SERVICE_ACCOUNT_NAME,
    array('https://www.googleapis.com/auth/analytics.readonly'),
    $key)
);


$service = new Google_Service_Analytics($client);

// $data = $service->data_ga->get("ga:105340375", "2012-01-01", "2013-01-25", "ga:pageviews");
$data = $service->data_ga->get("ga:105126548", "2012-01-01", "2015-07-25", "ga:pageviews");
echo '<pre>';
var_dump($data);
?>