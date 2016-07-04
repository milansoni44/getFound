<?php
	try {
		$dbh=new PDO("mysql:host=localhost;dbname=vakratu1_loginwithfbgplus","vakratu1_logfbgp","2F*KA9bmOh)Q");
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
?>