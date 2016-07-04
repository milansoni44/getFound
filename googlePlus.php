<?php 
    require('./includes/functions.php');
    include_once("includes/connection.php");
    
    $sql = "SELECT * from client join reports ON reports.client_id = client.client_id where client.status = 'enable'";
    $result = $dbh->query($sql);
    
    foreach($result as $row){
        $google_plus_url = $row['google_listing_url'];
        $profileViews[] = getGoogleProfileViews($google_plus_url);
    }
    
    echo '<pre>';
    print_r($profileViews);
    
    // $url = array('https://plus.google.com/105089241109636495366/posts');
    
    // echo getGoogleProfileViews($url);
?>