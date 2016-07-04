<?php 
    function generateRandomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 32; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    return $randomString;
    }
    
    function sendMail($email_from,$email_to,$email_subject,$email_message){
        //echo $email_from;exit;
        $headers = 'From: '.$email_from."\r\n".'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
    }
?>