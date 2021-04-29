<?php include 'dbconnect.php'; ?>

<html>
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="style.css" />

		<style>
			h2 {color: gray;}
		</style>

	</head>

	<body>
		<br/>
		<br/>
		<br/>
		<h2>Sign Up</h2>
		<br>

	<?php
		$username = $_POST['username'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$year = $_POST['year'];
		$password = md5($_POST['password']);

		$query = mysqli_query($connect, "SELECT username FROM account WHERE username='".$username."'");
		if (mysqli_num_rows($query) != 0){
			header('Location: signup.php');
			echo "Username already exists";
		}
		else{
			mysqli_query($connect,"INSERT INTO account (username, fullname, email, year, password)
			VALUES ('$username','$fullname','$email', '$year', '$password')");

			if(mysqli_affected_rows($connect) > 0){
			echo "<table><tr><td><b>Username: </b>".$username."</td>
			<td></td></tr><tr><td><b>Full name: </b>".$fullname."</td>
			<td></td></tr><tr><td><b>E-mail: </b>".$email."</td>
			<td></td></tr><tr><td><b>Year: </b>".$year."</td>
			<td></td></tr></table><b><p>New Account Created Successfully</p></b>";
			$link_address = '/IA/profile.php';
			echo "<a href='".$link_address."'>Back to Home</a>";
			} else {
			echo "Account could not be created, Something did not work<br />";
			echo mysqli_error ($connect);
			}
			echo "";
		}



	?>
	</body>
</html>