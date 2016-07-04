<?php
    include_once("includes/sessionCheck.php");
    include_once("includes/connection.php");
    include_once("includes/functions.php");
    
    if(isset($_POST['submit'])){
        
        extract($_POST);
            // update query
            // echo 'dasasasa';exit;
        
        $sql = "UPDATE client SET deal_title=?, contact_email=?, phone=?, call_tracking_number =?,twilio_sid =?,twilio_token =?, google_listing_url=?, localverification_site=?, analytic_id =?, analytic_user_id =?, pipedrive_stage=? WHERE client_id=?";
            
        $q = $dbh->prepare($sql);
        $stmt = $q->execute(
                array(
                    $deal_title,
                    $contact_email,
                    $phone,
                    $call_tracking_number,
					$twilio_sid,
					$twilio_token,
                    $google_listing_url,
                    $localverification_site,
					$analytic_id,
					$analytic_user_id,
                    $pipedrive_stage,
                    $deal_id
                )
            );
        
		$sql1 = "select * from client where client_id=".$deal_id;
		$result = $dbh->query($sql1);
		// print_r($result);
		// exit;
        
		$statusCheck = false ;
		foreach($result as $row){
           
                if((trim($row['analytic_id'])!= null || trim($row['analytic_id'])!='') && (trim($row['analytic_user_id'])!= null || trim($row['analytic_user_id'])!='') || (trim($row['twilio_token'])!= null || trim($row['twilio_token'])!='') || (trim($row['twilio_sid'])!= null || trim($row['twilio_sid'])!='') || $row['is_created'] == false){
				$statusCheck = true;
                }
                // echo $row['analytic_id'];exit;
                if($statusCheck == true){
                     $sql2 = "UPDATE client SET status=? WHERE client_id=?";
                        
                    $q = $dbh->prepare($sql2);
                    $stmt = $q->execute(
                            array(
                                'enable',
                                $deal_id
                            )
                        );
                    $passwordToken = generateRandomString();

                    $sql3 = "UPDATE client SET password_token=? WHERE client_id=?";
                    $q = $dbh->prepare($sql3);
                    $q->execute(
                        array(
                            $passwordToken,
                            $deal_id,
                        )
                    );      
                    updatePipeDriveDeal($row['deal_id']);
                    $email_message = "http://localverifications.com/getFound/resetPassword.php?email=".$row['contact_email']."&token=".$passwordToken."&reset_type=Sadz123&user_type=c";
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
    <p class="title" style="margin-top: 50px;">Dear Mr. '.$row['contact_email'].',</p>
    <div class="mailcontent" style="text-indent: 40px;text-align: justify;">
     <h3>Your Password reset link :</h3>
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

            @mail($row['contact_email'],'LocalVerifications : Generate your get found login password',$message,$headers);
                    $forgot_message[] = "We have sent mail reset password link.";
                    $_SESSION['forgot_message'] = $forgot_message;
                    header('Location:listDeals.php');
                    die();
                }
            // }
            
		}
		
        if($pipedrive_stage == 'completed'){
            try{
                $sql4 = "select * from report_ready where client_id=".$deal_id;
                $result = $dbh->query($sql4);
                if($result->rowCount()){
                   //
                }else{
                     $sql5 = "INSERT INTO report_ready (client_id) VALUES (:client_id)";
                    $q = $dbh->prepare($sql5);
                    $data = array(
                              ':client_id'=>$deal_id,
                            );
                    $q->execute($data); 
                }
            }
            catch(PDOExecption $e){
                print "Error!: " . $e->getMessage() . "</br>";
                header("Location:listDeals.php");
                die();
            }
        }else{
            try{
                $sql6 = "select * from report_ready where client_id=".$deal_id;
                $result = $dbh->query($sql6);
                if($result->rowCount()){
                    $queryDel = "DELETE from report_ready where client_id=?";
                    $qDel = $dbh->prepare($queryDel);
                    $qDel->execute(
                        array(
                            $deal_id,
                        )
                    );
                }
             }
            catch(PDOExecption $e){
                print "Error!: " . $e->getMessage() . "</br>";
                header("Location:listDeals.php");
                die();
            }
        }
        $_SESSION['updateDeal'] = $deal_title." updated successfully." ;
        header('Location:listDeals.php');
        die();
    }else{
        
    }
	
	
	
	
	
?>