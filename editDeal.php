<?php 
    include_once("header.php");
//    include_once("includes/connection.php");
    
	
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from client where client_id='".$id."'";
        $result = $dbh->query($sql);
        foreach($result as $row){
            $deal_title = $row['deal_title'];
            $contact_email = $row['contact_email'];
            $phone = $row['phone'];
            $google_listing_url = $row['google_listing_url'];
            $call_tracking_number = $row['call_tracking_number'];
            $twilio_sid = $row['twilio_sid'];
            $twilio_token = $row['twilio_token'];
            $localverification_site = $row['localverification_site'];
            //$analytic_user_id = $row['analytic_user_id'];
            $analytic_id = $row['analytic_id'];
            $pipedrive_stage = $row['pipedrive_stage'];
        }
        // echo '<pre>';
        // print_r($row);exit;
    }
    else{
        header('Location:listDeals.php');
        die();
    }
?>
       
        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-heading">
                  
                  <h4 class="panel-title">Edit Deal</h4>
                </div>
                <div class="panel-body panel-body-nopadding">
                  
                  <form class="form-horizontal form-bordered" method="post" action="editDealProcess.php">
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Deal Title</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="deal_title" class="form-control" name="deal_title" value="<?php echo $deal_title; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Contact Email <span style="color:red; font-size:20px;">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Contact Email" class="form-control" name="contact_email" value="<?php echo $contact_email; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Phone</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Phone" class="form-control" name="phone" value="<?php echo $phone; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Twilio Call Tracking Number  <span style="color:red; font-size:20px;">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Call Tracking Number" class="form-control" name="call_tracking_number" value="<?php echo $call_tracking_number; ?>"/>
                      </div>
                    </div>
                    
					<div class="form-group">
                      <label class="col-sm-3 control-label">Twilio SID  <span style="color:red; font-size:20px;">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Twilio SID" class="form-control" name="twilio_sid" value="<?php echo $twilio_sid; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Twilio Token</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Twilio Token" class="form-control" name="twilio_token" value="<?php echo $twilio_token; ?>"/>
                      </div>
                    </div>
                    
					
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Google Listing Url  <span style="color:red; font-size:20px;">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Google Listing Url" class="form-control" name="google_listing_url"  value="<?php echo $google_listing_url; ?>" />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Localverification Site  <span style="color:red; font-size:20px;">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Localverification Site" class="form-control" name="localverification_site" value="<?php echo $localverification_site; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Analytic Id  <span style="color:red; font-size:20px;">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Analytic ID" class="form-control" name="analytic_id" value="<?php echo $analytic_id; ?>"/>
                      </div>
                    </div>
					
					<!--<div class="form-group">
                      <label class="col-sm-3 control-label">Analytic User Id ( From Google Analytics)  <span style="color:red; font-size:20px;">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Analytic User ID" class="form-control" name="analytic_user_id" value="<?php echo $analytic_user_id; ?>"/>
                      </div>
                    </div>-->
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Pipedrive Stage</label>
                      <div class="col-sm-6">
                        <select name="pipedrive_stage" style="width:150px">
                            <option value="arb_activated" <?php if($pipedrive_stage == "arb_activated"){?> selected <?php } ?>>ARB Activated</option>
                            <option value="completed" <?php if($pipedrive_stage == "completed"){?> selected <?php } ?>>Completed</option>
                        </select>
                      </div>
                    </div>
					<div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12 col-sm-offset-2">
                              <span style="color:red; font-size:15px;"> Note </span> : To make deal active for report generation, all field makred with <span style="color:red; font-size:20px;">*</span> must have filled with appropriate value. 
                            </div>
                        </div>
					
						
                    </div>
                    <div class="panel-footer">
                        
						<div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" class="btn btn-primary" name="submit" value="Save Deal"></button>&nbsp;
                                <a href="listDeals.php" class="btn btn-primary" >Cancel</a>&nbsp;
                            </div>
                        </div>
						
                    </div><!-- panel-footer -->
                    <input type="hidden" name="deal_id" value="<?php echo $id; ?>" />
                  </form>
                  
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- contentpanel -->
    <?php 
        include_once "footer.php";
    ?>