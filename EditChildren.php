 <?php session_start();?>
<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');require('connection.php');
	$memb = $_SESSION['Memb'];
	$sql  = "Select * From tblhousemember where Memberno = '$memb'";
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($query);?>
<script>
	function fnLastn(obj,strdiv,strSpanName){ <!-- Lastname Validation -->
			var pattern = new RegExp(/[~`!#$%\^&*+=[\]\\;,/{}|\\":<>\?]/);
            if((obj.value.trim() == "") || (obj.value <= 0) || pattern.test(obj.value)){
                document.getElementById(strdiv).className="form-group has-error";
				 document.getElementById("hidlname").value=1;
			
				
            } else{
                document.getElementById(strdiv).className="form-group has-success";
			document.getElementById("hidlname").value= 0;
            }
        }

        function fnFirstn(obj,strdiv,strSpanName){ <!-- Firstname Validation -->
			var pattern = new RegExp(/[~`!#$%\^&*+=[\]\\;,/{}|\\":<>\?]/);
            if((obj.value.trim() == "") || (obj.value <= 0) || pattern.test(obj.value)){
                document.getElementById(strdiv).className="form-group has-error";
				 document.getElementById("hidfname").value=1;
            } else{
                document.getElementById(strdiv).className="form-group has-success";
				document.getElementById("hidfname").value=0;
            }
        }
		
		function fnMiddletn(obj,strdiv,strSpanName){  <!-- Middlename Validation -->
			var pattern = new RegExp(/[~`!#$%\^&*+=[\]\\;,/{}|\\":<>\?]/);
            if(pattern.test(obj.value)){
                document.getElementById(strdiv).className="form-group has-error";
				 document.getElementById("hidfname").value=1;
            } else{
                document.getElementById(strdiv).className="form-group has-success";
				document.getElementById("hidfname").value=0;
            }
        }
		
        function fnValidEmail(obj,strdiv,strSpanName){  
                if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(obj.value) || obj.value.trim() == ""){  
                    
					document.getElementById(strdiv).className="has-error";
                }else{
                    document.getElementById(strdiv).className="has-success";
                }  
        }
		
		function fnValidDate(obj,strdiv,strSpanName){  <!-- Birthday Validation -->

                if ((obj.value.trim() == "") || (obj.value <= 0) ){  
             
				   document.getElementById(strdiv).className="has-error";
				   document.getElementById("hidbday").value=1;
                }else{
                    document.getElementById(strdiv).className="has-success";
					document.getElementById("hidbday").value=0;
                }  
        }
		
        
		function fnValid(obj,strdiv,strSpanName){  <!-- Optional Field Validation -->
		
           
             
                    document.getElementById(strdiv).className="has-success";
                
        }
	

	function a(){
	var strGender = '<?php echo $row->Gender;?>'
	var strtype = '<?php echo $row->CivilStatus;?>'
	if(strGender == 'M'){
			  document.getElementById('RGender1').checked = true;
			   document.getElementById('RGender2').disabled = true;
		  }
		  else if (strGender == 'F'){  document.getElementById('RGender2').checked = true;
		     document.getElementById('RGender1').disabled = true;}
		  
		   var selectobject = document.getElementById("ytype");
			 for (var i=0; i<selectobject.length; i++){
if(selectobject.options[i].value == strtype){
	
	document.getElementById("ytype").value = selectobject.options[i].value;}
else{}}
}
	</script>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">		
<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>
<button  class="btn btn-info" onclick="window.location.href='Hholdpersonal.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
	<br>
	<br>
<legend></legend>
<legend ><p><font face = "cambria" size = 5 color = "grey"> Edit Information </font></p></legend >

	<form method = POST>
<div class ="showback">
<input id = "hidfname" name="hidfname" class="form-control" type="hidden"  <?php if(isset($_POST["hidfname"])) echo "value = ".$_POST["hidfname"]; ?>>
 <input id = "hidlname" name="hidlname" class="form-control" type="hidden" <?php if(isset($_POST["hidlname"])) echo "value = ".$_POST["hidlname"]; ?>>


<p><font face = "cambria" size = 4 color = "grey"> Full Name: </font></p>
	<div class="form-group">				
           <div class="col-sm-3">
	<div class="form-group" id = "fname-div">
             <input id="FName" class="form-control input-group-lg reg_name" type="text" name="Fname" title="Enter first name" placeholder="First name" onblur= fnFirstn(this,"fname-div","Fname") required <?php echo "value =".$row->FirstName; ?>>
           </div>
		   </div> 
		   <div class="col-sm-3">
		 	<div class="form-group" id = "mname-div">
             <input id="MName" class="form-control input-group-lg reg_name" type="text" name= "Mname" title="Enter middle name" placeholder="Middle name"  onblur= fnMiddletn(this,"mname-div","Mname") <?php echo "value =".$row->MiddleName; ?>>
			 </div>
           </div>
           <div class="col-sm-3">
		<div class="form-group" id = "lname-div">
             <input id="LName" class="form-control input-group-lg reg_name" type="text" name= "Lname" title="Enter last name" placeholder="Last name" onblur= fnLastn(this,"lname-div","Lname") required <?php echo "value =".$row->LastName; ?>>
          </div>
		  </div>
		   <div class="form-group" id = "ename-div">
		      <div class="col-sm-1">
		
             <input id="EName" class="form-control input-group-lg reg_name" type="text" name= "Ename" title="name extension(Optional)" placeholder="name extension(Optional)"   onblur= fnValid(this,"ename-div","Ename") <?php echo "value =".$row->NameExtension; ?>>
           </div></div>
	</div><br><br><br>
<div class = "form-group">


<div class="col-sm-5"><p><font face = "cambria" size = 4 color = "grey"> Gender: </font></p>
<input type = radio value = "M" name = "gend" id = "RGender1"> Male
<input type = radio value = "F" name = "gend" id = "RGender2"> Female

           </div> 


	<div class="form-group">				
           <div class="col-sm-5">
<p><font face = "cambria" size = 4 color = "grey"> Birthday </font></p>
             <input id="RFName1" class="form-control input-group-lg reg_name"   max="<?php echo date("Y-m-d"); ?>" <?php echo "value =".$row->Birthdate; ?> type= date name="bday" title="Enter first name" disabled required>
           </div> 
		  
		   
		   
	</div><br><br><br><br><br></div>
	<div class = "form-group">
	

<div class="form-group" id = "contact-div">				
           <div class="col-sm-5">
<p><font face = "cambria" size = 4 color = "grey"> Contact Number (Optional): </font></p>
   <div class="col-sm-10">
             <input id="RFName1" class="form-control input-group-lg reg_name"   type= text name="contactno" title="Enter first name"  onblur= fnValid(this,"contact-div","contactno") <?php echo "value =".$row->ContactNo; ?>>
           </div> </div>
		  
		   
		   
	</div>


<div class="form-group">				
           <div class="col-sm-5">
<p><font face = "cambria" size = 4 color = "grey"> Civil Status: </font></p>
             <select name = "civil" class = "form-control" id = "ytype">
<option>Single</option>
<option>Married</option>
<option>Widower/Widow</option>
<option>Livein</option>
</select> 
           </div> 
		  
		   
		   
	</div><br><br><br><br><br></div>
	<div class = "form-group">


<div class="form-group" id = "occup-div">				
           <div class="col-sm-5">	<p><font face = "cambria" size = 4 color = "grey"> Occupation(optional): </font></p>
<div class="col-sm-10">

             <input id="RFName1"  class="form-control input-group-lg reg_name" type= text name="occup" title="Enter first name"  onblur= fnValid(this,"occup-div","occup") <?php echo "value =".$row->Occupation; ?> >
           </div> 
		  
		   
		   
	</div>


	

<div class="form-group" id = "SSS-div">				
           <div class="col-sm-5"><p><font face = "cambria" size = 4 color = "grey">SSS Number(optional): </font></p>

             <input id="RFName1" class="form-control input-group-lg reg_name"  type= text name="SSS" title="Enter first name"  onblur= fnValid(this,"SSS-div","SSS") <?php echo "value =".$row->SSSNo; ?>>
           </div> 
		  
		   
		   
	</div><br><br><br><br><br></div>


	

<div class="form-group" id = "TIN-div">				
           <div class="col-sm-5">
<p><font face = "cambria" size = 4 color = "grey">TIN Number(optional): </font></p><div class="col-sm-10">
             <input id="RFName1" class="form-control input-group-lg reg_name" type= text   name="TIN" title="Enter first name"  onblur= fnValid(this,"TIN-div","TIN") <?php echo "value =".$row->TINNo; ?>>
           </div> 
		  
		   
		   
	</div><br><br><br><br><br>

		  
		  

<button type = submit  class="btn btn-info" name = "subm">Submit Record</button>
<br><br></div>
<?php

require('connection.php');
if(isset($_SESSION['Memb'])){
	echo "<script>a();</script>";
}
if(isset($_POST['subm'])){
$Hno = $_SESSION['Memb'];
$Fname = $_POST['Fname'];
$Mname = "";
if($_POST['Mname'] == NULL){
	$Mname = "";
}
else{$Mname = $_POST['Mname'];}
$Lname = $_POST['Lname'];
$Ename = "";
if($_POST['Ename'] == NULL){
	$Ename = "";
}
else{$Ename = $_POST['Ename'];}
$Gend = $_POST['gend'];
$contact = $_POST['contactno'];
$bday = $_POST['bday'];
$occup = $_POST['occup'];
$SSS = "";
if($_POST['SSS'] == NULL){
	$SSS = "";
}
else{$SSS = $_POST['SSS'];}
$TIN = "";
if($_POST['TIN'] == NULL){
	$TIN = "";
}
$last = $_POST['hidlname'];
$first = $_POST['hidfname'];

if($last == 0&&$first == 0){
$_Lname = mysqli_real_escape_string($con,$Lname);
$_Fname = mysqli_real_escape_string($con,$Fname);
$_Mname = mysqli_real_escape_string($con,$Mname);

mysqli_query($con,"UPDATE `tblhousemember` SET `FirstName`= '$_Fname',`MiddleName`= '$_Mname',`LastName`= '$_Lname',`NameExtension`= '$Ename',`Gender`= '$Gend',`Birthdate`= '$bday',`ContactNo`= '$contact',`Occupation`= '$occup',`SSSNo`= '$SSS',`TINNo`= '$TIN' ,`CivilStatus`= '$civil' WHERE `Memberno`= '$Hno'");
echo "<script>window.location = 'HholdPersonal.php'</script>";


}
else{
	
	echo "<script>alert('Please input valid values!');</script>";
}
}







?>
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
