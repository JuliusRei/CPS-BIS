<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
         <br>
          <section class="wrapper site-min-height">
 <button  class="btn btn-info" onclick="window.location.href='VehicleMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
<legend ><font size = 8 color = "grey"> Add Vehicle Details </font></legend>
<form method = POST>
	
	<p><font  size = 5 color = "grey"> Plate Number </font> </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="Plateno1" name ="Plateno1" class="form-control input-group-lg reg_name" type="text"  maxlength = 7  required >
			 
           </div>
	</div><br><br><br>
	<p><font size = 5 color = "grey"> Driver Name </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="Op1" name ="Op1" class="form-control input-group-lg reg_name" type="text"  placeholder=" 000 FAC 123"  required>
			 
           </div>
	</div><br><br><br>
	
	<p><font  size = 5 color = "grey"> Vehicle Model </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="Vmake1"  name="Vmake1" class="form-control input-group-lg reg_name" type="text"  required >
			 
           </div>
	</div><br><br><br>
	<p><font  size = 5 color = "grey"> Motor Number </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="motor1"  name="motor1" class="form-control input-group-lg reg_name" type="text"  required >
			 
           </div>
	</div><br><br><br>
	<p><font size = 5 color = "grey"> Chasis Number </font></p>
	<div class = "form-group">
		   <div class="col-md-5">
		   
	<input id="chasisno1" name="chasisno1" class="form-control input-group-lg reg_name" type="text"  required>	
           </div>
	</div><br><br><br>
  	
	<p><font size = 5 color = "grey"> Sidecar Number </font></p>
	<div class = "form-group">
		   <div class="col-md-5">
		   
	<input id="sidesno1" name="sideno1" class="form-control input-group-lg reg_name" type="text" required  >	
           </div>
	</div><br><br><br><br><br>
  
  	<center> <input type="submit" class="btn btn-outline btn-success" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > 

			 
		<br><br>
			 <?php
			 if (isset($_POST['btnAdd'])){
				  require('connection.php');
				 $strPlateno = $_POST['Plateno1'];
				 
				 $strOP = $_POST['Op1'];
				 $_strOP = mysqli_real_escape_string($con,$strOP);
				 $strVmake = $_POST['Vmake1'];
				 $strMotorno = $_POST['motor1'];
				 $strChasisno = $_POST['chasisno1'];
				 $strSideno = $_POST['sideno1'];
				 $b =0;
				 if (preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $strOP)){
							$b = 1;}
				if($b ==1){echo "<script>alert('Characters like ^£$%&*()}{@#~?><>,|=_+¬- is not allowed');</script>";}
				else{
				 if($strPlateno == NULL ||$strVmake == NULL ||$strChasisno == NULL ||$strSideno == NULL ||$strMotorno == NULL || $strOP == NULL  ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					
					 mysqli_query($con,"insert into tblTRUVehicledetail values ('$strPlateno','$strVmake','$strMotorno','$strChasisno','$strSideno','active','$_strOP');");
					 echo "<script>alert('Success');</script>";
				 }}}
				 ?>
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
