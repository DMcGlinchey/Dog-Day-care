<?php


session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit();
}
// database information
$host = "localhost";
$dbUsername = "unn_w15026755";
$dbPassword = "PK7HOCGM";
$dbName = "unn_w15026755";

$dbConn = new mysqli("localhost", $dbUsername, $dbPassword, $dbName);
// links website to database
if ($dbConn->connect_error) {
    echo "<p>Connection failed: " . $dbConn->connect_error . "</p>\n";
    exit;
}

$stmt = $dbConn->prepare('SELECT email, title, forename, surname, number1, postcode, line_1, line_2, line_3, city FROM accounts WHERE id= ?');
// selected data from the database
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result( $email, $title, $forename, $surname, $number1, $postcode, $line_1, $line_2, $line_3, $city);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE HTML>

<html lang="en-uk">

<head>
    <!--Head is used to contain key information that will throught the whole page-->
    <TITLE></TITLE>
    <!--This is the title of the page-->


    <meta http-equiv="Content-Type"    content="text/html; charset=UTF-8">
    <meta name="authors" lang="en-us"  content="Daniel McGlinchey">
    <!-- This where the authors name is documneted-->
    <meta name="description"  content="">
    <!-- This is the description of the site-->
    <meta name="keywords" lang="en-us"
          content="">
    <!-- These are key words that will appear through the site-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stlform.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<header>
    <section>
        <div class="topnav" id="myTopnav">
            <img class="logo" src="image/logo1w.png" alt="valid"/>
            <a href="logout.php">Logout</a>
            <a href="profile.php"class="active">Profile</a>
            <a href="order.php">Orders</a>
            <a href="home.php">Home</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction4()">
                <i class="fa fa-bars"></i>
            </a>
        </div>

        <script>
            function myFunction4() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>

    </section>

</header>
<body>
</section>
<div class="contentphp">
    <h2>Profile Page</h2>
    <div><!-- displays data from the selected database table-->
        <p>Your account details are below:</p>
        <table>
            <tr>
                <td>Username:</td><!-- Selected data->
                <td><?=$_SESSION['name']?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?=$email?></td>
            </tr>
            <tr>
                <td>Title:</td>
                <td><?=$title?></td>
            </tr>
            <tr>
                <td>Forename:</td>
                <td><?=$forename?></td>
            </tr>
            <tr>
                <td>Surname:</td>
                <td><?=$surname?></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><?=$number1?></td>
            </tr>
            <tr>
                <td>Postcode:</td>
                <td><?=$postcode?></td>
            </tr>
            <tr>
                <td>Address line 1:</td>
                <td><?=$line_1?></td>
            </tr>
            <tr>
                <td>Address line 2:</td>
                <td><?=$line_2?></td>
            </tr>
            <tr>
                <td>Address line 3:</td>
                <td><?=$line_3?></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><?=$city?></td>
            </tr>
        </table>
    </div>
</div>

<div class="follow"><h4>Follow us on:</h4></div>
<div class="social_box">
    <A HREF=""><img src="image/facebook.png" alt="valid"/></A>
    <A HREF=""><img src="image/instagram.png" alt="valid"/></A>
    <A HREF=""><img src="image/twitter.png" alt="valid"/></A>
</div>


<style></style>
</body>
<footer>
    <!--the footer contains closing information the conclude the page-->

    <aside class="top">
        <A HREF="login.html"><img src="image/logo.png" alt="valid"/></A>
    </aside>
    <div class="links">
        <a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="service.html">Services</a>
        <a href="contact.html">Contact</a>
        <a href="login.html">Login</a>
    </div>
    <div class="creator">
        <p>Created by Daniel McGlinchey</p>
    </div>
</footer>
</html>