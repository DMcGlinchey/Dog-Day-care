<?php
session_start();
$host = "localhost";
$dbUsername = "unn_w15026755";
$dbPassword = "PK7HOCGM";
$dbName = "unn_w15026755";

$dbConn = new mysqli("localhost", $dbUsername, $dbPassword, $dbName);

if ($dbConn->connect_error) {
    echo "<p>Connection failed: " . $dbConn->connect_error . "</p>\n";
    exit;
}

?>
<!DOCTYPE html>
<html>
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

<section>
    <div class="topnav" id="myTopnav"><!-- Navigation bar for navigating getting around the site-->
        <img class="logo" src="image/logo1w.png" alt="valid"/>
        <a href="logout.php">Logout</a>
        <a href="order.php" class="active">Return</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction4()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <script>
        function myFunction4() {<!-- Script to make the navigation bar responsive, changing to a vertical display on mobile devices -->
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

</section>
</head>
<body class="loggedin">
<br />
    <form action="connect.php"  onsubmit="return validateForm()" method="POST">

        <div style="clear:both"></div>
        <br />

        <div class="container" style="width:750px;"><!--displaying user order-->
            <h3>Order Details</h3>
            <div class="table-responsive">
                <table class="table table-bordered"><!--text box sizes-->
                    <tr>
                        <th width="10%">Confirm</th>
                        <th width="10%">Service</th>
                        <th width="10%">Username</th>
                        <th width="10%">Breed</th>
                        <th width="10%">Age</th>
                        <th width="10%">Gender</th>
                        <th width="10%">Neutered</th>
                        <th width="10%">Behaviour</th>
                        <th width="10%">Arrive</th>
                        <th width="10%">Depart</th>
                        <th width="10%">time</th>
                        <th width="10%">Time length</th>
                        <th width="10%">Forename</th>
                        <th width="10%">Surname</th>
                        <th width="10%">Pet</th>
                        <th width="10%">Postcode</th>
                        <th width="10%">Home</th>
                        <th width="10%">Email</th>
                        <th width="10%">Phone Number</th>
                    </tr>
                    <!--Carrying information over from order-->
                    <?php
                    if(!empty($_SESSION["shopping_cart"]))
                    {
                        $total = 0;
                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                        {
                            ?>

                            <?php
                            if(isset($_GET["action"]))
                            {
                                if($_GET["action"] == "delete")
                                {
                                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                                    {
                                        if($values["iitem_id"] == $_GET["item_id"])
                                        {
                                            unset($_SESSION["shopping_cart"][$keys]);
                                            echo '<script>alert("Item Removed")</script>';
                                            echo '<script>window.location="order.php"</script>';
                                        }
                                    }
                                }
                            }
                            ?>
                            <tr
                            <td colspan="1" align="left"><a href="order.php?action=delete&id=<?php echo $values["iitem_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                            <td> <a href="cart.php">Confirm</a></td>
                            <td> <?= $values["icheck1"] ; ?></td>
                            <td> <?php echo $values["iusername"]; ?></td>
                            <td> <?php echo $values["ibreed"]; ?></td>
                            <td> <?php echo $values["iage"]; ?></td>
                            <td> <?php echo $values["igender"]; ?></td>
                            <td> <?php echo $values["ineutered"]; ?></td>
                            <td> <?php echo $values["ibehaviour"]; ?></td>
                            <td> <?php echo $values["iarrive"]; ?></td>
                            <td> <?php echo $values["idepart"]; ?></td>
                            <td> <?php echo $values["itime1"]; ?></td>
                            <td> <?php echo $values["ilength1"]; ?></td>
                            <td> <?php echo $values["iforename"]; ?></td>
                            <td> <?php echo $values["isurname"]; ?></td>
                            <td> <?php echo $values["ipet"]; ?>></td>
                            <td> <?php echo $values["ipostcode"]; ?></td>
                            <td> <?php echo $values["ihome"]; ?></td>
                            <td> <?php echo $values["iemail"]; ?></td>
                            <td> <?php echo $values["inumber1"]; ?></td>
                            </tr>
                            <?php
                           }
                    }
                    ?><!--order date-->
                </table>

            </div>
        </div>
    </form>

<br />
<form action="connect.php"  onsubmit="return validateForm()" method="POST">
<div class="container" style="width:750px;">
    <div class="table-responsive">
    <table class="table table-bordered">
    <tr>
        <td>Service</td>
        <td>Booking fee</td>
    </tr>

    <tr>
    <td><?= $values["icheck1"] ; ?></td><!--booking fee-->
    <td>£5.00</td>
    </tr>
    </table>
    <br>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" align="right"><!--Paypal connection,connected with the start-up bank details-->
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="SS6LCLD3BGR4U">
        <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
    </form>

     <br>
            </div>
        </div>
    </form>

</body>
<footer>
    <!--the footer contains closing information the conclude the page-->

    <aside class="top">
        <A HREF="order.php"><img src="image/logo.png" alt="valid"/></A>
    </aside>
    <div class="links">
        <a href="index.html">Home</a>
        <a href="about.html">About</a><!--Navigation bar-->
        <a href="service.html">Services</a>
        <a href="contact.html">Contact</a>
        <a href="login.html">Login</a>
    </div>
    <div class="creator">
        <p>Created by Daniel McGlinchey</p>
    </div>
</footer>
</html>