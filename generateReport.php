<?php 
   include_once("header.php");
// include_once("includes/connection.php");
    
    if(isset($_GET['id'])){
        $sql = "select reports.*,admin.first_name,admin.last_name from reports join admin ON admin.admin_id = reports.client_id where report_id = '".$_GET['id']."'";
        $result = $dbh->query($sql);
        foreach($result as $row){
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $google_listing_views = $row['google_listing_views'];
            $tracked_calls = $row['tracked_calls'];
            $website_views = $row['website_views'];
            $published_directory = $row['published_directory'];
        }
    }else{
        
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
                  
                  <h4 class="panel-title">Generate Report</h4>
                </div>
                <div class="panel-body panel-body-nopadding">
                  
                  <form class="form-horizontal form-bordered" method="post" action="generateReportProcess.php">
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">First Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Firstname" class="form-control" name="firstname" value="<?php echo $first_name; ?>" disabled />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Last Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Last Name" class="form-control" name="lastname" value="<?php echo $last_name; ?>" disabled />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Google Listing Views</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Google Listing Views" class="form-control" name="google_listing_view" value="<?php echo $google_listing_views; ?>" disabled />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tracked Calls</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Tracked Calls" class="form-control" name="tracked_calls" value="<?php echo $tracked_calls; ?>" disabled />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Websites Views</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Websites Views" class="form-control" name="website_views" value="<?php echo $tracked_calls; ?>" disabled />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Published Directory</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Published Directory" class="form-control" name="published_directory" value="<?php echo $published_directory; ?>" />
                      </div>
                    </div>
                    
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" class="btn btn-primary" name="submit" value="Generate Report"></button>&nbsp;
                            </div>
                        </div>
                    </div><!-- panel-footer -->
                    <input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
                    <input type="hidden" name="last_name" value="<?php echo $last_name; ?>">
                    <input type="hidden" name="report_id" value="<?php echo $_GET['id']; ?>">
                  </form>
                  
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- contentpanel -->
    <?php 
        include_once "footer.php";
    ?>