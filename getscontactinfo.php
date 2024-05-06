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
            <a href="login.html">Login</a>
            <a href="contact.html" class="active">Contact</a>
            <a href="service.html" >Services</a>
            <a href="about.html" >About</a>
            <a href="index.html" >Home</a>
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

    <section>
        <div class="slideshow-container">
            <img class="mySlides" src="image/huskey.png" alt="valid"/>
            <img class="mySlides" src="image/dog1.png" alt="valid"/>
            <img class="mySlides" src="image/huskey.png" alt="valid"/>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>

        <div class="dot-container">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                if (n > slides.length) {slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
            }
        </script>
    </section>
</header>
<body>

<main class="contact">

    <article id="contact">
        <!-- the article is used to store text, images and headers-->
        <h2> Contact US</h2>

        <p>
            Thank you for viewing the site and reading over some of our experiences. I hope you were able to explore the site
            entirely and enjoy what has been displayed. Any issues that may of occurred, please leave us a message, so that we can improve your
            experience.
        </p>

<?php

//<!-- these are the subject that will be used on the contact form -->

$to         ="djm300697@gmail.com";// this is the email which the user content will be sent to
$subject    = "Service feedback";
$forename   = $_REQUEST['forename'];
$surname    = $_REQUEST['surname'];
$email      = $_REQUEST['email'];
$number1       = $_REQUEST['number1'];
$question   = $_REQUEST['question'];

$feedback   = $_REQUEST['feedback'];


if (empty($surname)){
    echo "you didn't give me a surname";
}

else {
    echo "thank you $surname";
}

mail($to, $subject, "Thank You $forename $surname $email $number1 your question type was $question Thank you for your response $feedback feel free to responed again" );
//<!-- this is what send off the information to the does email address -->


$output = "";

$output .= "<p>Hello $forename $surname";
$output .= "<p>Thank you for your question about $question <br/> and your feedback on $feedback</p>";
$output .= "<p>I will e-mail you my response soon.</p>";

//<!-- the output is what will appear once you have sent it-->
echo $output;
?>
    </article>

    <div class="booking-contact-box">
        <form id="con" id="studentinfo" method="get" action="getscontactinfo.php" onsubmit="return checkform()">
            <!-- This is used to find the php page-->
            <fieldset>
                <div class="booking-form">
                    <label>Forename</label>
                    <input type="text" class="form-control" placeholder="Name" name="forename" required>

                    <label>Surname</label>
                    <input type="text" class="form-control" placeholder="Name" name="surname" required>

                    <label>Email Address</label>
                    <input type="text" class="form-control" placeholder="Email Address" name="email" required>

                    <label>Phone Number</label>
                    <input type="number" class="form-control" placeholder="Phone Number" name="number1" required>

                    <label>Issues</label>
                    <select class="custom-select" name="question" required>
                        <option value="">Select</option>
                        <option value="booking">Booking</option>
                        <option value="service">Services</option>
                        <option value="other">Other</option>
                        option value="yes">no</option>
                    </select>
                </div>

                <label> Would you like to leave a comment/question?
                    <textarea rows="4" cols="50" name="feedback" placeholder="Please enter a comment"></textarea></label>
                <!-- This label is just a text box allowing you to put you option in-->

                <div class="btnB">
                    <input type="submit" class="btn btn-primary book" name="save" value="Send"required onclick="feed()">
                </div>
                <!-- This a button that allows you to comfirm the option and send it-->
            </fieldset>
        </form>
    </div>


    <script type="text/javascript">
        //<![CDATA[
        function checkform() {
            "use strict";
            var theform = document.getElementById('studentinfo');
            <!-- This confirms the document for php-->

            if (theform.surname.value == "") {
                alert("Sorry, you need to enter your surname");
                theform.surname.focus();
                return false;
            }
            <!-- This shows an error message if you fail to but in you surname-->
            if (theform.forename.value == "") {
                alert("Sorry, you need to enter your forename");
                theform.forename.focus();
                return false;
            }

            if (theform.email.value == "") {
                alert("Sorry, you need to enter your forename");
                theform.email.focus();
                return false;
            }

            if (theform.number1.value == "") {
                alert("Sorry, you need to enter your forename");
                theform.number1.focus();
                return false;
            }

            <!-- This shows an error message if you fail to but in you forename-->
            if (theform.question.selectedIndex == 0) {
                alert("you must choose an occupation");
                theform.question.focus();
                return false;
            }

            return true;
        }
    </script>

</main>
</body>

<div class="follow"><h4>Follow us on:</h4></div>
<div class="social_box">
    <A HREF=""><img src="image/facebook.png" class = "icons" alt="valid"/></A>
    <A HREF=""><img src="image/instagram.png" class = "icons" alt="valid"/></A>
    <A HREF=""><img src="image/twitter.png" class = "icons" alt="valid"/></A>
</div>


<style></style>
</body>
<footer>
    <!--the footer contains closing information the conclude the page-->

    <aside class="top">
        <A HREF="contact.html"><img src="image/logo.png" alt="valid"/></A>
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

</body>
</html>