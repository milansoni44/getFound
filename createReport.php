<?php 
    include_once("header.php");
    // include_once("includes/connection.php");
?>
<?php 
  
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
                  
                  <h4 class="panel-title">Create Report</h4>
                </div>
                <div class="panel-body panel-body-nopadding">
                  
                  <form class="form-horizontal form-bordered" method="post" action="createReportProcess.php">
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Deal</label>
                      <div class="col-sm-6">
                        <select name="deal">
                            <option value="0">--Select Deal--</option>
                            <?php 
                                $sql = "select client_id,deal_title from client";
                                $result = $dbh->query($sql);
                                foreach($result as $row){
                            ?>
                            <option value="<?php echo $row['client_id'] ?>"><?php echo $row['deal_title'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="date" placeholder="mm/dd/yyyy" id="datepicker">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Published Directory</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Published Directory" name="publish_derectory">
                        </div>
                    </div>
                    
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" class="btn btn-primary" name="submit" value="Create Report"></button>&nbsp;
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