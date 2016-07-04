<?php
	include_once("includes/sessionCheck.php");
    include_once("includes/connection.php");
	if(isset($_GET['notify_client'])){
		
		$notify_client = $_GET['notify_client'];
		$client_id = $_GET['id'];
		
		$sql = "UPDATE client SET notify_client=? WHERE client_id=?";
            
        $q = $dbh->prepare($sql);
        $stmt = $q->execute(
                array(
                    $notify_client,
                    $client_id,
                )
            );
		header('Location:editDeal.php?id='.$client_id);
        die();
	}
?>