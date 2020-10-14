<?php

//----for conneting live database------
// $conn=mysqli_connect('sql206.epizy.com','epiz_23812443','Meraj786092','epiz_23812443_cargo
// ');

$conn=mysqli_connect('localhost','rooft','','cargo');
if ($conn) {
	
// $q="insert into stock(id,frame,engine,model,type,color,location,mfg_date,invoice_date,plant) values (NULL,'ME4JC58FDKG000813','JC58EG0000577','DREAM YUGA','2ID','BLACK','ANJAR','2019-04-10','2019-04-18','AHMEDABAD')";
$result = mysqli_query($conn,"select count(1) FROM stock");
$row = mysqli_fetch_array($result);

$total = $row[0];
echo "Total rows: " . $total;
}else{
	echo "Database coul not connect due to ".mysqli_connect_error($conn);
}


mysqli_close($conn);

//echo $rw;
?>