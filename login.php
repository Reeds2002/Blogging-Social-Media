<!DOCTYPE HTML>

<?php
	require('dbconnect.php');
	session_start();

    if (isset($_POST['username'])){

		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($connect,$username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($connect,$password);
		$query = "SELECT * FROM `account` WHERE username='$username' AND password='".md5($password)."'";
		$result = mysqli_query($connect,$query) or die (mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: profile.php");
			}
		if(($rows==1) && ($username=='admin')){
			$_SESSION['username'] = $username;
			header("Location: usercontrol.php");
		}	
		else{
			echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
			}
    }else{}
?>

<html>
	<head>
		<title>S.M.I.B.S.</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<style>
		p{
		border: 1px solid lightgrey;
		background-color: white;
		border-radius: 5px;
		text-align: center;
		position: relative;
		left: 230px;
		top: 125;
		width: 800px;
	}
	</style>
	<body>
		<nav>
			<ul>
				<a href="login.php">
				<img src="transparent.png" alt="logo" class="logo">
				</a>
				<li style="float:right"><a href="login.php">Home</a></li>
				<li style="float:right"><a href="signup.php">Sign Up</a></li>
			</ul>
		</nav>
		<br/>
		<br/>
		<p>
			<br/>
			In this hard day and age it can be difficult for high school students to find time to meet up and relax after a tough day.
			<b>S.M.I.B.S.</b> is a useful tool for IB students to share their day by blogging or just being able to read about other IB Students.
			<br/>
			<br/>
			This will remind you that you are not alone and you may be able to learn how others deal with situations and you can use this knowledge in your own life.
			<br/>
			<br/>
		</p>
		<br/>
		<br/>
		<form name="login" action="" method="post" >
			<table class="form">
				<tr>
				<td></td>
					<td style="color:red;">
					<!--<?php echo $msg; ?>--></td>
				</tr><tr>
					<th><label for="name"><strong>Username:</strong></label></th>
					<td><input class="inp-text" name="username" id="username" type="text" size="30" /></td>
				</tr><tr>
					<th><label for="name"><strong>Password:</strong></label></th>
					<td><input class="inp-text" name="password" id="password" type="password" size="30" /></td>
				</tr><tr>
				<td></td>
					<td class="submit-button-right">
					<input class="send_btn" type="submit" value="Login" alt="Submit" title="Submit" />
				</tr>
			</table>
		</form>
	</body>
</html>