<?php 
 include_once("header.php");
// include_once("includes/connection.php");
?>
    <div class="contentpanel">
        <?php 
            if(isset($_SESSION['updateCredential'])){
        ?>
        <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $_SESSION['updateCredential']; ?><a href="#" class="alert-link"></a>.
        </div>
        <?php 
            }
            unset($_SESSION['updateCredential']);
        ?>  
      <div class="panel panel-default">
        <!-- <div class="panel-heading">
          
          <h3 class="panel-title">Data Tables</h3>
          <p>DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table.</p>
        </div> -->
        <div class="panel-body">
          <h5 class="subtitle mb5">List Credential</h5>
          <br />
          <!-- <h5 class="subtitle mb5">Alternative Pagination</h5>
          <p>The example below shows the full_numbers type of pagination, where 'first', 'previous', 'next' and 'last' buttons are presented, as well as the five pages around the current page.</p>
          <br /> -->
          <div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                <tr>
                    <th>Deal</th>
                    <th>Twilio SID</th>
                    <th>Twilio Token</th>
                    <th>Analytic Id</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $sql = "select * from credential";
                    $result = $dbh->query($sql);
                    if(!$result){
                ?>
                <tr>
                    <td colspan="5"><?php echo "No records found."; ?></td>
                </tr>
                <?php
                    }else{
                        
                    foreach($result as $row){
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $row['deal_id']; ?></td>
                    <td><?php echo $row['twilio_sid']; ?></td>
                    <td class="center"> <?php echo $row['twilio_token']; ?></td>
                    <td class="center"> <?php echo $row['analytic_id']; ?></td>
                    <td> <a href="editCredential.php?id=<?php echo $row['id']; ?>">Edit </a><?php //}else{?> <a href="deleteCredential.php?id=<?php echo $row['id']; ?>"  onclick="return confirm('Are you sure?');">Delete</a><?php //} ?></td>
                    
                 </tr>
                <?php 
                        }
                    }
                ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div><!-- panel -->
        
    </div><!-- contentpanel -->
   <?php 
        include_once "footer.php";
    ?>