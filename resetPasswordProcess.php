<?php 
    include_once("includes/connection.php");
    session_start();
    if(isset($_POST['submit'])){
        if(isset($_POST['user_type']) && $_POST['user_type'] == 'c')
        {
            $email = $_POST['email'];
       
            $sql = "select * from client where contact_email='".$email."'";
            $result = $dbh->query($sql);
            // echo $result->rowCount();exit;
            if($result->rowCount() > 0){
                if(isset($_POST['reset_type'])){
                    $sql = "UPDATE client SET password=?,is_created=? WHERE contact_email=?";
                    $q = $dbh->prepare($sql);
                    $q->execute(
                        array(
                            md5($_POST['pass']),
                            true,
                            $email,
                        )
                    );
                }else{
                    $sql = "UPDATE client SET password=? WHERE contact_email=?";
                    $q = $dbh->prepare($sql);
                    $q->execute(
                        array(
                            md5($_POST['pass']),
                            $email,
                        )
                    );
                }
                
                unset($_SESSION['error']);
                $_SESSION['logoutmessage'] = "Your password has been reseted.";
                header('Location:login.php');
                die();
            }
        }else{
            $email = $_POST['email'];
       
            $sql = "select * from admin where email='".$email."'";
            $result = $dbh->query($sql);
            // echo $result->rowCount();exit;
            if($result->rowCount() > 0){
                    $sql = "UPDATE admin SET password=? WHERE email=?";
                    $q = $dbh->prepare($sql);
                    $q->execute(
                        array(
                            md5($_POST['pass']),
                            $email,
                        )
                    );
                unset($_SESSION['error']);
                $_SESSION['logoutmessage'] = "Your password has been reseted.";
                header('Location:login.php');
                die();
            }
        }
        
    }else{
        header('Location:login.php');
        die();
    }
?>