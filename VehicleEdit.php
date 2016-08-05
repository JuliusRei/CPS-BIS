<!DOCTYPE html>
          <?php session_start();
		  require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->

      <section id="main-content">
	  <br>
          <section class="wrapper site-min-height">
 <button class="btn btn-theme" onclick="window.location.href='VehicleMaintenance.php'">Back to the Previous Page</button>
 	                     <form method = POST>  
				<legend ><font face = "cambria" size = 8 color = "grey"> Edit Vehicle Details</font></legend>			
	<p><font  size = 5 color = "grey"> Plate Number </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="Plateno" name ="Plateno" class="form-control input-group-lg reg_name" type="text" <?php if(isset($_SESSION['pno'])){ echo "value = '".$_SESSION['pno']."'"; }?> placeholder=" 000 FAC 123" readonly >
			 
           </div>
	</div><br><br><br>
	<p><font  size = 5 color = "grey"> Driver Name </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="Op" name ="Op" class="form-control input-group-lg reg_name" type="text" <?php if(isset($_SESSION['pno'])){ echo "value = '".$_SESSION['opn']."'"; }?> placeholder=" 000 FAC 123" required >
			 
           </div>
	</div><br><br><br>
	<p><font size = 5 color = "grey"> Vehicle Model </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="Vmake"  name="Vmake" class="form-control input-group-lg reg_name" type="text" <?php if(isset($_SESSION['pno'])){ echo "value = '".$_SESSION['vm']."'"; }?> title="Enter Facility name" readonly>
			 
           </div>
	</div><br><br><br>
	<p><font size = 5 color = "grey"> Motor Number </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="motor"  name="motor" class="form-control input-group-lg reg_name" type="text" <?php if(isset($_SESSION['pno'])){ echo "value = '".$_SESSION['mno']."'"; }?> title="Enter Facility name" required>
			 
           </div>
	</div><br><br><br>
	<p><font size = 5 color = "grey"> Chasis Number </font><font  size = 5 color = "Red"> * </font></p>
	<div class = "form-group">
		   <div class="col-md-5">
		   
	<input id="chasisno" name="chasisno"  <?php if(isset($_SESSION['pno'])){ echo "value = '".$_SESSION['cno']."'"; }?>  class="form-control input-group-lg reg_name" type="text" name="facName" title="Enter Facility name" >	
           </div>
	</div><br><br><br>
  	
	<p><font size = 5 color = "grey"> Sidecar Number </font></p>
	<div class = "form-group">
		   <div class="col-md-5">
		   
	<input id="sideno" name="sideno" <?php if(isset($_SESSION['pno'])){ echo "value = '".$_SESSION['sno']."'"; }?>  class="form-control input-group-lg reg_name" type="text" name="facName" title="Enter Facility name" required >	
           </div>
	</div><br><br><br><br><br>
  <center>
  

			 <input type="submit" class="btn btn-outline btn-success" name = "btnEdit" id = "btnEdit" value = "Save"></form>
			 
    </center><br><br><br></div>
	<?php if(isset($_POST['btnEdit'])){require('connection.php');
					 $strPlateno = $_POST['Plateno'];
				 $strVmake = $_POST['Vmake'];
				 $strMotorno = $_POST['motor'];
				 $strChasisno = $_POST['chasisno'];
				 $strSideno = $_POST['sideno'];
				  $strOP = $_POST['Op'];
				  $_strOP = mysqli_real_escape_string($con,$strOP);
				 $b =0;
				 if (preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $strOP)){
							$b = 1;}
				if($b ==1){echo "<script>alert('Characters like ^£$%&*()}{@#~?><>,|=_+¬- is not allowed');</script>";}
				else{
				if($strPlateno == NULL ||$strVmake == NULL ||$strMotorno == NULL ||$strChasisno == NULL 
				 ||$strSideno == NULL  ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				  else{
					 
					 mysqli_query($con,"UPDATE tbltruvehicledetail SET OperatorName = '$_strOP', strMotorno ='$strMotorno', strChasisno = '$strChasisno', strSidecarno = '$strSideno' WHERE strPlateno = '$strPlateno'");
					 echo "<script>alert('Success');</script>";
					 session_destroy();
					 echo "<script>window.location = 'VehicleMaintenance.php';</script>";
				 }}}
			 	
					 if(isset($_POST['btnCancel'])){
					
					 session_destroy();
					 echo "<script>window.location = 'VehicleMaintenance.php';</script>";
			 }
			?>

                       
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
