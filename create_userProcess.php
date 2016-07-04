<?php 
    include_once("includes/connection.php");
    
    if($_POST['submit']){
        // echo '<pre>';
        // print_r($_POST);exit;
        extract($_POST);
        try{
            $sql = "INSERT INTO admin (first_name,middle_name,last_name,email,password) VALUES (:first_name,:middle_name,:last_name,:email,:password)";
            $q = $dbh->prepare($sql);
            $data = array(
                              ':first_name'=>$firstname,
                              ':middle_name'=>$middlename,
                              ':last_name'=>$lastname,
                              ':email'=>$email,
                              ':password'=>md5($password),
                             
                    );
            //echo '<pre>';
            // print_r($data);exit;
            $q->execute($data);
            header("Location:listUser.php");
            die();
            
        }
        catch(PDOExecption $e){
            print "Error!: " . $e->getMessage() . "</br>";
            header("Location:createUser.php");
            die();
        }
    }
?>