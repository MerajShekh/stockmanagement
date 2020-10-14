<?php
$conn=mysqli_connect('localhost','root','','cargo');

$branch=$_POST['branchfld'];
$model=$_POST['modelfld'];

// if ($branch=="Select Branch" && $model=="Select Model" || $model=="Select Another Branch") {
// 	header("location: BranchStock.php");
// }else{
	
// $q="select * from stock WHERE location='$branch' && model='$model'";
// $res=mysqli_query($conn,$q);
// $num=mysqli_num_rows($res);
// }
// mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cargo Honda</title>
	<style type="text/css">
		body{
			margin: 0px;
			padding: 0px;
			
		}
				
		#contentHome{
			margin: 20px;
			height: 500px;
		}
		table	{
			border : 2px solid black;
		}
		table th{
			background-color: orange;
		}
		table tr{
			text-align: center;
		}
		
		tr:nth-child(odd){
			background-color: #E8E8E8;	
		}
		
	</style>
</head>
<body>
<?php include "cargomenu.php"; ?>

	
	<div id="contentHome">
		<?php echo "<a href='BranchwiseStock.php'>Go Back</a>"; ?>

		<table width="1200">
			<tr>
				<th>Sr No</th>
				<th>Model</th>
				<th>Color</th>
				<th>Type</th>
				<th>Frame #</th>
				<th>Engine #</th>
				<th>Location</th>
				<th>Age</th>
				
			</tr>
			<?php 
			$counter=1;
			if ($branch=="Select Branch" && $model!="Select Model") {
				//header("location: BranchStock.php");
					$q="select * from stock WHERE model='$model' ORDER BY location ASC";
					$res=mysqli_query($conn,$q);
					$num=mysqli_num_rows($res);
					
					mysqli_close($conn);

					if ($num>0) {
						while($temp=mysqli_fetch_assoc($res)){
				echo "
					<tr>
						<td>".$counter."</td>
						<td>".$temp['model']."</td>
						<td>".$temp['color']."</td>
						<td>".$temp['type']."</td>
						<td>".$temp['frame']."</td>
						<td>".$temp['engine']."</td>
						<td>".$temp['location']."</td>
						<td>".abs(round((strtotime(date("Y/m/d"))-strtotime($temp['invoice_date']))/86400))."</td>
					</tr>
				";
					$counter++;
					}
				}else{
					//header("location: BranchStock.php");
					echo "cond1";
				}
				}else if ($branch!="Select Branch" && $model=="Select Model") {
					$q="select * from stock WHERE location='$branch' ORDER BY model ASC";
					$res=mysqli_query($conn,$q);
					$num=mysqli_num_rows($res);
					
					mysqli_close($conn);

					if ($num>0) {
						while($temp=mysqli_fetch_assoc($res)){
				echo "
					<tr>
						<td>".$counter."</td>
						<td>".$temp['model']."</td>
						<td>".$temp['color']."</td>
						<td>".$temp['type']."</td>
						<td>".$temp['frame']."</td>
						<td>".$temp['engine']."</td>
						<td>".$temp['location']."</td>
						<td>".abs(round((strtotime(date("Y/m/d"))-strtotime($temp['invoice_date']))/86400))."</td>
					</tr>
				";
					$counter++;
					}
				}else{
					echo "cond2";
					//header("location: BranchStock.php");
				}
				}else if ($branch!="Select Branch" && $model!="Select Model") {
					$q="select * from stock WHERE location='$branch' AND model='$model' ORDER BY model ASC";
					$res=mysqli_query($conn,$q);
					$num=mysqli_num_rows($res);
					
					mysqli_close($conn);

					if ($num>0) {
						while($temp=mysqli_fetch_assoc($res)){
				echo "
					<tr>
						<td>".$counter."</td>
						<td>".$temp['model']."</td>
						<td>".$temp['color']."</td>
						<td>".$temp['type']."</td>
						<td>".$temp['frame']."</td>
						<td>".$temp['engine']."</td>
						<td>".$temp['location']."</td>
						<td>".abs(round((strtotime(date("Y/m/d"))-strtotime($temp['invoice_date']))/86400))."</td>
					</tr>
				";
					$counter++;
					}
				}else{
					echo "cond2";
					//header("location: BranchStock.php");
				}
				}else{ echo header("location: BranchwiseStock.php");}
					
				?>
				
			
			
		</table>
	</div>

</body>
</html>



