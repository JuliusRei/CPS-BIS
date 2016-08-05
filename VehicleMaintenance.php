 <?php session_start();?>
<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">

 	<form method = POST> 
                  <legend ><font  size = 8 color = "grey"> TRU Vehicle Maintenance </font></legend>

	
                          
                        
<div class="input-append">
       &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;    <input name="search" id="search" placeholder = "Input plate number"/>
    <button class="btn btn-info" name = "s1">Search</button>
</div><br><br>
<?php if(isset($_POST['s1'])){
$_SESSION['s'] = $_POST['search'];
	echo "<script>window.location = 'VehicleMaintenance2.php'; </script>";}?>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <button type="submit" class="btn btn-info" name = "btnAdd" >Add new vehicle</button><br>
			<center>
<?php if (isset($_POST['btnAdd'])){
		echo "<script>window.location = 'VehicleAdd.php'; </script>";
}?>
<br>  <div class="table-responsive">
					 <table   border = '2' style = 'width:95%'>
					<thead>
					<tr>
			
					<th>Plate Number </th>
					<th>Driver Name</th>
					<th>Vehicle Model</th>
					<th>Motor Number</th>
					<th>Chasis Number</th>
					<th>Sidecar Number</th>
					<th>Status</th>
					<th>Edit</th>
					<th>Enable/Disable</th>
					</tr>
					</thead>
					<tbody>
					<?php
					require('connection.php');
				$sql = "select * from tblTRUVehicledetail where strVehicleStatus LIKE 'active'";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					$i = 1;
					while($row = mysqli_fetch_object($query)){?>
					<tr> <td><?php echo $row->strPlateno?></td>
					<td><?php echo $row->OperatorName?></td>
					<td><?php echo $row->strVehiclemodel?></td>
					<td><?php echo $row->strMotorno?></td>
					<td><?php echo $row->strChasisno?></td>
					<td><?php echo $row->strSidecarno?></td>
					<td><?php echo $row->strVehicleStatus?></td>
					<td><button type = submit name = 'edit' value = <?php echo $row->strPlateno?>>EDIT</button></td>
					<td> <?php if($row->strVehicleStatus == 'active'){echo "<button type = submit name = 'disable' value = ".$row->strPlateno.">Disable</button>";}
								else  if($row->strVehicleStatus == 'inactive'){echo "<button type = submit name = 'able' value = ".$row->strPlateno.">Enable</button>";}					?></td>
					</tr>
				<?php }} 
			
				if(isset($_POST['edit'])){
					$search = $_POST['edit'];
					$query= mysqli_query($con, "Select * from tblTRUVehicledetail where strPlateno = '$search'");
					if(mysqli_num_rows($query)>0){
						$row = mysqli_fetch_object($query);
						$_SESSION['pno'] = $row->strPlateno;
						$_SESSION['opn'] = $row->OperatorName;
						$_SESSION['vm'] = $row->strVehiclemodel;
						$_SESSION['mno'] = $row->strMotorno;
						$_SESSION['cno'] = $row->strChasisno;
						$_SESSION['sno'] = $row->strSidecarno;

					 echo "<script>window.location = 'VehicleEdit.php';</script>";
					}
				} 
				if(isset($_POST['disable'])){
						$search  = $_POST['disable'];
						mysqli_query($con,"Update tblTRUVehicledetail set strVehicleStatus = 'inactive' where strPlateno = '$search'");
						echo "<script>alert('Successfully Updated');
							window.location = 'VehicleMaintenance.php'; </script>";
					}
					
						if(isset($_POST['able'])){
						$search  = $_POST['able'];
						mysqli_query($con,"Update tblTRUVehicledetail set strVehicleStatus = 'active' where strPlateno = '$search'");
						echo "<script>alert('Successfully Updated');
							window.location = 'VehicleMaintenance.php'; </script>";
					}?></tbody>
				</table>
</center>

</form>
                       
                    </div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
