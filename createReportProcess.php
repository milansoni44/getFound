<?php 
    include_once("includes/connection.php");
    
    if($_POST['submit']){
        extract($_POST);
        $date1 = explode('/',$date);
        
        $temp[0] = $date1[2];
        $temp[1] = $date1[0];
        $temp[2] = $date1[1];
        $date2 = implode('/',$temp);
        // echo '</pre>';
        // print_r($date1);
        try{
            $sql = "INSERT INTO reports (client_id,published_directory,date_time) VALUES (:client_id,:published_directory,:date_time)";
            $q = $dbh->prepare($sql);
            $data = array(
                              ':client_id'=>$deal,
                              ':published_directory'=>$publish_derectory,
                              ':date_time'=>$date2,
                    );
            // echo '<pre>';
            // print_r($data);exit;
            $q->execute($data);
            header("Location:listReport.php");
            die();
            
        }
        catch(PDOExecption $e){
            print "Error!: " . $e->getMessage() . "</br>";
            header("Location:createReport.php");
            die();
        }
    }
?>