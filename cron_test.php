<?php 
    set_include_path('/home/localverificatio/public_html/getFound/includes/');
    require 'functions.php';
    
    echo test();
    
// date_default_timezone_set('Asia/Kolkata');

// if (date_default_timezone_get()) {
    // echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
// }

// if (ini_get('date.timezone')) {
    // echo 'date.timezone: ' . ini_get('date.timezone');
// }

// phpinfo();
// $utc = "2015-07-15T04:54:30.934Z";
// $time = strtotime($utc);

// echo date('m/d/Y H:i:s', $time);

// $UTC = new DateTimeZone("UTC");
// $newTZ = new DateTimeZone("Asia/Kolkata");
// $date = new DateTime( "2015-07-15 1:16:00", $UTC );
// $date->setTimezone( $newTZ );
// echo $date->format('Y-m-d H:i:s');
?>