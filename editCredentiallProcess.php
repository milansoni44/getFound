<?php 
    include_once("includes/sessionCheck.php");
    include_once("includes/connection.php");
    
    if(isset($_POST['submit'])){
        
        extract($_POST);
        // echo '<pre>';
        // print_r($_POST);exit;
        // update query
        // echo 'dasasasa';exit;
            
        $sql = "UPDATE credential SET deal_id=?, twilio_sid=?, twilio_token=?, analytic_id =? WHERE id=?";
            
        $q = $dbh->prepare($sql);
        $stmt = $q->execute(
                array(
                    $deal_id,
                    $twilio_sid,
                    $twilio_token,
                    $analytic_id,
                    $id
                )
            );
        $_SESSION['updateCredential'] = "Credential updated successfully." ;
        header('Location:listCredentials.php');
        die();
    }else{
        
    }
?>