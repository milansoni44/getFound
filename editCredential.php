<?php 
    include_once("header.php");
//    include_once("includes/connection.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from credential where id='".$id."'";
        $result = $dbh->query($sql);
        foreach($result as $row){
            $deal_id = $row['deal_id'];
            $twilio_sid = $row['twilio_sid'];
            $twilio_token = $row['twilio_token'];
            $analytic_id = $row['analytic_id'];
        }
        // echo '<pre>';
        // print_r($row);exit;
    }
    else{
        header('Location:listClient.php');
        die();
    }
?>
       
        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-heading">
                  
                  <h4 class="panel-title">Edit Credential</h4>
                </div>
                <div class="panel-body panel-body-nopadding">
                  
                  <form class="form-horizontal form-bordered" method="post" action="editCredentiallProcess.php">
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Deal Id</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Deal Id" class="form-control" name="deal_id" value="<?php echo $deal_id; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Twilio SID</label>
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
                      <label class="col-sm-3 control-label">Analytic Id</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Analytic ID" class="form-control" name="analytic_id" value="<?php echo $analytic_id; ?>"/>
                      </div>
                    </div>
                    
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" class="btn btn-primary" name="submit" value="Edit Deal"></button>&nbsp;
                            </div>
                        </div>
                    </div><!-- panel-footer -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                  </form>
                  
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- contentpanel -->
    <?php 
        include_once "footer.php";
    ?>