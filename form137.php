&nbsp<!DOCTYPE html>
<html>
<?php 
include 'db.php';
session_start();
$user = $_SESSION['ID'];


	$id = $_GET['id'];

	$query = mysqli_query($conn,"SELECT * FROM student_info where STUDENT_ID = '$id' ");
	$row = mysqli_fetch_assoc($query);
	$student = $row['FIRSTNAME'].' '. $row['LASTNAME'];

	mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('printed $student permanent record','$user',NOW() )");



?>
<head>
    <link rel="icon" href="images/logo.jpg">

    <title>CAMPUS IITU</title>

     <!-- Bootstrap Core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/styles.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="asset/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="asset/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
        <link href="datatables/dataTables.bootstrap.css" rel="stylesheet">

    <script src="assets/js/jquery.min.js"></script>
    <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script src="assets/js/jq.js"></script>
	<style>
	@media print {  
		@page {
			size:8.5in 13in;
		}
		head{
			height:0px;
			display: none;
		}
		#head{
			display: none;
			height:0px;
		}
		#print{
		position:fixed;
		top:0px;
		margin-top:20px;
		margin-bottom:30px;
		margin-right:50px;
		margin-left:50px;
		}
		}
		#print{
		width:7.5in;
		}
		input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
}

.foo{
	font-family: "Bodoni MT", Didot, "Didot LT STD", "Hoefler Text", Garamond, "Times New Roman", serif;
	font-size: 24px;
	font-style: italic;
	font-variant: normal;
	font-weight: bold;
	line-height: 24px;
	}
	.p {
	font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
	font-size: 14px;
	font-style: italic;
	font-variant: normal;
	font-weight: 550;
	line-height: 20px;
	 letter-spacing: 2px;
}
	</style>

</head> 
<body style="background-color:white"> 
<span id='returncode'></span>
<div class="col-md-2" id="head">
	<button class="btn btn-info" onclick="print()"><i class="glyphicon glyphicon-print"></i>PRINT</button>
	<a class="btn btn-info" onclick="window.close()">Cancel</a>
	
</div>
<center>
<div id='print'>
<div style="margin-left:.5in;margin-right:.5in;margin-top:.1in;margin-bottom:.1in;line-height:1mm;">

		<p><center><b>International University of Information Technologies</b></center></p>

		  </div>
		  <div class="row">
		  <div class="col-md-12">
		  <center><p><b><h4>CERTIFICATE from the place of study</h4></b></p></center>
		  <p style="float:left;margin-left:15px;margin-bottom:20px;">
		  	<hr style="border-color:black;border:1px solid black"></hr>
		  </div>
          </div>
          <div class="row">
		  <div class="col-md-12">
		  <table style="line-height:5mm">
		<?php 
		include 'db.php';
		$id = $_GET['id'];
		$sql = mysqli_query($conn,"SELECT * from student_info where STUDENT_ID = '$id'");
		while($row = mysqli_fetch_assoc($sql)){
			$mid = $row['MIDDLENAME'];
		?>
			<tr>
				<td style="width:600px;font-size:12px">
					<label for="" style="">Name:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:13px;text-transform: uppercase;"><?php echo $row['LASTNAME'].", " .  $row['FIRSTNAME']. " " .  substr("$mid",0,1) . "."; ?></b>
					<br>
					<label for="">Place of Birth:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:12px"><?php echo $row['BIRTH_PLACE'] ?></h>
					
				</td>
				<td style="width:600px;font-size:12px">
				<label for="">Date of Birth:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:12px"><?php echo date("F d,Y") ?></h>
					<br>
					<label for="">Town / City:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:12px"><?php echo $row['ADDRESS'] ?></h>
				</td>
				
			</tr>

			
			</table> 
			<table>
			<tr>
			<td style="width:1000px;font-size:12px;align:left">
				
					<label for="">Parent or Guardian:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:12px;text-transform: capitalize"><?php echo $row['PARENT_GUARDIAN'] ?></h>
				</td>
				<td style="width:600px;font-size:12px;align:left">
				
					
				</td>
			</tr>

			</table>
			<!-- <table>
			
			<tr>
			<td style="width:1000px;font-size:12px;align:left">

				
					<label for="">Address of Parent or Guardian:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:12px;text-transform: capitalize"><?php echo $row['P_ADDRESS'] ?></h>				
			</td>
			</tr>			
			</table> --> 
			<!-- <table>
			<tr> -->

			<!-- <td style="width:800px;font-size:12px">

				
					<label for="">Intermediate Course Completed at:&nbsp</label>
					<h style="text-transform: capitalize"><?php echo $row['INT_COURSE_COMP'] ?></h>
				
			</td>
			<td style="width:200px;font-size:12px">
				<label for="">Year:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="text-transform: capitalize"><?php echo $row['University_YEAR'] ?></h>
			</td>
			<td style="width:200px;font-size:12px">
				<label for="">Ave:&nbsp</label>
					<h style="text-transform: capitalize"><?php echo $row['GEN_AVE'] ?></h>
			</td> -->
			
			
			<!-- </tr>
		</table> -->
		<?php } ?>
		  </div>
          </div>
          
      	<p>


<div class="col-md-12">

         <table>
         <tr>
         	<td>
			
		
		<?php
		$sql= mysqli_query($conn,"SELECT * FROM student_info where STUDENT_ID = '$id'");
		while($row = mysqli_fetch_assoc($sql)){
			$mid = $row['MIDDLENAME'];
			$sql3 = mysqli_query($conn,"SELECT * FROM student_year_info where STUDENT_ID = '$id'");
			$num = mysqli_num_rows($sql3) ; 
			if($num > 0){
		$sql2 = mysqli_query($conn,"SELECT * FROM student_year_info where STUDENT_ID = '$id' order by SYI_ID DESC limit 1 ");
		while($row2 = mysqli_fetch_assoc($sql2)){

		 ?>
		
		
		<p class="p" style="text-align:justify;line-height:5mm;font-transform:capitalize"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp I hereby certify that this is the true record of &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo '<u>&nbsp&nbsp&nbsp&nbsp'  . $row['FIRSTNAME'] . ' ' .  substr("$mid", 0, 1) . '. ' . $row['LASTNAME'] . '&nbsp&nbsp&nbsp</u>' . '.' ?> This students is indeed a student of the International University of Information Technologies. 3 courses of information technology full-time education.
 &nbsp&nbsp&nbsp <?php echo date("d") . 'th'?> &nbsp&nbsp&nbsp day of &nbsp&nbsp&nbsp <?php echo date("M") . ',' . date("y")?> &nbsp&nbsp&nbsp for admission to &nbsp&nbsp&nbsp <?php echo $row2['TO_BE_CLASSIFIED'] ?>&nbsp&nbsp&nbsp year as (regular/irregular) student, and has no property responsibility in this University. </p>

		<?php
		}
	}else{
		?>
		<p class="p" style="text-align:justify;line-height:5mm;font-transform:capitalize"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp I hereby certify that this is the true record of &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo '<u>&nbsp&nbsp&nbsp&nbsp'  . $row['FIRSTNAME'] . ' ' .  substr("$mid", 0, 1) . '. ' . $row['LASTNAME'] . '&nbsp&nbsp&nbsp</u>' . '.' ?> This student is eligible on this &nbsp&nbsp&nbsp <?php echo date("d") . 'th'?> &nbsp&nbsp&nbsp day of &nbsp&nbsp&nbsp <?php echo date("M") . ',' . date("y")?> &nbsp&nbsp&nbsp for admission to &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp year as (regular/irregular) student, and has no property responsibility in this University. </p>

		
		<?php
		}
		}
		 ?>
			<table>
			<tr>
				<td align="left" style="width:500px">
					<h5>REMARKS:</h5>
				</td>
				<td style="">
					<table>
						
				
					
					<tr>
						<td>
							&nbsp
						</td>
					</tr>

						<tr>
							<td style="width:250px;border-bottom:1px solid black">
								
							</td>
						</tr>
						<tr>
						<td style="width:250px;">
							<center><h5>PRINCIPAL</h5></center>
						</td>
					</tr>
					</table>
				</td>

			</tr>
			</table>
         	</td>
         </tr>
         </table>

</div>
</p>

<?php

 mysqli_close($conn);
?>
</center>
</body>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;

	$.ajax({
		url:'print_log.php?act=form137&id=<?php echo $_GET['id'] ?>',
		success:function(html){
			$('#returncode').html(html);
		}
	});
}
</script>
</html>