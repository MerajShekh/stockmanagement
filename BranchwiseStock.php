<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#SearchFrame{
			width: 400px;
			height: 250px;
			border: 2px solid skyblue;
			padding: 30px 0px 0px 100px;
			margin: 25px 0px 0px 0px;
			position:relative;
			left:20%;
			border-radius: 20px;
		}
		#btn{
			background-color: lightblue;
			width: 80px;
			height: 35px;
			border: 1px solid dodgerblue;
			border-radius: 8px;
			position: absolute;
			display: flex;
			margin: 70px 10px 0px 110px;
			font-size: 20px;
			text-align: right;
		}
					
		select{
			border: 2px solid skyblue;
			width: 230px;
			height: 25px;
			border-radius: 8px;
			font-size: 15px;
			margin: 10px 0px 0px 0px;

		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<!-- <script type="text/javascript">
		
		//field change event
		$(document).ready(function(){
		var model="5g";
			$("#branchfld").change(function(){
				$("#modelfld").load("FetchModel.php", {
					branch:$("#branchfld").val()});
				
				});
				
			});

	
	</script> -->
</head>
<body>
<?php include "cargomenu.php"; ?>
<div id="SearchFrame">
	<form id="frm" action="FetchStockSummary.php" method="post">
		<label>Branch:</label>
		<select id="branchfld" name="branchfld">
			<option>Select Branch</option>
			<option>Gandhidham</option>
			<option>Bhuj</option>
			<option>Anjar</option>
			<option>Mundra</option>
			<option>Bhachau</option>
			<option>Rapar</option>
			<option>Mandvi</option>
			<option>Samakhiyali</option>
		</select>
		<br><label>Model:</label>
		<select id="modelfld" name="modelfld">
			<option>Select Model</option>
			
			<?php 

			$modelarray=array("ACTIVA 5G","ACTIVA 125","ACTIVA I","GRAZIA","AVIATOR","DIO","CLIQ","NAVI","CB UNICORN","CB SHINE","CB125 SHINE SP","DREAM YUGA","DREAM NEO","CD 110 DREAM","LIVO","CB HORNET 160R","X BLADE","CBR250R");
			foreach($modelarray as $tmp)
			{
				echo "<option>".$tmp."</option>";
			}
			?>
			
		</select>
		<input type="submit" name="" id="btn">

	</form>
	
		
	</div>
	
</body>
</html>