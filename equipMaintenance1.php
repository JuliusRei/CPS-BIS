 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">		<form method = POST>
<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>
<br>
<div class="input-append">
       &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;    <input name="search" id="search" placeholder = "Input Name"/>
    <button class="btn btn-info" name = "s1">Search</button>
</div><br><br></form >

<?php if(isset($_POST['s1'])){
$_SESSION['s'] = $_POST['search'];
	echo "<script>window.location = 'AccountMaintenance2.php'; </script>";}?>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <button  class="btn btn-info" onclick = "window.location.href='AddHhold.php'">Create New Household</button><br>
<br>
	<form method = POST><center>
<table  border = '2' style = 'width:95%'>
<tr>
<th>Household Name</th>
<th>Address</th>
<th>Residence Status</th>
<th>Action</th>
</tr>
<?php
					require('connection.php');
				$sql = "SELECT HouseholdLname, concat(BuildingNo,' ',Street,', Purok ',Purok) as 'Address',Residence , Householdno FROM `tblhousehold` where !(Residence = 'Moved')  ";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
			
					while($row = mysqli_fetch_object($query)){?>
					<tr> <td><?php echo $row->HouseholdLname?></td>
					<td><?php echo $row->Address?></td>
				<td><?php echo $row->Residence?></td>
					<td><button type = submit value = <?php echo $row->Householdno?> name = 'Edit' >View</button> <button type = submit value = <?php echo $row->Householdno?> name = 'Move' >Move Out</button> <button type = submit value = <?php echo $row->Householdno?> name = 'transfer' >Transfer</button></td>
			
					</tr>
				<?php }}
				if(isset($_POST['Edit'])){
					$_SESSION['Hno'] = $_POST['Edit'];
					echo "<script>window.location = 'HholdPersonal.php'</script>";
				}
				
				if(isset($_POST['Move'])){
					$A = $_POST['Move'];
					require('connection.php');
					mysqli_query($con,"UPDATE `tblhousehold` SET `Residence` = 'Moved' WHERE Householdno = '$A' ");
					echo "<script>window.location = 'Hholdview.php'</script>";
				}
				
						if(isset($_POST['transfer'])){
					$_SESSION['transfer'] = $_POST['transfer'];
					require('connection.php');
					echo "<script>window.location = 'TransferHhold.php'</script>";
				}		
				?>

</table>
</form>
                 </center>      
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
