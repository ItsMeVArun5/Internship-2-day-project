<?php
session_start();
?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="RegForm(rahul).css">
	<title>Register</title>
</head>

<body>
	<header>
		<p><a>PHARMA</a></p>
		<nav>
			<ul>
				<li><a href="index.html">HOME</a></li>
				<li><a href="store.html">STORE</a></li>
				<li><a href="about.html">ABOUT</a></li>
				<li><a href="contact.php">CONTACT</a></li>
				<li><a href="login.php">LOGIN</a></li>
				<li><a class="active" href="#">REGISTER</a></li>
			</ul>
			<a href="#"><img class="search" src="./images/loupe.png" /></a>
			<a href="#"><img class="shopping_bag" src="./images/shopping-bag.png" /></a>
		</nav>
	</header>

	<header class="That_grey_bar">
		<p class="That_text"><span class="cyan_text">Home&nbsp; </span> /&nbsp; Register</p>
	</header>

	<div class="form">
		<h1 id="header">CUSTOMER REGISTRATION!</h1>
		<form method="POST" onsubmit="return validation()">
			<label id="FN">FIRSTNAME:</label>
			&nbsp;
			<label id="LN">LASTNAME:</label><br>
			<input type="text" name="firstname" id="fname" value="" required>
			&nbsp;
			<input type="text" name="lastname" id="lname" value="" required>
			<br><br>
			<label id="UN">USERNAME:</label>
			&nbsp;
			<label id="MN">MOBILE NO:</label>
			<br>
			<input type="username" name="username" id="uname" value="" required>
			&nbsp;
			<input type="text" name="mobile" id="mobile" value="" required>
			<br><br>
			<label id="EL">EMAIL ID:</label>
			&nbsp;
			<label id="AG">AGE:</label><br>
			<input type="email" name="email" id="eml" value="" required>
			&nbsp;
			<input type="number" name="age" id="age" value="" required>
			<br><br>
			<label id="gender">GENDER:</label>
			&nbsp;
			<label id="male" required>Male</label>
			&nbsp;
			<input type="radio" name="gender" value="male">
			&nbsp;
			<label>Female</label>
			&nbsp;
			<input type="radio" name="gender" value="female">
			&nbsp;
			<label>Others</label>
			&nbsp;
			<input type="radio" name="gender" value="others">
			<br><br>
			<label id="PWD">PASSWORD:</label>
			&nbsp;
			<label id="CWD">CONFIRM PASSWORD:</label><br>
			<input type="password" name="password" id="password" value="">
			&nbsp;
			<input type="password" name="cpassword" id="cpassword" value="">
			<br>
			<!--<button type="button" onclick="alert('CHECK INFORMATION ONCE AGAIN!')">Alert</button>--><br>
			<button type="submit" onclick="validation()" id="submit">SUBMIT</button>
			&nbsp;
			<input type="reset" id="reset" value="RESET">

	</div>
	</form>
	<script type="text/javascript">
		function validation() {
			var fname = document.getElementById('fname').value;
			var lname = document.getElementById('lname').value;
			var user = document.getElementById('uname').value;
			var mobile = document.getElementById('mobile').value;
			var pass = document.getElementById('password').value;
			var cpass = document.getElementById('cpassword').value;
			var email = document.getElementById('eml').value;


			if (fname.length < 3 || fname.length > 20) {
				alert('please fill firstname correctly');
				return false;
			}
			if (!isNaN(fname)) {
				alert('please fill firstname correctly');
				return false;
			}
			if (lname.length < 3 || lname.length > 20) {
				alert('please fill lasttname correctly');
				return false;
			}
			if (!isNaN(lname)) {
				alert('please fill lastname correctly');
				return false;
			}
			if (user.length <= 5 || user.length >= 30) {
				alert('please fill username correctly');
				return false;
			}
			// if (!isNaN(user)) {
			// 	alert('please fill username correctly');
			// 	return false;
			// }
			if (mobile.length != 10) {
				alert('please fill mobile no correctly');
				return false;
			}
			if (pass.length <= 5 || pass.length >= 10) {
				alert('please fill password correctly');
				return false;
			}

			if (cpass.length <= 5 || cpass.length >= 10) {
				alert('please fill confirm password correctly');
				return false;
			}

			if (mobile.length <= 5 || cpass.length >= 10) {
				alert('please fill confirm password correctly');
				return false;
			}
			if (pass != cpass) {
				alert("password don't match");
				return false;
			}
		}
	</script>


	<?php
	$servername = "localhost";
	$db_username = "varun";
	$db_password = "varun123";
	$databaseName = "pharma_store";

	// Taking input from user.
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$username = $_POST['username'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$password = $_POST['password'];
	$cofirm_password = $_POST['cpassword'];


	//create connection
	$conn = mysqli_connect($servername, $db_username, $db_password, $databaseName);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Inserting values.

	$query = "INSERT INTO Registered_Customer(fname,lname,age,mobile_n,username,email_id,pwd)
		VALUES('$fname', '$lname', '$age', '$mobile', '$username', '$email', '$password')";

	if (mysqli_query($conn, $query)) {
		echo 'new record created successfully';
	} else {
		echo "Error:" . $query . "<br>" . $conn->error;
	}
	$conn->close();
	?>
</body>
</html>