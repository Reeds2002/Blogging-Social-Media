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
        $comment = $_POST['comment'];
        $user=$_SESSION["username"];
        $specpost = $_POST['postid'];

        mysqli_query($connect,"INSERT INTO comments (postnum, user, comment)
                                VALUES ('$specpost','$user','$comment')");

                if(mysqli_affected_rows($connect) > 0){
                    header("Location: post.php?num=$specpost");
                    echo "Comment added!";
        } else {
                echo "Post could not be added, Something did not work<br />";
                echo mysqli_error ($connect);
        }
    ?>

    </body>
</html>