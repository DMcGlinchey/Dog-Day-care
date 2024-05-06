<?php
session_start();
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
        <a href="profile.php">Profile</a>
        <a href="order.php" class="active">Orders</a>
        <a href="home.php">Home</a>
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
<div class="">
    <div class="contentphp">
        <h2 align="center">Book services</h2>
    </div>
    <form action="connect.php"  onsubmit="return validateForm()" method="POST"> <!--Connects the form to a php file-->

        <div class="booking-form-box">

            <form action="connect.php"  onsubmit="return validateForm()" method="POST">

                <script>
                    function openTab(tabName) {
                        var i, x;
                        x = document.getElementsByClassName("containerTab");<!--hides the booking system until clicked-->
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        document.getElementById(tabName).style.display = "block";
                    }
                </script>


                <div class="radio-btn"><!--radio buttons, when clicked turn black-->
                    <div class="bu">
                        <input type="radio" class="btn" name="check1" value="Boarding" required onclick="openTab('board');">
                        <span>Dog Boarding</span>
                    </div>
                    <div class="bu">
                        <input type="radio" class="btn" name="check1" value="Sitting" required onclick="openTab('board');">
                        <span>House Sitting</span>
                    </div>
                    <div class="bu">
                        <input type="radio" class="btn" name="check1" value="Daycare" required onclick="openTab('board');">
                        <span>Day Care</span>
                    </div>
                    <div class="bu">
                        <input type="radio" class="btn" name="check1" value="Walking" required onclick="openTab('board');">
                        <span>Dog Walking</span>
                    </div>
                </div>


                <div id="board" class="containerTab" style="display:none"><!--form text boxes to fillout -->
                    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

                    <div class="log">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>

                    <div class="input-grp">
                        <label>Primary breed</label>
                        <input type="text" class="form-control" placeholder="breed" name="breed" required>
                    </div>

                    <div class="input-grp">
                        <label>Dogs Age</label>
                        <select class="custom-select" name="age" required>
                            <option value="">Select</option>
                            <option value="under 1">under 1</option>
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="1">5</option>
                            <option value="1">6</option>
                            <option value="1">7</option>
                            <option value="1">8</option>
                            <option value="1">9</option>
                            <option value="1">10</option>
                            <option value="+">10+</option>
                        </select>
                    </div>

                    <div class="input-grp">
                        <label>Gender</label>
                        <select class="custom-select" name="gender" required>
                            <option value="">Select</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>

                    <div class="input-grp3">
                        <label>Neutered</label>
                        <select class="custom-select" name="neutered" required>
                            <option value="">Select</option>
                            <option value="yes">yes</option>
                            <option value="no">no</option>
                        </select>
                    </div>

                    <div class="input-grp3">
                        <label>Behaviour around other dogs</label>
                        <select class="custom-select" name="behaviour" required>
                            <option value="">Select</option>
                            <option value="yes">yes</option>
                            <option value="yes">no</option>
                        </select>
                    </div>

                    <div>
                    <label class="details">Date
                        <input type='date' name='date'></label>
                    <label class="details">Start Time
                        <input type='time' name='starttime'> </label>
                    <label class="details">End Time
                        <input type='time' name='endtime'></label>
                    </div>

                    <div class="input-grp3">
                        <label>Arrive</label>
                        <input type="date" class=" " name="arrive" required>
                    </div>

                    <div class="input-grp3">
                        <label>Depart (optional)</label>
                        <input type="date" class="form-control select-date" name="depart">
                    </div>

                    <div class="input-grp3">
                        <label>Time</label>
                        <input type="time" class="form-control select-date" name="time1" required>
                    </div>

                    <div class="input-grp3">
                        <label>Time Length (optional)</label>
                        <select class="custom-select" name="length1">
                            <option value="">Select</option>
                            <option value="0">Less than an hour</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>

                    <div class="input-grp3">
                        <label>Forename</label>
                        <input type="text" class="form-control" placeholder="Name" name="forename" required>
                    </div>

                    <div class="input-grp3">
                        <label>Surname</label>
                        <input type="text" class="form-control" placeholder="Name" name="surname" required>
                    </div>
                    <div class="booking-form">
                        <label>Pet's name</label>
                        <input type="text" class="form-control" placeholder="Name" name="pet" required>
                        <label>Postcode</label>
                        <input type="text" class="form-control" placeholder="Postcode" name="postcode" required>
                        <label>Home Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="home" required>
                        <label>Email Address</label>
                        <input type="text" class="form-control" placeholder="Email Address" name="email" required>
                        <label>Phone Number</label>
                        <input type="number" class="form-control" placeholder="Phone Number" name="number1" required>
                    </div>

                    <div class="btnB">
                        <input type="submit" class="btn btn-primary book" name="add_to_cart" value="Add to Cart"required onclick="feed()">
                    </div>
                </div>
            </form>
        </div>

        <div style="clear:both"></div>
        <br />

        <div class="container" style="width:700px;"><!--table box sizes-->
            <h3>Order Details</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
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
                    <?php
                    if(!empty($_SESSION["shopping_cart"])) //carries data over from the order
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
                            <td> <a href="cart.php">Confirm</a></td><!--Displays date from order that has just been made-->
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
                            if (isset($_GET['uniqid'], $_GET['code'])) {// activation code for user to activate
                                if ($stmt = $dbConn->prepare('SELECT * FROM register WHERE uniqid = ? AND activation_code = ?')) {
                                    $stmt->bind_param('ss', $_GET['uniqid'], $_GET['code']);
                                    $stmt->execute();
                                    // Store the result so we can check if the account exists in the database.
                                    $stmt->store_result();
                                    if ($stmt->num_rows > 0) {
                                        // Account exists with the requested email and code.
                                        if ($stmt = $dbConn->prepare('UPDATE register SET activation_code = ? WHERE uniqid= ? AND activation_code = ?')) {
                                            // Set the new activation code to 'activated', this is how we can check if the user has activated their account.
                                            $newcode = 'activated';
                                            $stmt->bind_param('sss', $newcode, $_GET['uniqid'], $_GET['code']);
                                            $stmt->execute();
                                        }
                                    } else {
                                        echo 'The account is already activated or doesn\'t exist!';
                                    }
                                }
                            }
                        }
                        ?>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
</div>
</form>
<br />
</body>
<footer>
    <!--the footer contains closing information the conclude the page-->

    <aside class="top">
        <A HREF="order.php"><img src="image/logo.png" alt="valid"/></A>
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