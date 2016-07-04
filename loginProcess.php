<?php 
 include_once("includes/connection.php");
    $error = array();
    // $error[]= null;
	if(isset($_POST['submit']))
	{
        // echo '<pre>';
        // print_r($_POST);exit;
        $username=$_POST['username'];
		$pwd=$_POST['password'];
		$usertype = $_POST['usertype'];
		if($username=='' || $pwd=='' || $usertype == '')
		{
            echo $usertype;exit;
            session_start();
			$error[] = "Please Enter Username and password.";
            $_SESSION['error'] = $error;
            
		}else if($username && $pwd && $usertype){
            if($usertype == 'admin'){
                
                $sql = "select * from admin where email='".$username."'";
                $result = $dbh->query($sql);
                if($result->rowCount()){
                    foreach($result as $row){
                        if($row['password'] == md5($pwd)){
                            session_start();
                            $_SESSION['email'] = $username;
                            $_SESSION['first_name'] = $row['first_name'];
                            $_SESSION['last_name'] = $row['last_name'];
                            $_SESSION['middle_name'] = $row['middle_name'];
                            $_SESSION['admin_id'] = $row['admin_id'];
                            $_SESSION['usertype'] = 'admin';
                            header('Location:index.php');
                            die();
                        }else{
                            session_start();
                            $error[] = "Password is incorrect";
                            $_SESSION['error'] = $error;
                        }
                    }
                }else{
                    session_start();
                    $error[] = "Email is not exist";
                    $_SESSION['error'] = $error;
                }
            }else{
                $sql = "select * from client where contact_email='".$username."'";
                $result = $dbh->query($sql);
                if($result->rowCount()){
                    foreach($result as $row){
                        if($row['password'] == md5($pwd)){
                            session_start();
                            $_SESSION['email'] = $username;
                            $_SESSION['first_name'] = 'Client';
                            $_SESSION['last_name'] = '';
                            $_SESSION['middle_name'] = 'a';
                            $_SESSION['admin_id'] = $row['client_id'];
                            $_SESSION['usertype'] = 'client';
                            header('Location:index.php');
                            die();
                        }else{
                            session_start();
                            $error[] = "Password is incorrect";
                            $_SESSION['error'] = $error;
                        }
                    }
                }else{
                    session_start();
                    $error[] = "Email is not exist";
                    $_SESSION['error'] = $error;
                }
            }
        }
    }
    header('Location:login.php');
	die();
?>