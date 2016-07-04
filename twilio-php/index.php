<?php 
    
    // this line loads the library 
    require ('./includes/function.php');
    require('./Services/Twilio.php'); 
     
    $account_sid = 'ACbbea0f176fa0c17ef3d74d95d1e3474d'; 
    $auth_token = '6dae226ae3241f616c0932a65b6e7c3c'; 
    $client = new Services_Twilio($account_sid, $auth_token);
    
    echo getTrackedCalls($client);
?>