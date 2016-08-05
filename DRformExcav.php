 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
		
		<?php 
		  require('connection.php');
		  
		  //Retrieval of Personal Data (Session Mode)
		  $appId  = $_SESSION['clientID'];
		  $add = $_SESSION['place'];
		  $resid = $_SESSION['clientID'];
		  $contactno = $_SESSION['contactno'];
		  $name = $_SESSION['name'];		  
		  $doc = $_SESSION['document'];//Type of document	

		  //Date Today
		  $today = date("Y-m-d"); 
		  		  
		  //for retrieving docID and name
		  $certiDocNameSQL = "SELECT strDocCode, strDocName FROM `tbldocument` WHERE `strDocName` LIKE 'Certification'";
		  $certiDocName = mysqli_query($con, $certiDocNameSQL);
		  while($row = mysqli_fetch_row($certiDocName))
			{
				$docCode= $row[0];
			}
			
		  //for Retrieving PurposeName (drop-down) in DB
		  $certiPurposeSQL = "SELECT strDocPurposeID, strPurposeName FROM tbldocumentpurpose where strDocID = '$docCode'";
		  $certiPurpose = mysqli_query($con, $certiPurposeSQL);
		  		  
		  //Determines if the document has an amount to be paid
		  $docPayment = 1;
		  
		?>
	
    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			
                <div class="row">
                    <div class="col-lg-12">
					
							<div class = "bodybody">	
								<div class="panel-body">
								
		<!-- div class="card card-inverse" style="background-color: #333; border-color: #333;">
			<div class="card-block">
				<h3 class="card-title">Special title treatment</h3>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				<a href="#" class="btn btn-primary">Button</a>
			</div>
		</div -->
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Excavation </font></legend><br>
		<!-- p><font face = "cambria" size =5 color = "red">* required fields</font -->
		
		<!-- Street Permit form section -->
		<!--div class="panel-group" -->
			<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>DOCUMENT REQUEST DETAILS</b></center></font></div>
					<div class="panel-body">
						<form method="POST">
						<div class = "form-group">
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Document Request ID </font></p>			
								<input id="DRdocreqID" class="form-control input-group-lg reg_name" type="text" name="DRdocreqID" title="system-generated">
							</div>
							
							<div class='col-sm-4'>
							<p><font face='cambria' size=5 color='grey'> Document Purpose </font></p>
						
								<select class='form-control' id='DRpurpose' name="DRpurpose">
									<option selected='selected' value='0'>Choose Document Purpose</option>							
							<?php							
									while($row = mysqli_fetch_array($certiPurpose))
									{
							?>		<option value='<?php echo "$row[0]";?>'><?php echo"$row[1]"; ?> </option>
							<?php	}?>
								</select>						
							</div>
							
							<div class="col-sm-4">
							<p><font face="cambria" size=5 color="grey"> Date Requested </font></p>						
							<input id='DRdatereq' class='form-control input-group-lg reg_name' type='date' name="DRdtereq" title='system-generated' value = "<?php echo"$today"; ?>" disabled>							
						</div>
							
							</form>
						</div>
					</div>
				</div>
			<br>
			<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>REQUIREMENTS</b></center></font></div>
					<div class="panel-body">
						<form method="POST">
						<div class = "form-group">
							<div class="checkbox">
								<label><input type="checkbox" value="">
								<font face="cambria" size=5 color="black">Letter Request from Owner
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">
								<font face="cambria" size=5 color="black">Copy of Land Title</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">
							  <font face="cambria" size=5 color="black">Blueprint/Layout Plan</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">
							  <font face="cambria" size=5 color="black">ID of Project Engineer</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">
							  <font face="cambria" size=5 color="black">Consent from Neighbor</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">
							  <font face="cambria" size=5 color="black">Total number of Workers</label>
							</div>
						</form>
					</div>
				</div>
			</div>
			<br>
			<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>EXCAVATION DETAILS</b></center></font></div>
					<div class="panel-body">
						<form method="POST">
						<div class="col-sm-12">
							<p><font face="cambria" size=5 color="grey"> Request Type </font></p>			
							<input id="reqType" class="form-control input-group-lg reg_name" type="text" name="reqType" title="system-generated"><br>
						</div>
						
							<input type="button" class="btn btn-success btn-lg btn-block" name = "btnSubmitU" id = "btnSubmitU" value = "Submit">
						</form>
						</div>
					</div>
				</div>
			<div>
			<br>
		
			<?php
			require('connection.php');
			if(isset($_POST['btnSubmitID']))
			{
				//Assuming all fields are validated!
				$busID = $_POST['busID'];
				$busName = $_POST['busName'];
				$contactPerson = $_POST['contactPerson'];
				$contactNo = $_POST['contactNo'];
				$busCategory = $_POST['busCategory'];
				$busLoc = $_POST['busLoc'];
				$busDesc = $_POST['busDesc'];
				
				//First of all dpat may value na yung docRequestID
				
				
				  
				//Next yung tblDocRequest
				$docReqID = $_POST['DRdocreqID'];
				$docPurpose = $_POST['DRpurpose'];
				$dateReq = $_POST['DRdtereq'];
				$officer = "";//nag approved
				$docCode = "2";//pano ung doccode
				
				
				$saveDocRequestSQL = "INSERT INTO `tbldocumentrequest` (`strDocRequestID`, `strDocPurposeID`, `strDRdocCode`, `strDRapplicantID`, `strDRapprovedBy`, `datDRdateRequested`) VALUES ('$docReqID', '569', '1', '123', 'ako', '2016-07-27')";
				
				echo"<script> alert('You have successfully registered an applicant');</script>";
			}//IF(ISSET)

		?>
				
								</div> <!-- panel-body -->
							</div> <!-- bodybody -->			
						</div> <!-- col-lg-12 -->
					</div> <!-- class=row -->
				</div> <!-- container-fluid -->
			</div> <!-- page-content-wrapper -->
		</div> <!-- wrapper -->
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 - TEAM BARANGAY
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


  