<?php
session_start();
?>
<html lang="en">

<head>
    <link href="login_Style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
                <li><a class="active" href="#">LOGIN</a></li>
                <li><a href="Registration.php">REGISTER</a></li>
            </ul>
            <img class="search" src="./images/loupe.png" />
            <img class="shopping_bag" src="./images/shopping-bag.png" />
        </nav>
    </header>

    <header class="That_grey_bar">
        <p class="That_text"><span class="cyan_text">Home&nbsp; </span> /&nbsp; Login</p>
    </header>

    <form method="POST" action="">
        <h3 style="text-align:center;">Login</h3>
        <div id="form">
            <div id="login">
                <label>Username :</label><br>
                <input type="text" name="username" id="username" size="30" style="padding:5px" required><br><br>
                <label>Password :</label><br>
                <input type="text" name="password" id="password" size="30" style="padding:5px" required><br><br>
                <button type="submit" class="sub submit">Login</button>
                <input type="reset" value=" Reset" class="sub reset"><br><br>
                <a href="">
                    <input type="reset" value="Forget password" class="sub forget">
                </a>
            </div>
        </div>

    </form>

    <?php
    $servername = "localhost";
    $username = "varun";
    $password = "varun123";
    $databaseName = "pharma_store";
    $check_username = "";
    $check_password = "";

    $un = $_POST['username'];
    $pw = $_POST['password'];


    $conn = mysqli_connect($servername, $username, $password, $databaseName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result_can = mysqli_query($conn, "SELECT username, pwd FROM Registered_Customer WHERE username='$un' AND pwd='$pw'");

    while ($row = mysqli_fetch_assoc($result_can)) {

        $check_username = $row['username'];
        $check_password = $row['pwd'];
    }

    if (isset($un)) {

        if ($un == $check_username && $pw == $check_password) {
            // Creating sessions
            
            // echo "<h3>correct password</h3> session created";
            $_SESSION["logged_in"] = true;
            $_SESSION["user"] = $un;
        } else {
            echo "wrong user name and pass";
            // echo "<script type='text/javascript'>alert('password is wrong');</script>"; 

        }
    }

    $conn->close();
    ?>

</body>
</html>