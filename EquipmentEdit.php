<!DOCTYPE html>
          <?php session_start();
		  require('header.php');?>
    <?php require('sidebar.php');?>
	<script type = "text/javascript">

</script>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->

      <section id="main-content">
	  <br>
          <section class="wrapper site-min-height">
 <button class="btn btn-theme" onclick= "window.location.href='EquipmentMaintenance.php'">Back to the Previous Page</button>
 	                           <form method = POST>


		<legend ><font face = "cambria" size = 8 color = "grey"> Edit Equipment </font></legend>

						

			<p><font face = "cambria" size = 5 color = "grey"> Equipment Control No. </font></p>
			<div class = "form-group">
				<div class="col-sm-5">
					<input name = "controlno1"   class="form-control input-group-lg reg_name" type="text" readonly = true <?php  if(isset($_SESSION['contno'])){ echo "value = '".$_SESSION['contno']."'"; }?>>			 
				</div>
			</div><br><br><br>
	
			<p><font face = "cambria" size = 5 color = "grey"> Category </font></p>
			<div class = "form-group">
				<div class="col-sm-5">
					<input name = "category"  class = "form-control input-group-lg reg_name" type="text" readonly = true value = <?php if(isset($_SESSION['cat'])){echo $_SESSION['cat']; } ?> >			 
				</div>
			</div><br><br><br>
			
			<p><font face = "cambria" size = 5 color = "grey"> Quantity </font></p>
			<div class = "form-group">
				<div class="col-sm-5">
					<input id="controlno1" name = "quantity" class="form-control input-group-lg reg_name" type="number" min="1" value = <?php if(isset($_SESSION['stat'])){echo $_SESSION['stat']; } ?> required>			 
				</div>
			</div><br><br><br><br><br>
		   
		   <?php
				echo '<script> a(); </script>';
			?>
	
			<center> <input type="submit" class="btn btn-info" name = "btnEdit" id = "btnEdit"  value = "Save Record"  > 
		<br><br>
			
			<?php
			 if (isset($_POST['btnEdit'])){
				 $strcont = $_POST['controlno1'];		
				 $intquantity = $_POST['quantity'];
				 
				require('connection.php');
				 $g = mysqli_query($con,"UPDATE tblequipment SET intEquipQuantity = '$intquantity' WHERE strEquipNo = '$strcont'");
				
				if($g == true){
					 echo "<script>alert('Success');</script>";
					 echo "<script> window.location = 'EquipmentMaintenance.php';</script>";}
					 else{
						 
					 }
			}
				
			 
			?> </form>
                               <!-- /#page-content-wrapper -->

			
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
