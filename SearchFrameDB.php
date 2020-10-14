<?php
$conn=mysqli_connect('localhost','root','','cargo');

$frame=$_POST['frame'];
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
}else{
	echo "<b style='color: red'>Frame not found</b>";
}
//echo "<b>Frame: </b><span>".$frame."</span>";
?>