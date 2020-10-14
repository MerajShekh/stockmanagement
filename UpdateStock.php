<?php 

$conn=mysqli_connect('localhost','root','','cargo');
$msg="";
if (isset($_POST['submit'])) {
			mysqli_query($conn,"delete from stock");
			if ($_FILES['file']['name']) {
			$filename=explode('.',$_FILES['file']['name']);
			if ($filename[1]=='csv') {
				$handle=fopen($_FILES['file']['tmp_name'],"r");

				while ($data = fgetcsv($handle)) {
					date_default_timezone_set('Asia/Calcutta');
					$frame=mysqli_real_escape_string($conn,$data[0]);
					$engine=mysqli_real_escape_string($conn,$data[1]);
					$model=mysqli_real_escape_string($conn,$data[2]);
					$variant=mysqli_real_escape_string($conn,$data[3]);
					$product=mysqli_real_escape_string($conn,$data[4]);
					$type=mysqli_real_escape_string($conn,$data[5]);
					$color=mysqli_real_escape_string($conn,$data[6]);
					$location=mysqli_real_escape_string($conn,$data[7]);
					$mfg_date=date("Y-m-d",strtotime(mysqli_real_escape_string($conn,$data[8])));
					$invoice_date=date("Y-m-d",strtotime(mysqli_real_escape_string($conn,$data[9])));
					$plant=mysqli_real_escape_string($conn,$data[10]);
					//echo $mfg_date.", ";
					$query="INSERT INTO stock(frame,engine,model,variant,product,type,color,location,mfg_date,invoice_date,plant) values('$frame','$engine','$model','$variant','$product','$type','$color','$location','$mfg_date','$invoice_date','$plant')";
					mysqli_query($conn,$query);
				}
				fclose($handle);
				$result = mysqli_query($conn,"select count(1) FROM stock");
				$row = mysqli_fetch_array($result);
				$totalframe = $row[0];
				$msg="Total ".$totalframe." Frames Upload Successful";
				//$msg= "Upload Successful";
				
			}
		}

// $result = mysqli_query($conn,"select count(1) FROM stock");
// $row = mysqli_fetch_array($result);
// $totalframe = $row[0];
// $msg="Total ".$totalframe." Frames Upload Successful";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#updatedata{
			width: 410px;
			height: 180px;
			border: 2px solid skyblue;
			padding: 30px 0px 0px 30px;
			margin: 25px 0px 0px 0px;
			position:relative;
			left:20%;
			border-radius: 20px;
		}
		#btn{
			background-color: lightblue;
			width: 120px;
			height: 35px;
			border: 1px solid dodgerblue;
			border-radius: 8px;
			margin: 25px 10px 0px 110px;
			font-size: 20px;
			text-align: center;

		}
		#updatedata div{
			color: darkgreen;
			font-size: 18px;
			font-weight: bold;
			margin: 20px 10px 0px 110px;

		}
		label{
			font-size: 18px;
			font-weight: bold;
			color: green;
		}
				
		input{
			border: 2px solid skyblue;
			width: 330px;
			height: 25px;
			border-radius: 8px;
			font-size: 18px;
			margin-top: 15px;

		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	
</head>
<body>
<?php include "cargomenu.php"; ?>
<div id="updatedata">
	<form id="frm" method="post" enctype='multipart/form-data'>
		<label>Select File</label>
		<input type="file" name="file">
		<div><?php echo $msg; ?></div>
		<input type="submit" name="submit" id="btn">
	</form>
	
		
	</div>
	
</body>
</html>