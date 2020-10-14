
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<?php
	$errormsg="";
	if (isset($_POST['submit'])) {
		session_start();
		$id=$_POST['user'];
		$password=$_POST['Password'];
		if ($id=="Admin" and $password=="Admin") {
			$errormsg="Login Successful";	
			$_SESSION['name']=$id;

		}else{
			//header("location: logingpage.php");
			$errormsg="Enter User or Password";	
		}

	}else{
		//header("location: logingpage.php");
		//$errormsg="Enter User or Password";
	}
	?>

	  <link rel="stylesheet" type="text/css" href="stylesheet/loginpage.css">
</head>
<body>
<div id="container">
	<form action="" method="post">
		<div class="content"><input type="text" name="user" placeholder="User Name"></div>
		<div class="content"><input type="Password" name="Password" placeholder="Password"></div>
		<div class="btn"><input type="submit" name="submit"></div>
	</form>
	<div class="errmsg"><?php echo $errormsg; ?></div>
</div>
</body>
</html>