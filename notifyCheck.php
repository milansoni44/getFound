<?php 
    include_once("includes/connection.php");
        $emailHeader = '<html>
                            <head>
                            </head>
            
                            <body>
                                <table width="70%">';
        $emailFooter  = '       </table>
                            </body> 
                        </html>';
        $sql = "select * from client where notify_client=false";
        $result = $dbh->query($sql);
        var_dump($result);
        echo '<pre>';
        $emailBody ; 
        foreach($result as $row){
            $emailBody .= '<tr>
                            <td>'. $row['deal_title'].'</td><td>'. $row['contact_email'].'</td><td>'. $row['phone'].'</td>'.
                          '</tr>';
        }
        $email = $emailHeader.$emailBody.$emailFooter;
        $to = "milansoni44@gmail.com";
        $subject = "Notification : You have news deal to check";
        $txt = $email;
        $headers = "From: dhavalthakor28691@gmail.com" . "\r\n" .
        "CC: nitin.johnson2000@gmail.com"."\r\n"."Content-Type: text/html";

        mail($to,$subject,$txt,$headers);
        
?>



