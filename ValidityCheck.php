 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
	
	
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
		
		<?php 
	
	//Initialize variables
	
	//Gets Today's Date
	$today = date("F j, Y, g:i a"); // displays date today
	
	//Personal Details
	$resId ="";
	$name ="";
	$contactno ="";	
	
	//Reservation Details
	//$resPurpose ="";
	$resDate = "";
	$resFrom = "";
	$resTo = "";
	$quantity = array();
	$returnedTemp =0;
	$unreturnedTemp =0;
	
	$returned =0;
	$unreturned =0;
?>

	<form method="POST">
    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			
                <div class="row">
                    <div class="col-lg-12">
					
							<div class = "bodybody">	
								<div class="panel-body">
		
		
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Validity Check </font></legend>
		
		<!-- Search Section-->
		<div class="form-group">
			<div class="col-sm-3">
				<input id="search" name="search" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= "" placeholder="Input Last Name">					
			</div>				
			<div class="col-sm-2">
				<input type="submit" class="btn btn-outline btn-success" name = "btnSearch" id = "btnSearch" value = "Search">
			</div>
			<div class="col-sm-2">
				<a href="RegisterApplicant.php"><input type="button" class="btn btn-outline btn-success" name = "btnAdd" id = "btnAdd" href="RegisterApplicant.php" value="Add Applicant"></a>
			</div>
		</div><br><br><br><br>		
		
		<?php
		if(isset($_POST['btnSearch'])){
				$search = $_POST['search'];
				
			if(!empty($search)){ 
				$statement = "SELECT a.strapplicantid, CONCAT(a.strapplicantlname, ', ', a.strApplicantFName, ' ', a.strApplicantMName) AS 'Name', a.strApplicantContactNo, CONCAT(a.strapplicantaddress_street, ' ', a.strapplicantaddress_brgy,', ',a.strapplicantaddress_city) AS 'Place', a.strresidentid FROM tblapplicant a WHERE a.strapplicantlname LIKE ('$search')";
				
			}else if(empty($search)){ //Notifies User if Search is empty
				echo"<script> alert('Pls Input Last name')</script>";
				$statement = "SELECT a.strapplicantid, CONCAT(a.strapplicantlname, ', ', a.strApplicantFName, ' ', a.strApplicantMName) AS 'Name', a.strApplicantContactNo, CONCAT(a.strapplicantaddress_street, ' ', a.strapplicantaddress_brgy,', ',a.strapplicantaddress_city) AS 'Place', a.strresidentid FROM tblapplicant a";
				
			}
		}else{
				$statement = "SELECT a.strapplicantid, CONCAT(a.strapplicantlname, ', ', a.strApplicantFName, ' ', a.strApplicantMName) AS 'Name', a.strApplicantContactNo, CONCAT(a.strapplicantaddress_street, ' ', a.strapplicantaddress_brgy,', ',a.strapplicantaddress_city) AS 'Place', a.strresidentid FROM tblapplicant a";
				
		}
		?>
		
		<center>
		<div class="panel panel-default"><!-- Default panel contents -->	
			<table class="table table-hover" style="height: 40%; overflow: scroll; ">
				<thead><tr>
					<th>ID</th>
					<th>Full Name</th>
					<th>Contact No</th>
					<th>Place</th>
					<th>Type</th>
					<th>Action</th>
				</tr></thead>
			
			<tbody>
			<?php
			
			$query = mysqli_query($con,$statement);
			while($row = mysqli_fetch_array($query)){?>
			
				<tr><td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[1]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[2]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[3]; ?></td>
				<?php
				if(!empty($row[4])){
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><span class='label label-primary'>Resident</span></td>";
						
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnProceed' value = '$row[0]' class='btn btn-primary btn-xs'><i class='fa fa-check'></i></button></td>";
						
					}
				else if(empty($row[4])){
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><span class='label label-success'>Non Resident Applicant</span></td>";
						
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnProceed' value = '$row[0]' class='btn btn-success btn-xs'><i class='fa fa-check'></i></button></td>";
						
					}
				
			}?>
			
			</tbody>
			</table>
		</div></center><br><br> <!-- Table-responsive -->              
	
		<?php 
			if(isset($_POST['btnProceed'])){
				$proceed = $_POST['btnProceed'];
								
					$proStatement = "SELECT a.strapplicantid, CONCAT(a.strapplicantlname, ', ', a.strApplicantFName, ' ', a.strApplicantMName) AS 'Name', a.strApplicantContactNo, CONCAT(a.strapplicantaddress_street, ' ', a.strapplicantaddress_brgy,', ',a.strapplicantaddress_city) AS 'Place', a.strresidentid FROM tblhousemember r, tblapplicant a WHERE a.strapplicantid = '$proceed'";
									
					$query = mysqli_query($con,$proStatement);
				
					while($row = mysqli_fetch_array($query)){
					
						$clientID = $row[0];
						$name = $row[1];
						$contactno = $row[2];	
						$place = $row[3];
						
						$_SESSION['clientID'] = $clientID;
						$_SESSION['name'] = $name;
						$_SESSION['contactno'] = $contactno;
						$_SESSION['place'] = $place;								 
					}
					
				echo "<script> window.location = 'FacilityEquipmentT.php';</script>";
			}
			
			?>
	</form> 				
								</div> <!-- panel-body -->
							</div> <!-- bodybody -->			
						</div> <!-- col-lg-12 -->
					</div> <!-- class=row -->
				</div> <!-- container-fluid -->
			</div> <!-- page-content-wrapper -->
		</div> <!-- wrapper -->
		
		
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

		
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
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