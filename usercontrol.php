<!DOCTYPE HTML>



<html>
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
	<link rel="stylesheet" href="styles.css">
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

		session_start();
		if(isset($_SESSION['username'])){
			echo "";
		}
		function Redirect($url, $permanent = false){
			header('Location: ' . $url, true, $permanent ? 301 :302);
			exit();
		}
		if($loggedin='admin'){
			echo "";
		}
		else{
			Redirect('feed.php', false);
			echo "";
		}


		$sql = "SELECT username FROM account";
		if($result = $connect->query($sql)){
			while($row = $result->fetch_assoc()) {
				echo "<p><br>".$row['username']."<br></p>";
			}
			$result->free();
		} 
		else {
			echo "0 results";
		}
	?>
	</body>
</html>