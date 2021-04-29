<!DOCTYPE HTML>

<html>
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
    </style>
    <body>
        <?php
            session_start();
            
            $placeholderhtml = "";
            if (true != true) {
                echo $placeholderhtml;
            }

            include 'dbconnect.php';

            $sql = "SELECT title, post FROM posts";
            if($result = $connect->query($sql)){

                while($row = $result->fetch_assoc()) {
                    $feedpost=substr($row['post'],0,545);
                    echo "<div style='font-size:18px' align='center'><p><b>".$row['title']."</b><br>".
                    $feedpost."<font color='lightgrey'>...more</font></p></div>";
                }
                $result->free();
            } 
            else {
                echo "0 results";
            }
        ?>
    </body>
</html>