<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
		#contentSearchFrame b{
			display: inline-flex;
			height: 30px;
			position:relative;
			left:5%;
			margin: 0px 60px 0px 0px;
			
		}
		#contentSearchFrame {
			
			width: 500px;
			height: 340px;
			border: 2px solid skyblue;
			padding: 10px 0px 0px 0px;
			margin: 25px 0px 0px 0px;
			position:relative;
			left:20%;
			border-radius: 20px;
			
			
		}
		
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	
</head>
<body>
<?php include "cargomenu.php"; ?>
<div id="SearchFrame">

<div id="contentSearchFrame">
<?php
if (isset($_GET['frame'])) {
$frame=$_GET['frame'];

$conn=mysqli_connect('localhost','root','','cargo');


$q="select * from stock WHERE frame='$frame'";
$res=mysqli_query($conn,$q);
$num=mysqli_num_rows($res);
mysqli_close($conn);
if ($num>0) {
	while($temp=mysqli_fetch_assoc($res)){
		echo "<b>Frame: </b><span>".$temp['frame']."</span>";
		echo "<br><b>Engine: </b><span>".$temp['engine']."</span>";
		echo "<br><b>Model: </b><span>".$temp['model']."</span>";
		echo "<br><b>Variant: </b><span>".$temp['variant']."</span>";
		echo "<br><b>Product: </b><span>".$temp['product']."</span>";
		echo "<br><b>Type: </b><span>".$temp['type']."</span>";
		echo "<br><b>Color: </b><span>".$temp['color']."</span>";
		echo "<br><b>Location: </b><span>".$temp['location']."</span>";
		echo "<br><b>Age: </b><span>".abs(round((strtotime(date("Y/m/d"))-strtotime($temp['invoice_date']))/86400))."</span>";
		echo "<br><b>MFG Date: </b><span>".date("M -Y",strtotime($temp['mfg_date']))."</span>";
		echo "<br><b>Plant: </b><span>".$temp['plant']."</span>";
		
	}
}
//echo $frame;
}
?>
</div>
			
</div>
</body>
</html>