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
                  
                  <h4 class="panel-title">Create Admin</h4>
                </div>
                <div class="panel-body panel-body-nopadding">
                  
                  <form class="form-horizontal form-bordered" method="post" action="create_userProcess.php">
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">First Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Firstname" class="form-control" name="firstname"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Middle Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Middle Name" class="form-control" name="middlename" />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Last Name</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Last Name" class="form-control" name="lastname" />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-6">
                        <input type="text" placeholder="Email" class="form-control" name="email" />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Password</label>
                      <div class="col-sm-6">
                        <input type="password" placeholder="Password" class="form-control" name="password" />
                      </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" class="btn btn-primary" name="submit" value="Create User"></button>&nbsp;
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