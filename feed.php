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
		<title>Feed</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<nav>
		<ul>
			<a href="feed.php">
			<img src="logo2.png" alt="logo" class="logo"></a>
			<li style="float:right"><a href="profile.php">Profile</a></li>
			<li style="float:right"><a href="blog.php">Blog</a></li>
			<li style="float:right"><a href="feed.php">Feed</a></li>
		</ul>
	</nav>
	<style>
		p{
			border: 1px solid lightgrey;
			border-radius: 5px;
			text-align: center;
			position: right;
			left: 13px;
			top: 13px;
			width: 90%;
			color: black;
		}
		p:hover{
			text-decoration: underline;
		}
		a{
			text-decoration: none;
			color: black;
		}
	</style>	
	<body>
	<?php
	$placeholderhtml = "";
	if (true != true) {
		echo $placeholderhtml;
	}

		include 'dbconnect.php';

		$sql = "SELECT id, title, post, user FROM posts";
		if($result = $connect->query($sql)){
			while($row = $result->fetch_assoc()) {
				$feedpost=substr($row['post'],0,545);
				echo "<div style='font-size:18px' align='center'><a href='post.php?num=".$row['id']."'><p><b>".$row['title']."</b> by ".$row['user']."<br>".
				$feedpost."<font color='lightgrey'>...more</font></p></a></div>";
			}
			$result->free();
		} 
		else {
			echo "0 results";
		}
	?>
	</body>
</html>