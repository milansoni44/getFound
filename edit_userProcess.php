<?php 
    include_once("includes/sessionCheck.php");
    include_once("includes/connection.php");
    
    if(isset($_POST['submit'])){
        extract($_POST);
        if($password == ''){
            
            // update query
            $sql = "UPDATE admin SET first_name=?, middle_name=?, last_name =?, email =?, user_type=? WHERE admin_id=?";
            $q = $dbh->prepare($sql);
            $q->execute(
                array(
                    $first_name,
                    $middle_name,
                    $last_name,
                    $email,
                    $user_type,
                    $admin_id
                )
            );
            $_SESSION['updateUser'] = $first_name." updated successfully." ;
            header('Location:listUser.php');
            die();
            
        }else{
            $sql = "UPDATE admin SET first_name=?, middle_name=?, last_name =?, email =?, password=?, user_type=? WHERE admin_id=?";
            $q = $dbh->prepare($sql);
            $q->execute(
                array(
                    $first_name,
                    $middle_name,
                    $last_name,
                    $email,
                    md5($password),
                    $user_type,
                    $admin_id
                )
            );
            $_SESSION['updateUser'] = $first_name." updated successfully." ;
            header('Location:listUser.php');
            die();
        }
    }else{
        
    }
?>