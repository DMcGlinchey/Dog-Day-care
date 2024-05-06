 <?php
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
// Checks email exist
if (isset($_GET['email'], $_GET['code'])) {
    if ($stmt = $dbConn->prepare('SELECT * FROM accounts WHERE email = ? AND activation_code = ?')) {
        $stmt->bind_param('ss', $_GET['email'], $_GET['code']);
        $stmt->execute();
        // Stores the data into the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // Account exists with the requested email and code.
            if ($stmt = $dbConn->prepare('UPDATE accounts SET activation_code = ? WHERE email = ? AND activation_code = ?')) {
                // Set the new activation code to 'activated', check if the user has activated their account.
                $newcode = 'activated';
                $stmt->bind_param('sss', $newcode, $_GET['email'], $_GET['code']);
                $stmt->execute();
                echo 'Your account is now activated, you can now login!<br><a href="index.html">Login</a>';
            }
        } else {
            echo 'The account is already activated or doesn\'t exist!';
        }
    }
}
?>