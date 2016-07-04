<?php   
    include_once("includes/connection.php");
    $message = array();
    if(isset($_GET['email']) && isset($_GET['token'])){
        if(isset($_GET['user_type']) && $_GET['user_type'] == 'c'){
            $sql = "select password_token from client where contact_email='".$_GET['email']."'";
            $result = $dbh->query($sql);
            if($result->rowCount()){
                foreach($result as $row){
                    if($row['password_token'] == $_GET['token']){
                        session_start();
                        $message[] = "Please reset your password now.";
                        $_SESSION['message'] = $message;
                        // header('Location:resetPassword.php');
                        // die();
                    }else{
                        session_start();
                        $error[] = "Your link has been expired.";
                        $_SESSION['error'] = $error;
                        header('Location:login.php');
                        die();
                    }
                }
            }else{
                session_start();
                $error[] = "Your link has been expired.";
                $_SESSION['error'] = $error;
                header('Location:login.php');
                die();
            }
        }else{
            $sql = "select password_token from admin where email='".$_GET['email']."'";
            $result = $dbh->query($sql);
            if($result->rowCount()){
                foreach($result as $row){
                    if($row['password_token'] == $_GET['token']){
                        session_start();
                        $message[] = "Please reset your password now.";
                        $_SESSION['message'] = $message;
                        // header('Location:resetPassword.php');
                        // die();
                    }else{
                        session_start();
                        $error[] = "Your link has been expired.";
                        $_SESSION['error'] = $error;
                        header('Location:login.php');
                        die();
                    }
                }
            }else{
                session_start();
                $error[] = "Your link has been expired.";
                $_SESSION['error'] = $error;
                header('Location:login.php');
                die();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/LV_Fav.png" type="image/png">

  <title>GetFound | LocalVerifications LLC</title>

  <link href="css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript">
  
    function confirmPassword(){
        var pass = document.getElementById('pass').value;
        var confirmPass = document.getElementById('confirmPass').value;
        
        if( pass!=confirmPass){
              alert();
            document.getElementById('passwordConfirm').style.display = 'block';
            return false;
        }else if(pass=='' && confirmPass=='' ){
            document.getElementById('passwordConfirm').style.display = 'block';
            return false;
        }else{
            return true;
        }
    }
  
  </script>
</head>

<body class="signin">

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-7">
                
                <div class="signin-info">
                    <div class="logopanel">
                        <h1><span>[</span> GetFound <span>]</span></h1>
                    </div><!-- logopanel -->
                
                    <div class="mb20"></div>
                
                    <h4 style="padding-left">by Local Verifications LLC</h4>
                    
                    
                     <?php
                        if(isset($_SESSION['error'])){
                            
                       
                        $error = $_SESSION['error'];
                        if(sizeof($error)>0){
                            for($i=0; $i<sizeof($error);$i++){
                    ?>
                    <ul style="margin:0; color:red">
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> <?php echo $error[$i]; unset($_SESSION['error']) ?></li>
                    
                    </ul>
                    <?php 
                                }
                            }
                        }    
                    ?>
                     <?php
                        if(isset($_SESSION['message'])){
                            
                       
                        $message = $_SESSION['message'];
                        if(sizeof($message)>0){
                    ?>    
                            <h5 style="color:green">Congratulation : </h5>
                    <?php                             
                            for($i=0; $i<sizeof($message);$i++){
                    ?>
                    <ul style="margin:0; color:red">
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> <?php echo $message[$i]; unset($_SESSION['message'])?></li>
                    
                    </ul>
                    <?php 
                                }
                            }
                        }    
                    ?>
                    
                    <div class="mb20"></div>
                    
                </div><!-- signin0-info -->
            
            </div><!-- col-sm-7 -->
            
            <div class="col-md-5">
                
                <form method="post" action="resetPasswordProcess.php" >
                    <h4 class="nomargin">Create new password</h4>
                    <!--<p class="mt5 mb20">Login to access your account.</p>-->
                
                    <input type="password" class="form-control uname" placeholder="Password" name="pass"/>
                    <input type="password" class="form-control uname" placeholder="Confirm Password" name="confirmPass"/>
                <?php if(isset($_GET['reset_type']))
                    {
                ?>
                    <input type="hidden" class="form-control uname" placeholder="Confirm Password" name="reset_type" value="<?php echo $_GET['reset_type']; ?>"/>
                <?php
                    }
                ?>  
                <?php if(isset($_GET['user_type']))
                    {
                ?>
                    <input type="hidden" class="form-control uname" placeholder="Confirm Password" name="user_type" value="<?php echo $_GET['user_type']; ?>"/>
                <?php
                    }
                ?>
                    <input class="btn btn-success btn-block" type="submit" name="submit" value="Reset Password"/>
                    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" />
                </form>
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2014. All Rights Reserved. 
            </div>
            <div class="pull-right">
                Created By: <a href="http://vakratundasystem.in" target="_blank">Vakratunda System</a>
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>


<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/retina.min.js"></script>

<script src="js/custom.js"></script>

</body>
</html>
