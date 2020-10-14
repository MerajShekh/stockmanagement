<?php
$conn=mysqli_connect('localhost','root','','cargo');

$branch=$_POST['branch'];
$branch=strtoupper($branch);
$q="select DISTINCT model from stock WHERE location='$branch'";
$res=mysqli_query($conn,$q);
$num=mysqli_num_rows($res);
mysqli_close($conn);

if ($num>0) {
	echo "<option>Select All Model</opntion>";
	while($temp=mysqli_fetch_assoc($res)){
		echo "<option>".$temp['model']."</opntion>";
	}
}else{
	echo "<option>Select Another Branch</opntion>";
}
//echo "<option>".$branch."</opntion>";
?>