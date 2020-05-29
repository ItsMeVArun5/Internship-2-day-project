<html lang="eng">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="contact_style.css">
	<title> Contact Us </title>
</head>

<body>

	<header>
		<p><a>PHARMA</a></p>
		<nav>
			<ul>
				<li><a href="index.html">HOME</a></li>
				<li><a href="store.html">STORE</a></li>
				<li><a href="about.html">ABOUT</a></li>
				<li><a class="active" href="contact.php">CONTACT</a></li>
				<li><a href="login.php">LOGIN</a></li>
				<li><a href="Registration.php">REGISTER</a></li>
			</ul>
			<img class="search" src="./images/loupe.png" />
			<img class="shopping_bag" src="./images/shopping-bag.png" />
		</nav>
	</header>

	<header class="That_grey_bar">
		<p class="That_text"><span class="cyan_text">Home&nbsp; </span> /&nbsp; Contact Us</p>
	</header>

	<div class="container">
		<h1 align="center" font-size="100"> <b> Contact Us </b> </h1>
		<main>
			<form method="post" enctype="multipart/form-data">
				<!-- <label for="username"> <b> Username </b> </label> <br> <br>
				<input type="text" id="username" aria-required="true" aria-invalid="false" required> <br> <br> -->

				<label><b> First Name <br> <br> </label>
				<input type="text" name="fname" id="mob_number" aria-required="false" aria-invalid="false" required> <br> <br>

				<label><b> Last Name <br> <br> </label>
				<input type="text" name="lname" id="mob_number" aria-required="false" aria-invalid="false" required> <br> <br>

				<label><b> Email ID <br> <br> </label>
				<input type="text" name="email" id="email" aria-required="false" aria-invalid="false" required> <br> <br>

				<label"> <b> Subject </b> <br> <br> </label>
				<input type="text" name="subject" id="subject" aria-required="true" aria-invalid="false" required> <br> <br>

				<label id="message"> <b> Your Message </b> <br> <br> </label>
				<textarea id="message" name="message" rows="20" cols="50"></textarea> <br> <br>

				<a><input type="submit" value="Send" onclick=clckmsg()> <br>

			</form>
		</main>
	</div>


	<script type="text/javascript">
		var email = document.getElementById('email').value;
		var sub = document.getElementById('subject').value;
		var msg = document.getElementById('message').value;

		// var usrname = document.getElementById('username').value;
		// var mnum = document.getElementById('mob_number').value;
		// var addr1 = document.getElementById('addr1').value;
		// var addr2 = document.getElementById('addr2').value;

		function FormValidation() {

			// if (!isNaN(usrname)) {
			// 	alert('Enter a valid Username');
			// 	return false;
			// }
			// if (usrname.length < 2) {
			// 	alert('Enter a valid username');
			// 	return false;
			// }

			// if (isNaN(mnum)) {
			// 	alert('Enter a valid mobile number')
			// 	return false;
			// }
			// if (mobile.length != 10) {
			// 	alert('Enter a valid mobile number');
			// 	return false;
			// }
			// if (!isNaN(addr1)) {
			// 	alert('Enter a valid Address')
			// 	return false;
			// }
			if (!isNaN(sub)) {
				alert('Enter a valid subject')
				return false;
			}
			if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
				alert("You have entered an invalid email address!")
				return (false)
			}

			return true;
		}

		function clckmsg() {

			if (usrname.length != 0 && email.length != 0 && mnum.length != 0 && addr1.length != 0 && addr2.length != 0 && sub.length != 0) {
				alert('Request sent successfully');
				return true;
			}
		}
	</script>

	<?php
	$servername = "localhost";
	$username = "varun";
	$password = "varun123";
	$dbname = "pharma_store";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	// Assign values to local vars

	// $usrname = $_POST["username"];
	// $mnum = $_POST["mob_number"];
	// $addr1 = $_POST["addr1"];
	// $addr2 = $_POST["addr2"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$sub = $_POST["subject"];
	$message = $_POST["message"];

	// Insert values into the database table

	$sql = "INSERT INTO contact_Form(fname, lname, email_id, subject, message)
	VALUES ('$fname', '$lname', '$email', '$sub', '$message')";

	if (!mysqli_query($conn, $sql)) {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	//Close connection 

	mysqli_close($conn);

	?>
</body>

</html>