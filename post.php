<!DOCTYPE HTML>

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
    <body>
        <?php 
            $specpost = $_GET['num'];
            
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

        include 'dbconnect.php';
        
        $sql = "SELECT title, post, id FROM posts WHERE id = '".$specpost."'";
        if($result = $connect->query($sql)){
            while($row = $result->fetch_assoc()) {
                echo "<div style='font-size:18px' align='center'><p><b>".$row['title']."</b><br>".
                $row['post']."</p></div>";
            }
            $result->free();
        } 
        else {
            Redirect('feed.php', false);
            echo "";
        }
        echo "<b>Comments!</b>";
        $sql = "SELECT postnum, comment FROM comments WHERE postnum = '".$specpost."'";
        if($result = $connect->query($sql)){
            while($row = $result->fetch_assoc()) {
                echo "<div class='comment'><p><div>".$row['comment']."</div></p></div>";
            }
        }
    ?>

<form action="commentdata.php" method="post" name="myform" id="myform">
			<div align="right"><label><b>Insert Comment Here:</b><span span id='title' class="error_strings"></span></label><br/>
			<label><span id='title' class="error_strings"></span></label><br/>
			<textarea name="comment" type="text" value="" rows="" cols=""></textarea><br/><br/>
            <input class='button' value='Comment' type='submit' required></div>
            <input type='hidden' name='postid' value='<?php echo "$specpost";?>'/>

    <style>
            p{
        border: 1px solid lightgrey;
        background-color: white;
        border-radius: 5px;
        text-align: center;
        position: right;
        left: 13px;
        top: 13px;
        width: 90%;
		}
    </style>
    </body>
</html>