<?php

session_start();
$to = "djm300697@gmail.com";
$subject = "Service Booked";
$button = "button";//data form the html page
$value = $_GET = ['iid'];
$check1 = $_POST['check1'];
$username = $_POST['username'];
$breed = $_POST['breed'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$neutered = $_POST['neutered'];
$behaviour = $_POST['behaviour'];
$arrive = $_POST['arrive'];
$depart = $_POST['depart'];
$time1 = $_POST['time1'];
$length1 = $_POST['length1'];
$forename = $_POST['forename'];
$surname = $_POST['surname'];
$pet = $_POST['pet'];
$postcode = $_POST['postcode'];
$home = $_POST['home'];
$email = $_POST['email'];
$number1 = $_POST['number1'];
$arrive = date('y-m-d', strtotime($arrive));
$depart = date('y-m-d', strtotime($depart));

if (!empty($check1) || !empty($username) || !empty($breed) || !empty($age) || !empty($gender) || !empty($neutered) || !empty($behaviour) || !empty($arrive)
    || !empty($time1) || !empty($forename) || !empty($surname) || !empty($pet) || !empty($postcode) || !empty($home) || !empty($email) || !empty($number1)) {
    //if text box left empty an error message will appear

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
    } else {

        $sql = "INSERT Into register (check1, username, breed, age, gender, neutered, behaviour, arrive, depart, time1, length1, forename, 
            surname, pet, postcode, home, email, number1) VALUES ('$check1', '$username', '$breed', '$age', '$gender', '$neutered', '$behaviour', '$arrive', '$depart', '$time1',
            '$length1', '$forename', '$surname', '$pet', '$postcode', '$home', '$email', '$number1')";
    //inserts data into a database
        $stmt = $dbConn->prepare('SELECT arrive FROM register');

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        // Has data displayed after being submitted into the database
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["iid"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'               =>     $_GET["iid"],
                'icheck1'               =>     $_POST["check1"],
                'iusername'               =>     $_POST["username"],
                'ibreed'          =>     $_POST["breed"],
                'iage'          =>     $_POST["age"],
                'igender'          =>     $_POST["gender"],
                'ineutered'          =>     $_POST["neutered"],
                'ibehaviour'          =>     $_POST["behaviour"],
                'iarrive'          =>     $_POST["arrive"],
                'idepart'          =>     $_POST["depart"],
                'itime1'          =>     $_POST["time1"],
                'ilength1'          =>     $_POST["length1"],
                'iforename'          =>     $_POST["forename"],
                'isurname'          =>     $_POST["surname"],
                'ipet'          =>     $_POST["pet"],
                'ipostcode'          =>     $_POST["postcode"],
                'ihome'          =>     $_POST["home"],
                'iemail'          =>     $_POST["email"],
                'inumber1'          =>     $_POST["number1"],

            );
            $_SESSION["shopping_cart"][$count] = $item_array;

        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="order.php"</script>';
        }
    }
    else
    {
        $item_array = array(
            'item_id'               =>     $_GET["id"],
            'icheck1'               =>     $_POST["check1"],
            'iusername'               =>     $_POST["username"],
            'ibreed'          =>     $_POST["breed"],
            'iage'          =>     $_POST["age"],
            'igender'          =>     $_POST["gender"],
            'ineutered'          =>     $_POST["neutered"],
            'ibehaviour'          =>     $_POST["behaviour"],
            'iarrive'          =>     $_POST["arrive"],
            'idepart'          =>     $_POST["depart"],
            'itime1'          =>     $_POST["time1"],
            'ilength1'          =>     $_POST["length1"],
            'iforename'          =>     $_POST["forename"],
            'isurname'          =>     $_POST["surname"],
            'ipet'          =>     $_POST["pet"],
            'ipostcode'          =>     $_POST["postcode"],
            'ihome'          =>     $_POST["home"],
            'iemail'          =>     $_POST["email"],
            'inumber1'          =>     $_POST["number1"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}



        $newJob = $dbConn->query($sql);

        //send an email to the user once they have made there order
        $current_id = $dbConn->insert_id;
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


        $headers .= 'From: ' . $email . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $customerHeaders = 'MIME-Version: 1.0' . "\r\n";
        $customerHeaders .= "X-Priority: 3\r\n";
        $customerHeaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $message = '<html><body>';
        $message .= '<h1 style="color:black;">Dog service</h1>';
        $message .= '<h2 style="color:black;">Reference Number: ' . $current_id . '</h2>';
        $message .= '<p style="color:black;font-size:18px;">Service: ' . $check1 . '</p>';
        $message .= '<p style="color:black;font-size:16px;">Date: ' . date("d/m/Y", strtotime($arrive)) . '</p>';
        $message .= '<p style="color:black;font-size:18px;">Time: ' . time("h:i:s", ($time1)) . '</p>';
        $message .= '<p style="color:black;font-size:18px;">Forename: ' . $forename . '</p>';
        $message .= '<p style="color:black;font-size:18px;">Surname: ' . $surname . '</p>';
        $message .= '<p style="color:black;font-size:18px;">Pet name: ' . $pet . '</p>';
        $message .= '<a href="http://unn-w15026755.newnumyspace.co.uk/website/index.html">Click Here to accept/Decline</a>';
        $message .= '</body></html>';
        //information that will appear in the email

    }

}

?>