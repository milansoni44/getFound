<?php
    set_include_path('/home/localverificatio/public_html/getFound/includes/');
    require 'functions.php';
    require 'connection.php';
    require 'twilio-php/Services/Twilio.php';
    
    
    $sqlClient = "SELECT * from client join reports ON reports.client_id = client.client_id";
    $resultClient = $dbh->query($sqlClient);
    $now = date('Y-m-d h:m:s');
    $count = 0;
    foreach($resultClient as $rowClient){
        $date1 = new DateTime(date('Y-m-d'));
        $date2 = new DateTime($rowClient['date_time']);
        $google_listing_url = $rowClient['google_listing_url'];
        $to_date = date('Y-m-d', strtotime(' -1 day'));
        $from_date = date('Y-m-d', strtotime(' -31 day'));
        $diff = $date2->diff($date1)->format("%a");
        $isUpdated = $rowClient['isUpdated'];
        if($isUpdated == 'on'){
            $profileViews = $rowClient['google_listing_views'];
            $tracked_calls = $rowClient['tracked_calls'];
            $pageViews = $rowClient['website_views'];
        }else{
            /* google listing views*/
            $profileViews = getGoogleProfileViews($google_listing_url);
            // tracked calls
            $account_sid = 'ACbbea0f176fa0c17ef3d74d95d1e3474d'; 
            $auth_token = '6dae226ae3241f616c0932a65b6e7c3c'; 
            $client = new Services_Twilio($account_sid, $auth_token);
            $tracked_calls = getTrackedCalls($client);
            $pageViews = googlePageViews($rowClient['analytic_id']);
        }
        if($diff >= 30){
            // send email
            
            $to = $rowClient['contact_email'];
            $subject = "Report from localverification from ".$from_date." to ".$to_date;

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
    <p class="title" style="margin-top: 50px;">Dear Mr.'.$rowClient['contact_person'].',</p>
    <div class="mailcontent" style="text-indent: 40px;text-align: justify;">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac euismod elit. Ut nec gravida ante. Nunc justo sapien, mollis id lorem in, cursus mattis ex. Cras et lacus vitae quam scelerisque consectetur sit amet nec leo. In porttitor sollicitudin est quis scelerisque. Sed sed nulla vitae neque imperdiet aliquam eu vel turpis. Sed bibendum pharetra nunc non pretium. Etiam id malesuada risus, et ultricies dolor. Ut vitae purus est. Cras sed purus aliquet, ornare felis nec, eleifend nisl. Morbi congue suscipit justo ut ornare.</p>
      <p>Morbi vel viverra massa, non pharetra ex. Donec nec eros et est pharetra maximus sed vitae libero. Suspendisse potenti. In vel mollis ligula. Vestibulum eget consequat turpis. Vestibulum et volutpat metus. Nunc rutrum id arcu ac bibendum. Maecenas libero augue, pharetra vulputate odio non, porttitor faucibus urna. Aenean aliquam ligula ut viverra blandit. Integer vulputate lacus at elit pellentesque lacinia. Vivamus placerat dui id mi commodo hendrerit. Nam et sagittis magna, eget pharetra urna. Quisque id magna suscipit est interdum efficitur.</p>
    </div>
    <div>Remarks: '.$rowClient['remarks'].'</div>
    <div class="contacticons" style="margin: 30px 0px 30px 0px;">
      <div class="box" style="float: left;margin: 0px 10px 10px 0px;width: 45%;border: 1px solid #ccc;text-align:center;">
        <p style="text-align:center;margin-top:30px;"><img src="http://vakratundasystem.in/application/newsletterdemo/envelope.png" style="width:30px;height:30px;" /></i></p>
        <p class="details" style="font-size:1.563em;text-align:center;">Website Views</p>
        <div class="number" style="background: #87CEEB;text-align:center;padding:10px;text-align:center;"><span style="margin-top:15px;font-weight: bold;font-size: 3.5em;color:#fff;text-align:center;">'.$pageViews.'</span></div>
      </div>
      <div class="box" style="float: left;margin: 0px 10px 10px 0px;width: 45%;border: 1px solid #ccc;text-align:center;">
        <p style="text-align:center;margin-top:30px;"><img src="http://vakratundasystem.in/application/newsletterdemo/envelope.png" style="width:30px;height:30px;" /></i></p>
        <p class="details" style="font-size:1.563em;text-align:center;">Google Listing Views</p>
        <div class="number" style="background: #87CEEB;text-align:center;padding:10px;text-align:center;"><span style="margin-top:15px;font-weight: bold;font-size: 3.5em;color:#fff;text-align:center;">'.$profileViews.'</span></div>
      </div>
      <div class="box" style="float: left;margin: 0px 10px 10px 0px;width: 45%;border: 1px solid #ccc;text-align:center;">
        <p style="text-align:center;margin-top:30px;"><img src="http://vakratundasystem.in/application/newsletterdemo/envelope.png" style="width:30px;height:30px;" /></i></p>
        <p class="details" style="font-size:1.563em;text-align:center;">Tracked Calls</p>
        <div class="number" style="background: #87CEEB;text-align:center;padding:10px;text-align:center;"><span style="margin-top:15px;font-weight: bold;font-size: 3.5em;color:#fff;text-align:center;">'.$tracked_calls.'</span></div>
      </div>
      <div class="box" style="float: left;margin: 0px 10px 10px 0px;width: 45%;border: 1px solid #ccc;text-align:center;">
        <p style="text-align:center;margin-top:30px;"><img src="http://vakratundasystem.in/application/newsletterdemo/envelope.png" style="width:30px;height:30px;" /></i></p>
        <p class="details" style="font-size:1.563em;text-align:center;">Published Directory</p>
        <div class="number" style="background: #87CEEB;text-align:center;padding:10px;text-align:center;"><span style="margin-top:15px;font-weight: bold;font-size: 3.5em;color:#fff;text-align:center;">'.$rowClient['published_directory'].'</span></div>
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
            $headers .= 'From: noreply@localverification.com' . "\r\n";
            // $headers .= 'Cc: myboss@example.com' . "\r\n";
            mail($to,$subject,$message,$headers);
        }
    }
?>