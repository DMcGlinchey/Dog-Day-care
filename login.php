<?php

?>
<!--This page is the same as the login page but display a confirmation message. It will only appear after creating an account-->

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
            <a href="login.html" class="active">Login</a>
            <a href="contact.html">Contact</a>
            <a href="service.html">Services</a>
            <a href="about.html">About</a>
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
<P>You have successfully registered an account with us. An email has been sent to you for confirmation.</p>
<div class="login">
    <div class="log">
        <h1>Login</h1>
        <form action="authorise.php" method="post">
            <label for="username">
            </label>
            <input type="text" name="username" placeholder="Username" id="username" required>
            <label for="password"></label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <input type="submit" value="login">
            <p><a href="sign_up.html">New User Register!</a></p>
        </form>
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
'Please check your email to activate your account!'