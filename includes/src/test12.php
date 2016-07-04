<?php
require_once dirname(__FILE__) . '/src/Google/Client.php';
require_once dirname(__FILE__) . '/src/Google/Service/Analytics.php';

const CLIENT_ID = '609857927111-sdda40p9oofrm9aktcci2duo2rg0i3a3.apps.googleusercontent.com';
const SERVICE_ACCOUNT_NAME = '609857927111-sdda40p9oofrm9aktcci2duo2rg0i3a3@developer.gserviceaccount.com';


// $keyfile = $_SERVER['DOCUMENT_ROOT']."/My Project-94098b0725d1.p12";
$keyfile = dirname(__FILE__)."/My Project-94098b0725d1.p12";

$client = new Google_Client();
$client->setAccessType('offline');
$client->setApplicationName("Testing Application");


$key = file_get_contents($keyfile);
$client->setClientId(CLIENT_ID);

$client->setAssertionCredentials(new Google_Auth_AssertionCredentials(
    SERVICE_ACCOUNT_NAME,
    array('https://www.googleapis.com/auth/analytics.readonly'),
    $key)
);

$analytics = new Google_Service_Analytics($client);
// Add Analytics View ID, prefixed with "ga:"
$analyticsViewId    = 'ga:105126548';

$startDate          = '2015-01-01';
$endDate            = '2015-07-18';
$metrics            = 'ga:sessions,ga:pageviews';

$data = $analytics->data_ga->get($analyticsViewId, $startDate, $endDate, $metrics, array(
    'dimensions'    => 'ga:pagePath',
    //'filters'       => 'ga:pagePath==/url/to/product/',
    'sort'          => '-ga:pageviews',
));
echo '<pre>';
print_r($data);
echo '<hr>';
print_r($data['totalsForAllResults']);
$total=$data['totalsForAllResults'];
echo $total['ga:pageviews'];


// Data 
$items = $data->getRows();
//var_dump($items);
?>