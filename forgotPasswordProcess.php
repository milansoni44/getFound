<?php 
ob_start();
 include_once("includes/connection.php");
 include_once("includes/functions.php");
 // session_start();
    $forgot_message = array();
    $error = array();
    // $error[] = null;
    if(isset($_POST['submit']))
	{
        $email=$_POST['email'];
        
		if($email=='')
		{
            session_start();
            $error[] = "Please enter valid email address.";
            $_SESSION['error'] = $error;
            
		}else if($email){
            if($_POST['user_type'] == 'a'){
                session_start();
                $sql = "select * from admin where email='".$email."'";
                $result = $dbh->query($sql);
                $result->rowCount();
                if($result->rowCount()){
                    $passwordToken = generateRandomString();
                    $sql = "UPDATE admin SET password_token=? WHERE email=?";
                    $q = $dbh->prepare($sql);
                    $q->execute(
                        array(
                            $passwordToken,
                            $email,
                        )
                    );
                $email_message = "http://localverifications.com/getFound/resetPassword.php?email=$email&token=".$passwordToken;
                //$email_from = 'noreply@localverifications.com';
                // //sendMail('milansoni44@gmail.com',$email,'Reset your password',$email_message);
                // $headers = 'From: '.$email_from."\r\n".'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();
                // @mail($email,'Reset your password',$email_message,$header);
                $message ='<div class="container" style="width: 95%;margin:80px auto 0 auto;border:1px solid #ccc;color:#999;">
  <div class="header" style="background:#4169E1;float: left;width: 100%;">
    <div class="sitename" style="float:left;width:70%;">
      <h1 style="margin:0;	padding:10px 0px 10px 2%;color:#fff;">Location Verfications LLC</h1>
    </div>
    <div class="socialicons" style="float:right;margin:0;padding:0;">
      <ul style="margin:0;	padding:0;">
        <li style="list-style:none;float:left;margin: 8% 10px 0px 0px;background:#fff;border-radius: 100%;width: 16px;height: 12px;text-align: center;padding: 6px;"><a href="#" style="text-decoration:none;color:#4169E1;"><img src="http://vakratundasystem.in/application/newsletterdemo/facebook.png" /></a></li>
        <li style="list-style:none;float:left;margin:8% 10px 0px 0px;background:#fff;border-radius:100%;width:20px;height:20px;text-align:center;padding: 6px;"><a href="#" style="text-decoration:none;color:#4169E1;"><img src="http://vakratundasystem.in/application/newsletterdemo/twitter.png" /></a></li>
        <li style="list-style:none;float: left;margin:8% 10px 0px 0px;background:#fff;border-radius:100%;width:20px;height:20px;text-align: center;padding: 6px;"><a href="#" style="text-decoration:none;color:#4169E1;"><img src="http://vakratundasystem.in/application/newsletterdemo/pinterest.png" /></a></li>
      </ul>
    </div>
  </div>
  <div class="content" style="padding: 50px;">
    <p class="title" style="margin-top: 50px;">Dear Mr.'.$email.',</p>
    <div class="mailcontent" style="text-indent: 40px;text-align: justify;">
      <p>'.$email_message.'</p>
    </div>
    </div>
    <div class="clear" style="clear: both;"></div>
  </div>
</div>';

	$message.='<div class="terms" style="width:95%;margin:0 auto;">
<p><font color="#FF0000"><strong>Notice of Confidentiality</strong></font>: This transmission contains information that may
be confidential and that may also be proprietary; unless you are intended
recipient of the message (or authorized to receive it for the intended
recipient), you may not copy, forward, or otherwise use it, or disclose its
contents to anyone else. If you have received this transmission in error,
please notify us immediately and delete it from your system.</p>
</div>';

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: noreply@localverifications.com' . "\r\n";
            // $headers .= 'Cc: myboss@example.com' . "\r\n";

            @mail($email,'Reset your password',$message,$headers);
                $forgot_message[] = "We have sent mail reset password link.";
                $_SESSION['forgot_message'] = $forgot_message;
                header('Location:login.php');
                die();
                }else{
                    session_start();
                    $error[] = "Email is not exist";
                    $_SESSION['error'] = $error;
                }
            }else{
                session_start();
                $sql = "select * from client where contact_email='".$email."'";
                $result = $dbh->query($sql);
                $result->rowCount();
                if($result->rowCount()){
                    $passwordToken = generateRandomString();
                    $sql = "UPDATE client SET password_token=? WHERE contact_email=?";
                    $q = $dbh->prepare($sql);
                    $q->execute(
                        array(
                            $passwordToken,
                            $email,
                        )
                    );
                $email_message = "http://localverifications.com/getFound/resetPassword.php?email=$email&token=".$passwordToken."user_type=".$_POST['user_type'];
                // $email_from = 'milansoni44@gmail.com';
                // //sendMail('milansoni44@gmail.com',$email,'Reset your password',$email_message);
                // $headers = 'From: '.$email_from."\r\n".'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();
                // @mail($email,'Reset your password',$email_message,$header);
                $message ='<div class="container" style="width: 95%;margin:80px auto 0 auto;border:1px solid #ccc;color:#999;">
  <div class="header" style="background:#4169E1;float: left;width: 100%;">
    <div class="sitename" style="float:left;width:70%;">
      <h1 style="margin:0;	padding:10px 0px 10px 2%;color:#fff;">Location Verfications LLC</h1>
    </div>
    <div class="socialicons" style="float:right;margin:0;padding:0;">
      <ul style="margin:0;	padding:0;">
        <li style="list-style:none;float:left;margin: 8% 10px 0px 0px;background:#fff;border-radius: 100%;width: 16px;height: 12px;text-align: center;padding: 6px;"><a href="#" style="text-decoration:none;color:#4169E1;"><img src="http://vakratundasystem.in/application/newsletterdemo/facebook.png" /></a></li>
        <li style="list-style:none;float:left;margin:8% 10px 0px 0px;background:#fff;border-radius:100%;width:20px;height:20px;text-align:center;padding: 6px;"><a href="#" style="text-decoration:none;color:#4169E1;"><img src="http://vakratundasystem.in/application/newsletterdemo/twitter.png" /></a></li>
        <li style="list-style:none;float: left;margin:8% 10px 0px 0px;background:#fff;border-radius:100%;width:20px;height:20px;text-align: center;padding: 6px;"><a href="#" style="text-decoration:none;color:#4169E1;"><img src="http://vakratundasystem.in/application/newsletterdemo/pinterest.png" /></a></li>
      </ul>
    </div>
  </div>
  <div class="content" style="padding: 50px;">
    <p class="title" style="margin-top: 50px;">Dear Mr.'.$email.',</p>
    <div class="mailcontent" style="text-indent: 40px;text-align: justify;">
      <p>'.$email_message.'</p>
    </div>
    </div>
    <div class="clear" style="clear: both;"></div>
  </div>
</div>';

	$message.='<div class="terms" style="width:95%;margin:0 auto;">
<p><font color="#FF0000"><strong>Notice of Confidentiality</strong></font>: This transmission contains information that may
be confidential and that may also be proprietary; unless you are intended
recipient of the message (or authorized to receive it for the intended
recipient), you may not copy, forward, or otherwise use it, or disclose its
contents to anyone else. If you have received this transmission in error,
please notify us immediately and delete it from your system.</p>
</div>';

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: noreply@localverifications.com' . "\r\n";
            // $headers .= 'Cc: myboss@example.com' . "\r\n";

            @mail($email,'Reset your password',$message,$headers);
                $forgot_message[] = "We have sent mail reset password link.";
                $_SESSION['forgot_message'] = $forgot_message;
                header('Location:login.php');
                die();
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