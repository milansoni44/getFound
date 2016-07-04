<?php 
    include_once("header.php");
// include_once("includes/connection.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from admin where admin_id='".$id."'";
        $result = $dbh->query($sql);
        foreach($result as $row){
            $user_type = $row['user_type'];
            $email = $row['email'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $middle_name = $row['middle_name'];
            $contact = $row['contact'];
            $business_name = $row['business_name'];
            $business_url = $row['business_url'];
            $website = $row['website'];
            $twillio_sid = $row['twillio_sid'];
            $twillio_token = $row['twillio_token'];
            $google_plus_url = $row['google_plus_url'];
        }
    }
    else{
        header('Location:listClient.php');
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
                  
                  <form class="form-horizontal form-bordered" method="post" action="editClientProcess.php">
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">First Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Firstname" class="form-control" name="first_name" value="<?php echo $first_name; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Middle Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Middle Name" class="form-control" name="middle_name" value="<?php echo $last_name; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Last Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="<?php echo $middle_name; ?>"/>
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
                      <label class="col-sm-3 control-label">Contact</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Contact" class="form-control" name="contact" value="<?php echo $contact; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Business Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Business Name" class="form-control" name="business_name" value="<?php echo $business_name; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Business URL</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="http:// Business URL" class="form-control" name="business_url" value="<?php echo $business_url; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Website</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="http:// Website" class="form-control" name="website" value="<?php echo $website; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Twillio Sid</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Twillio sid" class="form-control" name="twillio_sid" value="<?php echo $twillio_sid; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Twillio Token</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Twillio Token" class="form-control" name="twillio_token" value="<?php echo $twillio_token; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Google Plus Url</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="http:// google plus url" class="form-control" name="google_plus_url" value="<?php echo $google_plus_url; ?>"/>
                      </div>
                    </div>
                    
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" class="btn btn-primary" name="submit" value="Create User"></button>&nbsp;
                                <button class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div><!-- panel-footer -->
                    <input type="hidden" name="admin_id" value="<?php echo $id; ?>" />
                  </form>
                  
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- contentpanel -->
    <?php 
        include_once "footer.php";
    ?>