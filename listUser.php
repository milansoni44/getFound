<?php 
 include_once "header.php";
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
          <div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <th width="20%">Firstname</th>
                    <th width="20%">Lastname</th>
                    <th width="25%">Email</th>
                    <th width="15%">Contact</th>
					<th width="20%">Action</th>
                 </tr>
              </thead>
              <tbody>
                <?php 
                    $result;
                    if(isset($_REQUEST['user_type'])){
                        if(($_REQUEST['user_type'])=='admin'){
                            $sql = "select * from admin where user_type=0";
                            $result = $dbh->query($sql);
                        }else if(($_REQUEST['user_type']) == 'client'){
                            $sql = "select * from admin where user_type=1";
                            $result = $dbh->query($sql);    
                        }
                        else{
                            $sql = "select * from admin";
                            $result = $dbh->query($sql);
                        }
                    }else{
                        $sql = "select * from admin";
                        $result = $dbh->query($sql);
                    }
                    foreach($result as $row){
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td class="center"> <?php echo $row['contact']; ?></td>
					<td><a href="editUser.php?id=<?php echo $row['admin_id']; ?>"><i class="fa fa-pencil"></i><a> <a style="padding-left:20px;" href="deleteUser.php?id=<?php echo $row['admin_id']; ?>"><i class="fa fa-trash-o"></i></a> </td>
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