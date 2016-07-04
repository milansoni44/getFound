<?php 
   include_once("header.php");
// include_once("includes/connection.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from admin where admin_id='".$id."'";
        $result = $dbh->query($sql);
        foreach($result as $row){
            $first_name = $row['first_name'];
            $middle_name = $row['middle_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $user_type = $row['user_type'];
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
            <div class="panel panel-default">
                <div class="panel-heading">
                  
                  <h4 class="panel-title">Create Admin</h4>
                </div>
                <div class="panel-body panel-body-nopadding">
                  
                  <form class="form-horizontal form-bordered" method="post" action="edit_userProcess.php">
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">First Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Firstname" class="form-control" name="first_name" value="<?php echo $first_name; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Middle Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Middle Name" class="form-control" name="middle_name" value="<?php echo $middle_name; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Last Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="<?php echo $last_name; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Email" class="form-control" name="email" value="<?php echo $email; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Password</label>
                      <div class="col-sm-6">
                        <input type="password" placeholder="Password" class="form-control" name="password" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-6">
                             <div class="radio"><label><input type="radio" name="userType" value="0" <?php if($user_type == 0) {?> checked <?php } ?>> Admin</label></div>
                             <div class="radio"><label><input type="radio" name="userType" value="1" <?php if($user_type == 1) {?> checked <?php } ?>> Client</label></div>
                      </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" class="btn btn-primary" name="submit" value="Update User"></button>&nbsp;
                                <button class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div><!-- panel-footer -->
                    <input type="hidden" name="admin_id" value="<?php echo $row['admin_id']; ?>" />
                  </form>
                  
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- contentpanel -->
    <?php 
        include_once "footer.php";
    ?>