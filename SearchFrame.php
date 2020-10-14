<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#SearchFrame{
			width: 400px;
			height: 150px;
			border: 2px solid skyblue;
			padding: 30px 0px 0px 100px;
			margin: 25px 0px 0px 0px;
			position:relative;
			left:20%;
			border-radius: 20px;
		}
		#errormsg{
			color: red;
			margin: 15px 0px 0px 0px;
			position:absolute;
			left:40%;
			visibility: hidden;
		}
		#btn{
			background-color: linear-rgba;
			width: 80px;
			height: 35px;
			border: 1px solid dodgerblue;
			border-radius: 8px;
			position: absolute;
			display: flex;
			margin: 50px 10px 0px 110px;
			font-size: 20px;
			text-align: right;
		}
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
			visibility: hidden;
			
		}
		input{
			border: 2px solid skyblue;
			width: 230px;
			height: 25px;
			border-radius: 8px;
			font-size: 18px;

		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			var iframe = document.getElementById('frm');
			
			$("button").click(function(){
				if(iframe[0].value=="") {
				$("#errormsg").css("visibility","visible");
			}else{
				$("#errormsg").css("visibility","hidden");
				$("#contentSearchFrame").css("visibility","visible");
				//alert(iframe.elements[0].value);
				$("#contentSearchFrame").load("SearchFrameDB.php", {
					frame: iframe.elements[0].value
				});
				}
			});
			
		});


	</script>
</head>
<body>
<?php include "cargomenu.php"; ?>
<div id="SearchFrame">
	<form id="frm">
		<label>Frame No.:</label>
		<input type="text" name="frame" placeholder="Enter Frame No.">
		<div id="errormsg">Please enter frame!</div>
		
	</form>
	<button id="btn">Search</button>
		
	</div>
	<div id="contentSearchFrame"></div>
</body>
</html>