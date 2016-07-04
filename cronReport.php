<?php
	include_once("includes/sessionCheck.php");
    include_once("includes/connection.php");
	
	$sql = "select * from client where status='enable'";
	$result = $dbh->query($sql);
	foreach($result as $row){
						
	}

?>