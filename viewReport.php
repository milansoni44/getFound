<?php 
   include_once("header.php");
    if(isset($_GET['id'])){
        // $sql = "select reports.*,admin.first_name,admin.last_name from reports join admin ON admin.admin_id = reports.client_id where report_id = '".$_GET['id']."'";
        $sql = 'SELECT * from reports where report_id='.$_GET['id'];
        $result = $dbh->query($sql);
        foreach($result as $row){
            $published_directory = $row['published_directory'];
            $google_views = $row['google_listing_views'];
            $tracked_calls = $row['tracked_calls'];
            $website_views = $row['website_views'];
            $remarks = $row['remarks'];
            $date = $row['date_time'];
            $date1 = explode('-',$date);
        
            $temp[0] = $date1[1];
            $temp[1] = $date1[2];
            $temp[2] = $date1[0];
            $date2 = implode('/',$temp);
            $deal_id = $row['client_id'];
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
                  
                  <h4 class="panel-title">View Report</h4>
                </div>
                <div class="panel-body panel-body-nopadding">
                  
                  <form class="form-horizontal form-bordered" method="post" >
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Deal : </label>
                      <div class="col-sm-9">
                        <!--<select name="deal" disabled>
                            <option value="0">--Select Deal--</option>
                            <?php 
                                $sql = "select client_id,deal_title from client";
                                $result = $dbh->query($sql);
                                foreach($result as $row){
                            ?>
                            <option value="<?php echo $row['client_id'] ?>"  <?php if($deal_id == $row['client_id']){ ?> selected <?php } ?>><?php echo $row['deal_title'] ?></option>
                            <?php
                                }
                            ?>
                        </select>-->
                        <?php 
                            $sql = "select client_id,deal_title from client where client_id = ".$deal_id;
                            $result = $dbh->query($sql);
                            foreach($result as $row){
                        ?>
                        <label class="col-sm-6 control-label" style="text-align: left;"><?php echo $row['deal_title']; ?></label>
                        <?php
                            }
                        ?>
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Date : </label>
                        <div class="col-sm-9">
                            <!--<input type="text" class="form-control" name="date" placeholder="mm/dd/yyyy" id="datepicker" value="<?php echo $date2; ?>" disabled>-->
                            <label class="col-sm-6 control-label" style="text-align: left;"><?php echo $date2; ?></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" id="google_views">Google Listing Views : </label>
                        <div class="col-sm-9">
                            <!--<input type="text" class="form-control" name="google_listing_views" placeholder="Google Listing Views" id="google_views" value="<?php echo $google_views; ?>" disabled>-->
                            <label class="col-sm-6 control-label" style="text-align: left;" id="google_views"><?php echo $google_views; ?></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" id="tracked_calls">Tracked Calls : </label>
                        <div class="col-sm-9">
                            <!--<input type="text" class="form-control" name="tracked_calls" placeholder="Tracked Calls" id="tracked_calls" value="<?php echo $tracked_calls; ?>" disabled>-->
                            <label class="col-sm-6 control-label" style="text-align: left;" id="tracked_calls"><?php echo $tracked_calls; ?></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" id="website_views">Website Views : </label>
                        <div class="col-sm-9">
                            <!--<input type="text" class="form-control" name="website_views" placeholder="Website Views" id="website_views" value="<?php echo $website_views; ?>" disabled>-->
                            <label class="col-sm-6 control-label" style="text-align: left;" id="website_views"><?php echo $website_views; ?></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Published Directory : </label>
                        <div class="col-sm-9">
                            <!--<input type="text" class="form-control" placeholder="Published Directory" name="publish_derectory" value="<?php echo $published_directory; ?>" disabled>-->
                            <label class="col-sm-6 control-label" style="text-align: left;"><?php echo $published_directory; ?></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Remarks : </label>
                        <div class="col-sm-9">
                            <!--<input type="text" class="form-control" placeholder="Remarks" name="remarks" value="<?php echo $remarks; ?>" disabled>-->
                            <label class="col-sm-6 control-label" style="text-align: left;"><?php echo $remarks; ?></label>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="http://localverifications.com/getFound/index.php" id="myButton" class="btn btn-primary" >Back</a><!--<input type="submit" class="btn btn-primary" name="submit" value="Edit Report"></button>&nbsp;-->
                            </div>
                        </div>
                    </div><!-- panel-footer -->
                </form>
                  
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- contentpanel -->
    <?php 
        include_once "footer.php";
    ?>