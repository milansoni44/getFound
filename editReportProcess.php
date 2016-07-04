<?php
    // session_start();
    include_once("includes/sessionCheck.php");
    include_once("includes/connection.php");
    
    if(isset($_POST['submit'])){
        // echo '<pre>';
        // print_r($_POST);exit;
        extract($_POST);
            $date1 = explode('/',$date);
        
            $temp[0] = $date1[2];
            $temp[1] = $date1[0];
            $temp[2] = $date1[1];
            $date2 = implode('/',$temp);
            $sql = "UPDATE reports SET published_directory=?, date_time = ? WHERE report_id=?";
            $q = $dbh->prepare($sql);
            $q->execute(
                array(
                    $publish_derectory,
                    $date2,
                    $report_id,
                )
            );
            $_SESSION['message'] = "Report has been successfully updated.";
            header("Location:listReport.php");
            die();
    }else{
        
    }
?>