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
			border : 2px solid lightblue;
			
		}
		

		table th{
			background-color: orange;
		}
		table tr{
			text-align: center;
		}
		.model-col{
			text-align: left;
			
			padding-left: 10px;
		}
		
		tr:nth-child(odd){
			background-color: #E8E8E8;	
		}
		
	</style>
</head>
<body>
<?php include "cargomenu.php"; ?>
	
	<div id="contentHome">

		<table width="1000">
			<tr>
				<th>Model</th>
				<th>Gandhidham</th>
				<th>Workshop</th>
				<th>Adipur</th>
				<th>Anjar</th>
				<th>Mundra</th>
				<th>Bhuj</th>
				<th>Bhachau</th>
				<th>Mandvi</th>
				<th>Rapar</th>
				<th>Samakhiyali</th>
				<th>Total</th>
			</tr>
			<?php
			$conn=mysqli_connect('localhost','root','','cargo');
			$modelarray=array("ACTIVA 5G","ACTIVA 125","ACTIVA I","GRAZIA","AVIATOR","DIO","CLIQ","NAVI","CB UNICORN","CB SHINE","CB125 SHINE SP","DREAM YUGA","DREAM NEO","CD 110 DREAM","LIVO","CB HORNET 160R","X BLADE","CBR250R");
			$locationarray=array("GANDHIDHAM","Workshop","Adipur","ANJAR","MUNDRA","BHUJ","BHACHAU","MANDVI","RAPAR","SAMAKHIYALI");
			$gtotal=0;

			for ($i=0; $i <count($modelarray) ; $i++) {
				echo "<tr>";
				echo "<td class='model-col'><b>".$modelarray[$i]."</b></td>";
				for ($j=0; $j <count($locationarray) ; $j++) {
				$q="SELECT * from stock WHERE model='$modelarray[$i]' AND location='$locationarray[$j]'";
				$res=mysqli_query($conn,$q);
				$num=mysqli_num_rows($res);
				
				echo "<td>".$num."</td>";
				
				}
				$q="SELECT * from stock WHERE model='$modelarray[$i]'";
				$res=mysqli_query($conn,$q);
				$num=mysqli_num_rows($res);
				echo "<td><b>".$num."</b></td>";
				echo "</tr>";
			}
			echo "<td class='model-col'><b>TOTAL</b></td>";
			for ($k=0; $k <count($locationarray) ; $k++) { 
				$q="SELECT * from stock WHERE location='$locationarray[$k]'";
				$res=mysqli_query($conn,$q);
				$num=mysqli_num_rows($res);
				echo "<td><b>".$num."</b></td>";
				$gtotal=$gtotal+$num;
			}
			echo "<td><b>".$gtotal."</b></td>";
			mysqli_close($conn);
			?>
			
			
		</table>
	</div>

</body>
</html>