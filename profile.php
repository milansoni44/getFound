<?php 
    include_once("header.php");
	//include_once("includes/connection.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if($_SESSION['usertype'] == 'admin'){
            
            $sql = "select * from admin where admin_id='".$id."'";
            $result = $dbh->query($sql);
            foreach($result as $row){
                $first_name = $row['first_name'];
                $middle_name = $row['middle_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                // $user_type = $_SESSION['usertype'];
                $contact = $row['contact'];
            }
        }else{
            $sql = "select * from client where client_id='".$id."'";
            $result = $dbh->query($sql);
            foreach($result as $row){
                $deal_title = $row['deal_title'];
                $contact_email = $row['contact_email'];
                // $first_name = $row['first_name'];
                // $middle_name = $row['middle_name'];
                // $last_name = $row['last_name'];
                $email = $row['email'];
                $user_type = $_SESSION['usertype'];
                $contact = $row['contact'];
            }
        }
    }else{
        header('Location:login.php');
        die();
    }
?>
      
        <div class="contentpanel">
            <!--
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <<strong>Well done!</strong> Admin is successfully saved<a href="#" class="alert-link"></a>.
            </div>
            -->
            <?php 
                if($user_type=='admin')
            ?>
        
        <div class="panel panel-default">
                <div class="panel-heading">
                  
                  <h4 class="panel-title">Edit Profile</h4>
                </div>
                <div class="panel-body panel-body-nopadding">
                  
                  <form class="form-horizontal form-bordered" method="post" action="editAdminProcess.php">
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">First Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Firstname" class="form-control" name="first_name" value="<?php echo $first_name; ?>" disabled />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Middle Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Middle Name" class="form-control" name="middle_name" value="<?php echo $middle_name; ?>" disabled />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Last Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="<?php echo $last_name; ?>" disabled />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Email" class="form-control" name="email" value="<?php echo $email; ?>" disabled />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Contact</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Contact" class="form-control" name="contact" value="<?php echo $contact;?>" disabled />
                      </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <a class="btn btn-primary" href="editProfile.php?id=<?php echo $row['admin_id']; ?>">Edit</a>&nbsp;
                            </div>
                        </div>
                    </div><!-- panel-footer -->
                    <input type="hidden" name="admin_id" value="<?php echo $row['admin_id']; ?>" />
                  </form>
                  
                </div><!-- panel-body -->
            </div><!-- panel -->
        
            <?php 
                }else{
            ?>
        
            <div class="panel panel-default">
                <div class="panel-heading">
                  
                  <h4 class="panel-title">Edit Profile</h4>
                </div>
                <div class="panel-body panel-body-nopadding">
                  
                  <form class="form-horizontal form-bordered" method="post" action="editAdminProcess.php">
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Deal Title</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Deal Title" class="form-control" name="deal_title" value="<?php echo $deal_title; ?>" disabled />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Contact Email</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Contact Email" class="form-control" name="contact_email" value="<?php echo $contact_email; ?>" disabled />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Phone</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Phone" class="form-control" name="phone" value="<?php echo $phone; ?>" disabled />
                      </div>
                    </div>
                    
                 
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <a class="btn btn-primary" href="editProfile.php?id=<?php echo $row['admin_id']; ?>">Edit</a>&nbsp;
                            </div>
                        </div>
                    </div><!-- panel-footer -->
                    <input type="hidden" name="admin_id" value="<?php echo $row['admin_id']; ?>" />
                  </form>
                  
                </div><!-- panel-body -->
            </div><!-- panel -->
            
            <?php
                }
            ?>
            
        </div><!-- contentpanel -->
    <?php 
        include_once "footer.php";
    ?>