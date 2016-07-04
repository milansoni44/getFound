<?php

    $api_token = '9cbfec0e554152d0ba6e17cc4bdbc9f1dc0d98df';
    $url = "https://api.pipedrive.com/v1/deals/2568?api_token=". $api_token;
    $data = array('title' => 'test1 deals dhaval','stage_id'=>'5');
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

    $response = curl_exec($ch);
    if(!$response) {
        return false;
    }else{
        echo '<pre>';
        print_r(json_decode($response));
    }
?>