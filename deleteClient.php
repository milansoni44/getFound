<?php 
    include_once("includes/sessionCheck.php");
    include_once("includes/connection.php");
    
    if(isset($_REQUEST['id'])){
        extract($_POST);
        // update query
        $sql = "UPDATE admin SET status=? WHERE admin_id=?";
        $q = $dbh->prepare($sql);
        $q->execute(
            array(
                'disable',
                $_REQUEST['id']
            )
        );
        $_SESSION['deleteUser'] = "Client Deleted successfully." ;
        header('Location:listClient.php');
        die();
    }
?>