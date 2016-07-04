<?php 
 include_once("header.php");
 // include_once("includes/connection.php");
    if(isset($_POST['set'])){
        extract($_POST);
       $_SESSION['month'] = $month;
       $_SESSION['year'] = $year;
       $_SESSION['deal'] = $deal;
    }
    if(isset($_GET['clearMonthYear'])){
        
        unset($_SESSION['month']);
        unset($_SESSION['year']);
        unset($_SESSION['deal']);
    }
    
    
    
    
?>
    <div class="contentpanel">
        <?php 
            if(isset($_SESSION['message'])){
        ?>
        <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $_SESSION['message']; ?><a href="#" class="alert-link"></a>.
        </div>
        <?php 
            }
            unset($_SESSION['message']);
        ?>  
      <div class="panel panel-default">
        <!-- <div class="panel-heading">
          
          <h3 class="panel-title">Data Tables</h3>
          <p>DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table.</p>
        </div> -->
        <div class="panel-body">
            <form action="listReport.php" method="post">
                <select name="month" style="width: 150px;">
                    <?php 
                        if(isset($_SESSION['month'])){
                            
                            
                    ?>
                    <option value="0">--Select Month--</option>
                    <option value="1" <?php if($_SESSION['month'] == "1"){?>selected<?php } ?>>1</option>
                    <option value="2" <?php if($_SESSION['month'] == "2"){?>selected<?php } ?>>2</option>
                    <option value="3" <?php if($_SESSION['month'] == "3"){?>selected<?php } ?>>3</option>
                    <option value="4" <?php if($_SESSION['month'] == "4"){?>selected<?php } ?>>4</option>
                    <option value="5" <?php if($_SESSION['month'] == "5"){?>selected<?php } ?>>5</option>
                    <option value="6" <?php if($_SESSION['month'] == "6"){?>selected<?php } ?>>6</option>
                    <option value="7" <?php if($_SESSION['month'] == "7"){?>selected<?php } ?>>7</option>
                    <option value="8" <?php if($_SESSION['month'] == "8"){?>selected<?php } ?>>8</option>
                    <option value="9" <?php if($_SESSION['month'] == "9"){?>selected<?php } ?>>9</option>
                    <option value="10" <?php if($_SESSION['month'] == "10"){?>selected<?php } ?>>10</option>
                    <option value="11" <?php if($_SESSION['month'] == "11"){?>selected<?php } ?>>11</option>
                    <option value="12" <?php if($_SESSION['month'] == "12"){?>selected<?php } ?>>12</option>
                    <?php 
                        }else{
                    ?>
                    <option value="0">--Select Month--</option>
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="4" >4</option>
                    <option value="5" >5</option>
                    <option value="6" >6</option>
                    <option value="7" >7</option>
                    <option value="8" >8</option>
                    <option value="9" >9</option>
                    <option value="10" >10</option>
                    <option value="11" >11</option>
                    <option value="12" >12</option>
                    
                            
                    <?php
                        }
                    ?>
                </select>
                <select name="year" style="width: 150px;">
                     <?php 
                        if(isset($_SESSION['year'])){
                    ?>
                        <option value="0">--Select Year--</option>
                        <option value="2014" <?php if($_SESSION['year'] == "2014"){?>selected<?php } ?>>2014</option>
                        <option value="2015" <?php if($_SESSION['year'] == "2015"){?>selected<?php } ?>>2015</option>
                        <option value="2016" <?php if($_SESSION['year'] == "2016"){?>selected<?php } ?>>2016</option>
                        <option value="2017" <?php if($_SESSION['year'] == "2017"){?>selected<?php } ?>>2017</option>
                        <option value="2018" <?php if($_SESSION['year'] == "2018"){?>selected<?php } ?>>2018</option>
                        <option value="2019" <?php if($_SESSION['year'] == "2019"){?>selected<?php } ?>>2019</option>
                        <option value="2020" <?php if($_SESSION['year'] == "2020"){?>selected<?php } ?>>2020</option>
                        <option value="2021" <?php if($_SESSION['year'] == "2021"){?>selected<?php } ?>>2021</option>
                        <option value="2022" <?php if($_SESSION['year'] == "2022"){?>selected<?php } ?>>2022</option>
                        <option value="2023" <?php if($_SESSION['year'] == "2023"){?>selected<?php } ?>>2023</option>
                        <option value="2024" <?php if($_SESSION['year'] == "2024"){?>selected<?php } ?>>2024</option>
                        <option value="2025" <?php if($_SESSION['year'] == "2025"){?>selected<?php } ?>>2025</option>
                        <option value="2026" <?php if($_SESSION['year'] == "2026"){?>selected<?php } ?>>2026</option>
                        <option value="2027" <?php if($_SESSION['year'] == "2027"){?>selected<?php } ?>>2027</option>
                        <option value="2028" <?php if($_SESSION['year'] == "2028"){?>selected<?php } ?>>2028</option>
                        <option value="2029" <?php if($_SESSION['year'] == "2029"){?>selected<?php } ?>>2029</option>
                        <option value="2030" <?php if($_SESSION['year'] == "2030"){?>selected<?php } ?>>2030</option>
                    <?php 
                        }else{
                            
                    ?>
                        <option value="0">--Select Year--</option>
                        <option value="2014" >2014</option>
                        <option value="2015" >2015</option>
                        <option value="2016" >2016</option>
                        <option value="2017" >2017</option>
                        <option value="2018" >2018</option>
                        <option value="2019" >2019</option>
                        <option value="2020" >2020</option>
                        <option value="2021" >2021</option>
                        <option value="2022" >2022</option>
                        <option value="2023" >2023</option>
                        <option value="2024" >2024</option>
                        <option value="2025" >2025</option>
                        <option value="2026" >2026</option>
                        <option value="2027" >2027</option>
                        <option value="2028" >2028</option>
                        <option value="2029" >2029</option>
                        <option value="2030" >2030</option>
                    <?php
                        }
                    ?>
                </select>
                <?php 
                    if($_SESSION['usertype'] == 'admin'){
                ?>
                <select name="deal" style="width: 250px;">
                    <option value="0">--Select Deal--</option>
                     <?php 
                        if(isset($_SESSION['deal'])){
                            // $sqlDeal = 'select * from deal join reports ON reports.client_id = deal.client_id';
                            $sqlDeal = 'select * from client join reports ON reports.client_id = client.client_id';
                            $resultDeal = $dbh->query($sqlDeal);
                            foreach($resultDeal as $rowDeal){
                            
                    ?>
                    <option value="<?php echo $rowDeal['deal_id']; ?>" <?php if($_SESSION['deal'] == $rowDeal['deal_id']) {?> selected <?php }?>><?php echo $rowDeal['deal_title']; ?></option>
                    <?php 
                            }
                        }else{
                            $sqlDeal = 'select * from client join reports ON reports.client_id = client.client_id';
                            $resultDeal = $dbh->query($sqlDeal);
                            foreach($resultDeal as $rowDeal){    
                    ?>
                    <option value="<?php echo $rowDeal['deal_id']; ?>"><?php echo $rowDeal['deal_title']; ?></option>    
                    <?php
                            }
                        }
                    ?>
                </select>
                <?php 
                    }
                ?>
                <input type="submit" class="btn btn-primary" value="Set" name="set">
                <a href="listReport.php?clearMonthYear=true" class="btn btn-primary">Reset</a>
            </form>    
        </div>
        <div class="panel-body">
          <h5 class="subtitle mb5">List Report</h5>
          <br />
          <!-- <h5 class="subtitle mb5">Alternative Pagination</h5>
          <p>The example below shows the full_numbers type of pagination, where 'first', 'previous', 'next' and 'last' buttons are presented, as well as the five pages around the current page.</p>
          <br /> -->
          <?php
            if(isset($_SESSION['month']) && isset($_SESSION['year']) || isset($_SESSION['deal']))
            {
          ?>
          <div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <!--<th>Firstname</th>-->
                    <th>Client</th>
                    <!--<th>G+ Views</th>
                    <th>Tracked Calls</th>
                    <th>Website Views</th>-->
                    <th>Published Directory</th>
                    <th>Date</th>
                    <th>Email Status</th>
                <?php 
                    if($_SESSION['usertype'] == 'admin'){
                ?>
					<th>Action </th>
                <?php 
                    }
                ?>
                 </tr>
              </thead>
              <tbody>
                <?php 
                     if($_SESSION['usertype'] == 'admin'){
                           $sql = "select reports.*,client.deal_title from reports join client ON client.client_id = reports.client_id"; 
                     }else{
                          $sql = "select reports.*,client.deal_title from reports join client ON client.client_id = reports.client_id where client.client_id=".$_SESSION['admin_id']."  and status='enable'";
                     }
                    $result = $dbh->query($sql);
                    foreach($result as $row){
                        $date = explode('-',$row['date_time']);
                        if($_SESSION['month'] == $date[1] && $_SESSION['year'] == $date[0]){
                ?>
                <tr class="odd gradeX">
                    <!--<td><?php echo $row['first_name']; ?></td>-->
                    <td><?php echo $row['deal_title']; ?></td>
                    <!--<td><?php echo $row['google_listing_views']; ?></td>
                    <td class="center"> <?php echo $row['tracked_calls']; ?></td>
                    <td class="center"> <?php echo $row['website_views']; ?></td>-->
                    <td class="center"> <?php echo $row['published_directory']; ?></td>
                    <td class="center"> <?php echo $row['date_time']; ?></td>
                    <td align="center"><?php if($row['emailed_status'] == 'yes'){?><span style="color:green;"><i class="fa fa-check"></i></span><?php }else{?> <span style="color:red;"><i class="fa fa-times"></i></span><?php } ?></td>
                    <?php 
                        if($_SESSION['usertype'] == 'admin'){
                    ?>
                    <td> <a href="editReport.php?id=<?php echo $row['report_id']; ?>">Edit Report</a> </td>
                    <?php 
                        }
                    ?>
                 </tr>
                <?php 
                        }
                    }
                ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->
          <?php
            }else{
          ?>
          <div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <!--<th>Firstname</th>-->
                    <th>Client</th>
                    <!--<th>Google Listing Views</th>
                    <th>Tracked Calls</th>
                    <th>Website Views</th>-->
                    <th>Published Directory</th>
                    <th>Date</th>
                    <th>Report Status</th>
					 <?php 
                    if($_SESSION['usertype'] == 'admin'){
                ?>
					<th>Action </th>
                <?php 
                    }
                ?>
                 </tr>
              </thead>
              <tbody>
                <?php 
                     if($_SESSION['usertype'] == 'admin'){
                         $sql = "select reports.*,client.deal_title from reports join client ON client.client_id = reports.client_id";    
                     }else{
                          $sql = "select reports.*,client.deal_title from reports join client ON client.client_id = reports.client_id where client.client_id=".$_SESSION['admin_id'];
                     }
                   
                    $result = $dbh->query($sql);
                    foreach($result as $row){
                ?>
                <tr class="odd gradeX">
                    <!--<td><?php echo $row['first_name']; ?></td>-->
                    <td><?php echo $row['deal_title']; ?></td>
                    <!--<td><?php echo $row['google_listing_views']; ?></td>
                    <td class="center"> <?php echo $row['tracked_calls']; ?></td>
                    <td class="center"> <?php echo $row['website_views']; ?></td>-->
                    <td class="center"> <?php echo $row['published_directory']; ?></td>
                    <td class="center"> <?php echo $row['date_time']; ?></td>
                    <td align="center"><?php if($row['emailed_status'] == 'yes'){?><span style="color:green;"><i class="fa fa-check"></i></span><?php }else{?> <span style="color:red;"><i class="fa fa-times"></i></span><?php } ?></td>
                    <?php 
                        if($_SESSION['usertype'] == 'admin'){
                    ?>
                    <td> <a href="editReport.php?id=<?php echo $row['report_id']; ?>">Edit Report</a> </td>
                    <?php 
                        }
                    ?>
                    
                 </tr>
                <?php 
                    }
                ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->
          <?php 
            }
          ?>
          
        </div><!-- panel-body -->
      </div><!-- panel -->
        
    </div><!-- contentpanel -->
   <?php 
        include_once "footer.php";
    ?>