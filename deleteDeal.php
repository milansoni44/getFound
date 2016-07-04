<?php 
    include_once("includes/sessionCheck.php");
    include_once("includes/connection.php");
    
    if(isset($_REQUEST['id'])){
        extract($_POST);
        // update query
        $sql = "UPDATE client SET status=? WHERE client_id=?";
        $q = $dbh->prepare($sql);
        $q->execute(
            array(
                'disable',
                $_REQUEST['id']
            )
        );
        $_SESSION['updateDeal'] = "Deal deleted successfully." ;
        header('Location:listDeals.php');
        die();
    }
?>