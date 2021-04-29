<!DOCTYPE HTML>

<html>
	<head>
	</head>
	<body>
		<nav>
			<ul>
				<li style="float:left"><a href="login.php">Home</a></li>
			</ul>
		</nav>
		<br/><br/><br/><br/>

		<form action="signupdata.php" method="post" name="myform" id="myform">
			<label>Username: <span span id='myform_username_errorloc' class="error_strings"></span></label><br/>
			<input name="username" type="text" value="" required><br/><br/>

			<label>Full Name: <span id='myform_fullname_errorloc' class="error_strings"></span></label><br/>
			<input name="fullname" type="text" value=""><br/><br/>

			<label>E-mail: <span span id='myform_email_errorloc' class="error_strings"></span></label><br/>
			<input name="email" type="text" value="" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br/><br/>

			<label>Year:<span span id='myform_year_errorloc' class="error_strings"></span></label><br/>
			<select name="year" id="year" required>
			<option name="Select"/>Select</option>
			<option name="IB1"/>IB1</option>
			<option name="IB2"/>IB2</option>
			<option name="Alumni"/>Alumni</option>
			</select>
			<br/><br/>
			<label>Password: <span id="myform_password_errorloc" class="error_strings"></span></label><br/>
			<input name="password" type="password" value="" required><br/>

			<input name="submit" type="submit" value="Sign Up"/>
	</body>

</html>
