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
		<title>Blog</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<nav>
		<ul>
			<a href="feed.php">
			<img src="logo2.png" alt="logo" class="logo">
			</a>
			<li style="float:right"><a href="profile.php">Profile</a></li>
			<li style="float:right"><a href="blog.php">Blog</a></li>
			<li style="float:right"><a href="feed.php">Feed</a></li>
		</ul>
	</nav>
	<div class='body'>
	<body>
		<div class='first'><a href="newpost.php">
			<input type="button" class="button" value="New Post">
		</a></div>

		<?php	
			include 'dbconnect.php';

			
			$loggedin=$_SESSION["username"];
			$sql = "SELECT title, post, id FROM posts WHERE user = '".$loggedin."'";
			if($result = $connect->query($sql)){

				while(($row = $result->fetch_assoc()) && ($row['user']= $loggedin)) {
					$feedpost=substr($row['post'],0,545);
					echo "<div style='font-size:18px' align='center'><a href='post.php?num=".$row['id']."'><p><b>".$row['title']."</b><br>".
					$feedpost."<font color='lightgrey'>...more</font></p></a></div>";
				}
				$result->free();
			} 
			else {
				echo "0 results";
			}
		?>

	</body>
	</div>
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
			
			transition: .5s ease;
    		left: 300px;
    		top: 100px;
		}
		p{
			border: 1px solid lightgrey;
			border-radius: 5px;
			text-align: center;
			position: center;
			left: 65px;
			top: 150px;
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

		#body{
			position:absolute;
			top: 500px;
		}
	</style>
</html>
