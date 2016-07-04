<?php 
    include_once("includes/sessionCheck.php");
	include_once("includes/connection.php");
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/LV_Fav.png" type="image/png">

  <title>GetFound | LocalVerification LLC</title>
  <!--<link rel="stylesheet" href="css/prism.css">
  <link rel="stylesheet" href="css/chosen.css">
  <link rel="stylesheet" href="js/">-->
  <link href="css/style.default.css" rel="stylesheet">
  <link href="css/jquery.datatables.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body>

<!-- Preloader 
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
-->
<section>
  
  <div class="leftpanel">
    
    <div class="logopanel">
        <h1><span>[</span> GetFound <span>]</span></h1>
    </div><!-- logopanel -->
    
    <div class="leftpanelinner">
        
        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">   
            <div class="media userlogged">
                <img alt="" src="images/photos/loggeduser.png" class="media-object">
                <div class="media-body">
                     <?php echo ucfirst($_SESSION['first_name'])." ".ucfirst($_SESSION['last_name']); ?>
                   
                </div>
            </div>
          
            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
             <?php 
                    if($_SESSION['usertype'] == 'admin'){
             ?>
              <li><a href="editProfile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>
              <?php
                    }
              ?>
              <li><a href="signout.html"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>
      
        
      <!-- <h5 class="sidebartitle">Navigation</h5> -->
       <ul class="nav nav-pills nav-stacked nav-bracket">
		<li><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a>
        <?php 
            if($_SESSION['usertype'] == 'admin'){
        ?>
		<li class="nav-parent"><a href="#"><i class="fa fa-user"></i> <span>Users</span></a>
            <ul class="children" style="display: none">
            
                <li><a href="createUser.php"><i class="fa fa-list"></i> <span>Create User</span></a></li>
                <li><a href="listAdmin.php"><i class="fa fa-plus"></i> <span> Admin</span></a></li>    
                <li><a href="listDeals.php"><i class="fa fa-plus"></i> <span> Deals</span></a></li>														 <!--<li><a href="listCredentials.php"><i class="fa fa-plus"></i> <span> Credentials</span></a></li>-->
            </ul>
        </li>
        <?php 
            }
        ?>
       <li class="nav-parent"><a href="#"><i class="fa fa-rocket"></i> <span>Reports</span></a>
            <ul class="children" style="display: none">
             <?php 
            if($_SESSION['usertype'] == 'admin'){
        ?>
                <li><a href="createReport.php"><i class="fa fa-plus"></i> <span>Create Report</span></a></li>
                 <?php 
                   }
                ?>
                <li><a href="listReport.php"><i class="fa fa-list"></i> <span>List Report</span></a></li>
            </ul>
        </li>
      </ul>
      
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  
  <div class="mainpanel">
    
    <div class="headerbar">
      
      <a class="menutoggle"><i class="fa fa-bars"></i></a>
      
      <div class="header-right">
        <ul class="headermenu">
        <?php 
            if($_SESSION['usertype'] == 'admin'){
        ?>
        <li>
            <div class="btn-group">
				<?php 
					$sql = "SELECT COUNT(client_id) AS ActivatedDeals FROM client where status='disable'";
					$result = $dbh->query($sql);
					$noActivatedDeals = 0;		
					foreach($result as $row){
						$noActivatedDeals = $row['ActivatedDeals'];
					}
				?>
              <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>
                <span class="badge"><?php echo $noActivatedDeals;?> </span>
              </button>
              <div class="dropdown-menu dropdown-menu-head pull-right">
				
                <h5 class="title"> <?php echo $noActivatedDeals;?> New deal are activated</h5>
				
                <ul class="dropdown-list user-list">
				<?php 
					$sql = "SELECT * FROM client where status='disable' LIMIT 5";
					$result1 = $dbh->query($sql);
					
					foreach($result1 as $row){
								
				?>
                  <li class="new">
                    <!--<div class="thumb"><a href="#"><img src="images/photos/user1.png" alt="" /></a></div>-->
                    <div class="desc">
					<?php 
						if($noActivatedDeals == 0){
					?>
					<h5>No New deal to activate</h5>
					<?php
						}else{
					?>
                     <h5><a href="editDeal.php?id=<?php echo $row['client_id'];?>"><?php echo $row['deal_title']; ?></a><a href="editDealProcess.php?id=<?php echo $row['client_id'] ;?>"><span class="badge badge-success">view</span></a></h5>
					<?php					
						}
					?>
					  
                    </div>
                  </li>
                <?php 
					}
				?>				
				  <li class="new"><a href="listDeals.php" style="color:red;">See All Deals</a></li>
                </ul>
              </div>
            </div>
          </li>
		  
		  <li>
            <div class="btn-group">
				<?php 
					$sql = "SELECT COUNT(client_id) AS NofityDeals FROM client where notify_client='false'";
					$resultNotfiyClientCount = $dbh->query($sql);
					$noNotifyDeals = 0;		
					foreach($resultNotfiyClientCount as $row){
						$noNotifyDeals  = $row['NofityDeals'];
					}
				?>
              <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                <i class="glyphicon glyphicon-globe"></i>
                <span class="badge"><?php echo $noNotifyDeals;?></span>
              </button>
              <div class="dropdown-menu dropdown-menu-head pull-right">
                <h5 class="title">Deal Notification</h5>
                <ul class="dropdown-list gen-list">
				<?php 
					if($noNotifyDeals == 0){
				?>
							<li class="new">
								<a href="#">
								<!--<span class="thumb"><img src="images/photos/user4.png" alt=""></span>-->
								<span class="desc" style="margin-left:0px;">
									No New Deals
								</span>
								</span>
								</a>
							</li>
				<?php
					}else{
				?>
						<?php 
							$sql = "SELECT * FROM client where notify_client='false' LIMIT 5";
							$resultNotify = $dbh->query($sql);
							
							foreach($resultNotify as $row){
						?>
						  <li class="new">
							<a href="#">
							<!--<span class="thumb"><img src="images/photos/user4.png" alt=""></span>-->
							<span class="desc">
							  <a href="notifyDeal.php?id=<?php echo $row['client_id'];?>&notify_client=true" ><span class="name"><?php echo $row['deal_title'];  ?><span class="badge badge-success">view</span></span></a>
							  <span class="msg"><?php echo $row['date_time']; ?></span>
							</span>
							</a>
						  </li>
						<?php 
							}
						?>	
				<?php 
					}
				?>
                 <li class="new" ><a style="color:red" href="listDeals.php">See All Deals</a></li>
                </ul>
              </div>
            </div>
          </li>
        <?php
            
            }
        ?>
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="images/photos/loggeduser.png" alt="" />
                <?php echo ucfirst($_SESSION['first_name'])." ".ucfirst($_SESSION['last_name']); ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
              <?php 
                    if($_SESSION['usertype'] == 'admin'){
              ?>
                <li><a href="profile.php?id=<?php echo $_SESSION['admin_id']; ?>"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
             <?php 
                    }
             ?>
                <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
              </ul>
            </div>
          </li>
         
        </ul>
      </div><!-- header-right -->
      
    </div><!-- headerbar -->