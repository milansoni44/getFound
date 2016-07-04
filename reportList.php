<?php 
    include_once "header.php";
?>
    <div class="contentpanel">
      <div class="panel panel-default">
        <!-- <div class="panel-heading">
          
          <h3 class="panel-title">Data Tables</h3>
          <p>DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table.</p>
        </div> -->
        <div class="panel-body">
          <h5 class="subtitle mb5">List Client</h5>
          <br />
          <!-- <h5 class="subtitle mb5">Alternative Pagination</h5>
          <p>The example below shows the full_numbers type of pagination, where 'first', 'previous', 'next' and 'last' buttons are presented, as well as the five pages around the current page.</p>
          <br /> -->
          <div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Google Listing Views</th>
                    <th>Tracked Calls</th>
                    <th>Website Views</th>
                    <th>Published Directory</th>
                    <th>Report Status</th>
					<th>Action </th>
                 </tr>
              </thead>
              <tbody>
                 <tr class="odd gradeX">
                    <td>Milan</td>
                    <td>Soni</td>
                    <td>milan@gmail.com</td>
                    <td class="center"> 7881254582</td>
                    <td class="center"> Local Verification LLC</td>
                    <td class="center"> http://google.com</td>
                    <td>http://vaksys.in</td>
					<td> Generate Report </td>
					
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
					
                 </tr>
                 
              </tbody>
           </table>
          </div><!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div><!-- panel -->
        
    </div><!-- contentpanel -->
   <?php 
        include_once "footer.php";
    ?>