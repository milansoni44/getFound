<?

// your API token goes here
$api_token = "9cbfec0e554152d0ba6e17cc4bdbc9f1dc0d98df";

$list_deals = get_deals($api_token);
   // for($i=0; $i<sizeof($list_deals); $i++){
            // echo $list_deals[$i].'<br>';
    // }
echo '<pre>';
print_r($list_deals);

function get_deals($api_token) {
    $data = file_get_contents("https://api.pipedrive.com/v1/stages?api_token=". $api_token);
    $data = json_decode($data, true); 
    $subData = $data['data'];
    $dataArray = array();
    
    for($i=0; $i<sizeof($subData); $i++){
        $dataArray[] = $subData[$i];
    }
    return $dataArray;
}
?>