<?php 
 include_once("header.php");
// include_once("includes/connection.php");
?>

    <script>
        function getUser(a){
            if(a == 'admin'){
                window.location.href = "listAdmin.php?user_type="+a;
            }else if(a == 'client'){
                window.location.href = "listClient.php?user_type="+a;
            }else{
                window.location.href = "listUser.php?user_type="+a;
            }
        }
    </script>
    <div class="contentpanel">
        <?php 
            if(isset($_SESSION['deleteUser'])){
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Well done!</strong> <?php echo $_SESSION['deleteUser']; unset($_SESSION['deleteUser']); ?><a href="#" class="alert-link"></a>.
        </div>
        <?php 
            }
        ?>
        <?php 
            if(isset($_SESSION['updateUser'])){
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Well done!</strong> <?php echo $_SESSION['updateUser']; unset($_SESSION['updateUser']); ?><a href="#" class="alert-link"></a>.
        </div>
        <?php 
            }
        ?>
      <div class="panel panel-default">
        <!-- <div class="panel-heading">
          
          <h3 class="panel-title">Data Tables</h3>
          <p>DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table.</p>
        </div> -->
        <div class="panel-body">
          <h5 class="subtitle mb5"><span style="float:left">List User</span><span style="float:right; ">
                <select name="user_type" style="width:100px" onChange="getUser(this.value);">
                    <?php 
                        if(isset($_REQUEST['user_type'])){
                    ?>
                    <option value="all" <?php  if($_REQUEST['user_type'] == 'all'){ ?> selected <?php } ?>> All </option>
                    <option value="admin" <?php  if($_REQUEST['user_type'] == 'admin'){ ?> selected <?php } ?>> Admin </option>
                    <option value="client" <?php  if($_REQUEST['user_type'] == 'client'){ ?> selected <?php } ?>> Client </option>
                    <?php
                        }else{
                    ?>
                    <option value="all"> All </option>
                    <option value="admin"> Admin </option>
                    <option value="client"> Client </option>
                    <?php 
                        }
                    ?>
                </select></span>
          </h5>
          <br/>
          <br/>
          <!-- <h5 class="subtitle mb5">Alternative Pagination</h5>
          <p>The example below shows the full_numbers type of pagination, where 'first', 'previous', 'next' and 'last' buttons are presented, as well as the five pages around the current page.</p>
          <br /> -->
          <div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <th width="15%">Firstname</th>
                    <th width="15%">Lastname</th>
                    <th width="20%">Email</th>
                    <th width="10%">Contact</th>
                    <th width="15%">Business Name</th>
                    <th width="10%">Business URL</th>
                    <th width="15%">Action </th>
                 </tr>
              </thead>
              <tbody>
                <?php 
                    $sql = "select * from admin where user_type=1";
                    $result = $dbh->query($sql);
                    foreach($result as $row){
                ?>
                <tr>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td class="center"> <?php echo $row['contact']; ?></td>
                    <td class="center"> <?php echo $row['business_name']; ?></td>
                    <td class="center"> <?php echo $row['business_url']; ?></td>
                    <td><a href="editClient.php?id=<?php echo $row['admin_id']; ?>" style="text-decoration:none;"><i class="fa fa-pencil"></i><a> <a href="deleteClient.php?id=<?php echo $row['admin_id']; ?>" style="padding-left:20px;text-decoration:none;"><i class="fa fa-trash-o"></i></a> </td>
                </tr>   
                <?php 
                    }
                ?>
                <!--<tr class="odd gradeX">
                    <td>Milan</td>
                    <td>Soni</td>
                    <td>milan@gmail.com</td>
                    <td class="center"> 7881254582</td>
                    <td class="center"> Local Verification LLC</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 <tr class="even gradeC">
                    <td>Dhaval</td>
                    <td>Thakor</td>
                    <td>dhaval@gmail.com</td>
                    <td class="center">9513548562</td>
                    <td class="center"> Local Verification LLC</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 <tr class="odd gradeA">
                    <td>Nitin</td>
                    <td>Johnson</td>
                    <td>nitin@gmail.com</td>
                    <td class="center">9898989898</td>
                    <td class="center"> Local Verification LLC</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 <tr class="even gradeA">
                    <td>Test</td>
                    <td>Test123</td>
                    <td>test@gmail.com</td>
                    <td class="center">7878785425</td>
                    <td class="center"> Local Verification LLC</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 <tr class="odd gradeA">
                    <td>Darshan</td>
                    <td>Parekh</td>
                    <td>darshan@gmail.com</td>
                    <td class="center">9725558416</td>
                    <td class="center"> Local Verification LLC</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 <tr class="even gradeA">
                    <td>Pooja</td>
                    <td>Joshi</td>
                    <td>pooja@gmail.com</td>
                    <td class="center">6589425482</td>
                    <td class="center"> Local Verification LLC</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 <tr class="even gradeC">
                    <td>Dhaval</td>
                    <td>Thakor</td>
                    <td>dhaval@gmail.com</td>
                    <td class="center">9513548562</td>
                    <td class="center"> Local Verification LLC</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 <tr class="even gradeC">
                    <td>Dhaval</td>
                    <td>Thakor</td>
                    <td>dhaval@gmail.com</td>
                    <td class="center">9513548562</td>
                    <td class="center"> Flipkart Pvt Ltd</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 <tr class="odd gradeA">
                    <td>Nitin</td>
                    <td>Johnson</td>
                    <td>nitin@gmail.com</td>
                    <td class="center">9898989898</td>
                    <td class="center"> Flipkart Pvt Ltd</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
					
                 </tr>
                 <tr class="odd gradeA">
                    <td>Nitin</td>
                    <td>Johnson</td>
                    <td>nitin@gmail.com</td>
                    <td class="center">9898989898</td>
                    <td class="center"> eWebguru</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 <tr class="odd gradeA">
                    <td>Nitin</td>
                    <td>Johnson</td>
                    <td>nitin@gmail.com</td>
                    <td class="center">9898989898</td>
                    <td class="center"> eWebguru</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 <tr class="odd gradeX">
                    <td>Milan</td>
                    <td>Soni</td>
                    <td>milan@gmail.com</td>
                    <td class="center"> 7881254582</td>
                    <td class="center"> eWebguru</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 <tr class="odd gradeX">
                    <td>Milan</td>
                    <td>Soni</td>
                    <td>milan@gmail.com</td>
                    <td class="center"> 7881254582</td>
                    <td class="center"> Vakratunda System</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 
                 <tr class="odd gradeA">
                    <td>Nitin</td>
                    <td>Johnson</td>
                    <td>nitin@gmail.com</td>
                    <td class="center">9898989898</td>
                    <td class="center"> Vakratunda System</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>
                 <tr class="odd gradeA">
                    <td>Nitin</td>
                    <td>Johnson</td>
                    <td>nitin@gmail.com</td>
                    <td class="center">9898989898</td>
                    <td class="center"> Local Verification LLC</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td><i class="fa fa-pencil"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i> <i class="fa fa-trash-o"></i> </td>
					
                 </tr>-->
                 
              </tbody>
           </table>
          </div><!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div><!-- panel -->
        
    </div><!-- contentpanel -->
   <?php 
        include_once "footer.php";
    ?>