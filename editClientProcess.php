<?php 
    include_once("includes/sessionCheck.php");
    include_once("includes/connection.php");
    
    if(isset($_POST['submit'])){
        extract($_POST);
        if($password == ''){
            // update query
            // echo 'dasasasa';exit;
            
            $sql = "UPDATE admin SET first_name=?, middle_name=?, last_name =?, email =?, contact=?, business_name=?, business_url=?, website=?, twillio_sid=?, twillio_token=?, google_plus_url=? WHERE admin_id=?";
            $q = $dbh->prepare($sql);
            $q->execute(
                array(
                    $first_name,
                    $middle_name,
                    $last_name,
                    $email,
                    $contact,
                    $business_name,
                    $business_url,
                    $website,
                    $twillio_sid,
                    $twillio_token,
                    $google_plus_url,
                    $admin_id
                )
            );
            $_SESSION['updateUser'] = $first_name." updated successfully." ;
            header('Location:listClient.php');
            die();
        }else{
            // update query
            $sql = "UPDATE admin SET first_name=?, middle_name=?, last_name =?, email =?, password=? contact=?, business_name=?, business_url=?, website=?, twillio_sid=?, twillio_token=?, google_plus_url=? WHERE admin_id=?";
            $q = $dbh->prepare($sql);
            $q->execute(
                array(
                    $first_name,
                    $middle_name,
                    $last_name,
                    $email,
                    md5($password),
                    $contact,
                    $business_name,
                    $business_url,
                    $website,
                    $twillio_sid,
                    $twillio_token,
                    $google_plus_url,
                    $admin_id
                )
            );
            $_SESSION['updateUser'] = $first_name." updated successfully." ;
            header('Location:listClient.php');
            die();
        }
    }else{
        
    }
?>