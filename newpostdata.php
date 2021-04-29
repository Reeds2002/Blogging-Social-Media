<?php include 'dbconnect.php'; ?>

<html>
	<head>
		<title>New Post</title>
		<link rel="stylesheet" href="style.css" />

		<style>
			h2 {color: gray;}
		</style>

	</head>

	<body>
		<br/><br/><br/>
		<h2>New Post Added Succesfully!</h2>

		<ul>
			<li style="float:left"><a href="feed.php">Feed</a></li>
		</ul>

	<?php
		session_start();

		$title = $_POST['title'];
		$post = $_POST['post'];
		$loggedin=$_SESSION["username"];
		$user = $loggedin;

		mysqli_query($connect,"INSERT INTO posts (title, post, user)
		                      VALUES ('$title','$post','$user')");

				if(mysqli_affected_rows($connect) > 0){
                    echo "<a href='blog.php'>";
		} else {
		        echo "Post could not be added, Something did not work<br />";
		        echo mysqli_error ($connect);
		}
	?>
	</body>
</html>