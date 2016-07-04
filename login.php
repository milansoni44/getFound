<?php 
    session_start();
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
                    ?>    
                            <h5 style="color:red">Errors</h5>
                    <?php 
                            for($i=0; $i<sizeof($error);$i++){
                    ?>
                    <ul style="margin:0; color:red">
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> <?php echo $error[$i]; unset($_SESSION['error']); ?></li>
                    
                    </ul>
                    <?php 
                                }
                            }
                        }    
                    ?>
                    <?php
                        if(isset($_SESSION['forgot_message'])){
                            
                       
                        $forgot_message = $_SESSION['forgot_message'];
                        if(sizeof($forgot_message)>0){
                    ?>    
                            <h5 style="color:green">Message : </h5>
                    <?php 
                            for($i=0; $i<sizeof($forgot_message);$i++){
                    ?>
                    <ul style="margin:0; color:red">
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> <?php echo $forgot_message[$i]; unset($_SESSION['forgot_message']); ?></li>
                    
                    </ul>
                    <?php 
                                }
                            }
                        }    
                    ?>
                    
                     <?php
                        if(isset($_SESSION['logoutmessage'])){
                        $logoutmessage = $_SESSION['logoutmessage'];
                    ?>    
                    <ul style="margin:0; color:blue">
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> <?php echo $logoutmessage; unset($_SESSION['logoutmessage']) ;?></li>
                    </ul>
                    <?php
                        }
                    ?>    
                    
                    <div class="mb20"></div>
                    <!--<strong>Not a member? <a href="signup.html">Sign Up</a></strong>-->
                </div><!-- signin0-info -->
            
            </div><!-- col-sm-7 -->
            
            <div class="col-md-5">
                
                <form method="post" action="loginProcess.php">
                    <h4 class="nomargin">Sign In</h4>
                    <p class="mt5 mb20">Login to access your account.</p>
                
                    <input type="text" class="form-control uname" placeholder="Username" name="username"/>
                    <input type="password" class="form-control pword" placeholder="Password" name="password"/>
                    <br>
                    <select name="usertype" style="height: 37px; width: 100%;">
                        <option value="admin">Admin</option>
                        <option class="client">Client</option>
                    </select>
                    <input type="submit" class="btn btn-success btn-block" name="submit" value="Sign In"></input>
                    <br>
                    <a href="forgotPassword.php"><small style="float:right;">Forgot Your Password?</small></a>
                    
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
