<?php 
    include_once("includes/sessionCheck.php");
//    include_once("includes/connection.php");
    
    if(isset($_POST['submit'])){
        extract($_POST);
        // $sql = "UPDATE reports SET published_directory=?, report_status=? WHERE report_id=?";
            // $q = $dbh->prepare($sql);
            // $data = array(
                              // ':published_directory'=>$published_directory,
                              // ':report_status'      => 'yes',
                              // ':report_id'=>$report_id,
                             
                    // );
            //echo '<pre>';
            // print_r($data);exit;
            // $q->execute($data);
            $sql = "UPDATE reports SET published_directory=?, report_status=? WHERE report_id=?";
            $q = $dbh->prepare($sql);
            $q->execute(
                array(
                    $published_directory,
                    'yes',
                    $report_id,
                )
            );
            $_SESSION['message'] = $first_name." ".$last_name."'s report has been successfully updated.";
            header("Location:listReport.php");
            die();
    }else{
        
    }
?>