<!DOCTYPE HTML>

<?php
	function Redirect($url, $permanent = false){
		header('Location: ' . $url, true, $permanent ? 301 :302);
		exit();
	}

	session_start();
	if(isset($_SESSION['username'])){
		echo "";
	}
	else{
		//echo "You need to be logged in!";
		Redirect('login.php', false);
		echo "";
	}
?>

<html>
	<head>
		<title>Profile</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<style>
		.button{
		background-color:#000000;
		border: none;
		color:white;
		padding: 15px 32px;
		text-align: center;
		text-decoration:none;
		display:inline-block;
		font-size: 14px;
		}
	</style>
	<nav>
		<ul>
			<a href="adminprofile.php">
			<img src="logo2.png" alt="logo" class="logo">
			</a>
			<li style="float:right"><a href="adminprofile.php">Profile</a></li>
			<li style="float:right"><a href="usercontrol.php">Users</a></li>
			<li style="float:right"><a href="postcontrol.php">Posts</a></li>
		</ul>
	</nav>
	<body>
		<?php
			include 'dbconnect.php';

			$loggedin=$_SESSION["username"];
			$sql = "SELECT username, fullname, email, year FROM account WHERE username = '".$loggedin."'";
			if($result = $connect->query($sql)){

			    while($row = $result->fetch_assoc()) {
			        echo "<table><tr><td><b>Username: </b></td><td>".$row['username']."</td></tr>".
					"<tr><td><b>Full name: </b></td><td>".$row['fullname']."</td></tr>".
					"<tr><td><b>E-mail: </b></td><td>".$row['email']."</td></tr>".
					"<tr><td><b>Year: </b></td><td>".$row['year']."</td></tr></table>";
			    }
			    $result->free();
			} 
			else {
			    echo "0 results";
			}
		?>
		<a href="logout.php">
		<input class="button" type="button" name="logout" value="Logout" id="logout"></a>


	</body>
</html>