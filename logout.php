<?php
session_start();
session_destroy();
// Redirect to the login page:
header('Location: index.html');
?>
<!--this page appears on the login navigation bar, when clicked returns the user to the index page-->
