
<?php

//database information
$host = "localhost";
$dbUsername = "unn_w15026755";
$dbPassword = "PK7HOCGM";
$dbName = "unn_w15026755";

$dbConn = new mysqli("localhost", $dbUsername, $dbPassword, $dbName);
// links website to database

if ($dbConn->connect_error) {
    echo "<p>Connection failed: " . $dbConn->connect_error . "</p>\n";
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$title = $_POST['title'];
$forename = $_POST['forename'];
$surname = $_POST['surname'];
$number1 = $_POST['number1'];
$postcode= $_POST['postcode'];
$line_1 = $_POST['line_1'];
$line_2 = $_POST['line_2'];
$line_3 = $_POST['line_3'];
$city = $_POST['city'];

if (!empty($title) || !empty($forename) || !empty($surname) || !empty($number1) || !empty($postcode) || !empty($line_1) || !empty($line_2) || !empty($line_3) || !empty($city)) {
//if text box left empty an error message will appear

    if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
        // Error message if one of the above has not been filled out
        exit('Please complete the registration form!');
    }
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        // left empty an error message would appear
        exit('Please complete the registration form');
    }
    if ($stmt = $dbConn->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
        // hash the password using the PHP password_hash function.

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            exit('Email is not valid!');//email error
        }

        if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
            exit('Username is not valid!');// username error
        }

        if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {// password error
            exit('Password must be between 5 and 20 characters long, please return to the previous page!');
        }
        $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            $stmt->store_result();
            // Store the result into the database.
            if ($stmt->num_rows > 0) {
                // Username already exists
                echo 'Username exists, please choose another, by returning to the previous page!';

        } else {
            if ($stmt = $dbConn->prepare('INSERT INTO accounts (username, password, email, title, forename, surname, number1, postcode,
                    line_1, line_2, line_3, city, activation_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {//inserts the data into the database
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);//encrypts the password
                $uniqid = uniqid();
                $stmt->bind_param('sssssssssssss', $_POST['username'], $password, $_POST['email'], $title, $forename, $surname, $number1, $postcode,
                    $line_1, $line_2, $line_3, $city, $uniqid);
                $stmt->execute();
                // sends an email to the user
                $from = 'djm300697@gmail.com';
                $subject = 'Account Activation Required';
                $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
                $activate_link = 'http://unn-w15026755.newnumyspace.co.uk/website/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
                $message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
                mail($_POST['email'], $subject, $message, $headers);
                header("location: login.php");
                echo 'Please check your email to activate your account!';
            } else {
                // Something is wrong with the sql statement
                echo 'Could not prepare statement!';
            }
        }

        $stmt->close();
    } else {
        // Something is wrong with the sql statement
        echo 'Could not prepare statement!';
    }

    $dbConn->close();
}
?>
