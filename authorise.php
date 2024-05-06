<?php
// database information
session_start();
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

if (!isset($_POST['username'], $_POST['password'])){
    die(' Please fill both the username and password field');
}
// error if user doesn't fill out text boxes

if($stmt = $dbConn->prepare('SELECT id, password FROM accounts WHERE username = ?')) {// select login details

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();

        if (password_verify($_POST['password'], $password)) { // check id the password is correct
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: home.php');// if correct will log the user in and take them to the php home page
        } else {
            echo 'Incorrect password!';// if password is word an error message would appear
        }
    } else {
        echo 'Incorrect username!';
    }

    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["iid"], $item_array_id)) {// sessions to carry information over to following pages
            $_SESSION['loggedin'] = TRUE;

        }
        }
    $stmt->close();
}
?>