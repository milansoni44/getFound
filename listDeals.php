<?php 
 include_once("header.php");
// include_once("includes/connection.php");
    // if(isset($_POST['set'])){
        // extract($_POST);
       // $_SESSION['month'] = $month;
       // $_SESSION['year'] = $year;
    // }
    // if(isset($_GET['clearMonthYear'])){
        
        // unset($_SESSION['month']);
        // unset($_SESSION['year']);
    // }
    
?>
    <div class="contentpanel">
        <?php 
            if(isset($_SESSION['updateDeal'])){
        ?>
        <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $_SESSION['updateDeal']; ?><a href="#" class="alert-link"></a>.
        </div>
        <?php 
            }
            unset($_SESSION['updateDeal']);
        ?>  
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">List Deals
		  <span style="margin: -7px 13px; padding-left: 10px;float: right!important;"> <a class="btn btn-danger" href="listDeals.php?dealTye=<?php echo "disable"; ?>"> Inactive Deals</a> </span>
		  <span style="margin: -7px 13px; float: right!important;"> <a class="btn btn-success" href="listDeals.php?dealTye=<?php echo "enable"; ?>"> Active Deals </a> </span>
		  
		  
		  </h3>
		  
        </div> 
        <div class="panel-body">
          <!-- <h5 class="subtitle mb5">Alternative Pagination</h5>
          <p>The example below shows the full_numbers type of pagination, where 'first', 'previous', 'next' and 'last' buttons are presented, as well as the five pages around the current page.</p>
          <br /> -->
          <div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Deal Title</th>
                    <th>Email</th>
                    <!--<th>G+ Url</th>
                    <th>Twilio Number</th>
                    <th>LV Site</th>-->
                    <th>Pipedrive</th>
					<th>Action</th>
                 </tr>
              </thead>
              <tbody>
                <?php 
					if(isset($_GET['dealTye'])){
						$dealTye = $_GET['dealTye'];
                        
						$sql = "select * from client where status='$dealTye' ORDER BY date_time asc";
                        // echo $sql; exit;
					}else{
						$sql = "select * from client where status='enable' ORDER BY date_time asc";
					}
                    
                    $result = $dbh->query($sql);
                    $deal_count = 1;
                    foreach($result as $row){
                ?>
                <tr class="odd gradeX">
                    <td width="2%"><?php echo $deal_count++; ?> </td>
                    <td width="13%"><?php echo $row['deal_title']; ?></td>
                    <td width="10%"><?php echo $row['contact_email']; ?></td>
                    <!--<td width="20%" class="center"> <?php echo $row['google_listing_url']; ?></td>
                    <td width="15%" class="center"> <?php echo $row['call_tracking_number']; ?></td>
                    <td width="20%" class="center"> <?php echo $row['localverification_site']; ?></td>-->
                    <td width="5%"><?php echo $row['pipedrive_stage']; ?></td>
                    <td width="10%"> <a href="editDeal.php?id=<?php echo $row['client_id']; ?>"><i class="fa fa-pencil-square-o"></i></a><?php //}else{?> <a href="deleteDeal.php?id=<?php echo $row['client_id']; ?>"  onclick="return confirm('Are you sure?');"><i class="fa fa-trash-o"></i></a><?php //} ?></td>
                    
                 </tr>
                <?php 
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