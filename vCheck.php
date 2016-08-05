   <?php 
		$resfrom = $_POST['From'];
		$resto = $_POST['To'];
		
		$_SESSION['resfrom'] = $resfrom;
		$_SESSION['resto'] = $resto;
		
		//echo"<script> alert(' $resfrom $resto'); </script>";
   ?>

<br><br><br>
<div class="col-md-10">
	<div class="alert alert-info"><b> Be reminded! </b> You may choose date and time of your reservation except for the time listed below</div>
</div><br><br><br><br>	
	
<div class="form-group">
	<div class="col-sm-5">
		<div class="showback">
	       	<div class="panel-heading">
	            <div class="pull-left"><h4><i class="fa fa-tasks"></i> Reserved Facility </h4></div><br>
	        </div>
            <div class="task-content">
                <ul id="sortable" class="task-list">
                    <li class="list-primary">
						<div class="task-title">	
                		
			<?php						
				require("connection.php");
				$query = mysqli_query($con, "SELECT f.strfaciname, TIME(r.dtmResDateofUseFrom), TIME(r.dtmResDateofUseTo) FROM tblreservefaci r INNER JOIN tblfacility f ON f.strfacicontrolno = r.strresfacicontrolno WHERE r.dtmresdateofusefrom BETWEEN '$resfrom' AND '$resto' OR r.dtmresdateofuseto BETWEEN '$resfrom' AND '$resto' ORDER BY r.dtmresdateofusefrom");

				while($row = mysqli_fetch_row($query)){
					$facitemp = $row[0];
					$facifrom = $row[1];
					$facito = $row[2];
					
					echo"<h5><span class='task-title-sp'> $facitemp</span><span class='label label-warning'> $facifrom - $facito</span></h5>";
				}	
			?>			</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="col-sm-5">
		<div class="showback">
			<div class="panel-heading">
				<div class="pull-left"><h4><i class="fa fa-tasks"></i> Reserved Equipment </h4></div><br>
			</div>
    
			<div class="task-content">
                <ul id="sortable" class="task-list">
                    <li class="list-primary">
						<div class="task-title">		
			<?php						
				require("connection.php");
				$query = mysqli_query($con, "SELECT f.strequipname, TIME(r.dtmReDateofUseFrom), TIME(r.dtmReDateofUseTo), r.intreequipquantity FROM tblreserveequip r INNER JOIN tblequipment f ON f.strequipname = r.strreequipcode WHERE r.dtmReDateofUseFrom BETWEEN '$resfrom' AND '$resto' OR r.dtmReDateofUseTo BETWEEN '$resfrom' AND '$resto' ORDER BY r.dtmReDateofUseFrom");

				while($row = mysqli_fetch_row($query)){
					$facitemp = $row[0];
					$facifrom = $row[1];
					$facito = $row[2];
					$equipquan = $row[3];
					
					echo"<h5><span class='task-title-sp'> $facitemp</span><span class='label label-warning'> $facifrom - $facito </span><span class='label label-info'> $equipquan</span></h5>";
				}
			?>
						</div>
					</li>
				</ul>
			</div>
		</div>	
	</div>
	</div><br><br><br><br>
