<?php 
    require_once dirname(__FILE__) . '/getanalyticsdata/Google/Client.php';
    require_once dirname(__FILE__) . '/getanalyticsdata/Google/Service/Analytics.php';
    
    const CLIENT_ID = '609857927111-sdda40p9oofrm9aktcci2duo2rg0i3a3.apps.googleusercontent.com';
    const SERVICE_ACCOUNT_NAME = '609857927111-sdda40p9oofrm9aktcci2duo2rg0i3a3@developer.gserviceaccount.com';
    $keyfile = dirname(__FILE__)."/getanalyticsdata/My Project-94098b0725d1.p12";
    function generateRandomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 32; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    return $randomString;
    }
    
    // twilio tracked calls
    function getTrackedCalls($client){
        $count = 0;
        foreach ($client->account->calls as $call) {
            //echo "From: {$call->from}  </br>   To: {$call->to}   </br>   Sid: {$call->sid}\n\n    <br/>";
            $count++;
        }
        return $count;
    }
    
    // get website views
    function getWebsiteViews(){
        
    }
    
    // get google plus profile views
    function getGoogleProfileViews($url){
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML(file_get_contents($url)); // Fetch xmovies8.co.com's home page
        libxml_use_internal_errors(false); 
        
        $xpath = new DOMXPath($dom);
        $xpath_resultset =  $xpath->query("//div[@class='Zmjtc']/span[@class='BOfSxb']");
        
        foreach($xpath_resultset as $n)
        {
            $a[] = $n->nodeValue;
        }
        // echo '<pre>';
        // print_r($a);
        return $a[1];
    }
    
    function googlePageViews($viewID)
    {
       


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
        $analyticsViewId    = 'ga:'.$viewID;

        $startDate          = '2014-01-01';
        $endDate            = date('Y-m-d');
        $metrics            = 'ga:sessions,ga:pageviews';

        $data = $analytics->data_ga->get($analyticsViewId, $startDate, $endDate, $metrics, array(
            'dimensions'    => 'ga:pagePath',
            //'filters'       => 'ga:pagePath==/url/to/product/',
            'sort'          => '-ga:pageviews',
        ));
        $total=$data['totalsForAllResults'];
        return $total['ga:pageviews'];
    }
    //updating deal in pipedrive
    function updatePipeDriveDeal($deal_id){
        $api_token = '9cbfec0e554152d0ba6e17cc4bdbc9f1dc0d98df';
        $url = "https://api.pipedrive.com/v1/deals/".$deal_id."?api_token=". $api_token;
        // $data = array('title' => 'test1 deals dhaval','stage_id'=>'5');
        $data = array('stage_id'=>'10');
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

        $response = curl_exec($ch);
        if(!$response) {
            return false;
        }else{
            return true;
        }
    }
?>