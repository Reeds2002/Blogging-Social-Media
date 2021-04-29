<!DOCTYPE HTML>

<?php

	session_start();
	if(isset($_SESSION['username'])){
		echo "";
	}
	else{
		Redirect('login.php', false);
		echo "";
	}
	?>

<html>
	<head>
		<title>New Post</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<nav>
		<ul>
			<a href="feed.php">
			<img src="logo2.png" alt="logo" class="logo"></a>
			<li style="float:right"><a href="blog.php">Back</a></li>
		</ul>
	</nav>
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
		.text{
			size:50;
		}
		input[type=text] {
  			border: 1px solid black;
  			border-radius: 4px;
			font-size: 16px;
		}
		textarea{
			border: 1px solid black;
  			border-radius: 4px;
			font-size: 16px;
		}
		
	</style>
    <body>

<form action="newpostdata.php" method="post" name="myform" id="myform">
			<div align="left"><label>Title: <span span id='title' class="error_strings"></span></label><br/>
			<input name="title" type="text" value="" size="216" required><br/><br/>

			<label>Post: <span id='post' class="error_strings"></span></label><br/>
			<textarea name="post" type="text" value="" rows="30" cols="164"></textarea></div><br/><br/>
			<div align='center'><input class='button' value='Post' type='submit' required></div>
	</body>
</html>