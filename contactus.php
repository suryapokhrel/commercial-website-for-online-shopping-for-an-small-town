<?php
    if(isset($_POST["submit"])){
        $success = "";
        $error = "";

        $to_email="chffreshsales@gmail.com";
        $subject="Contact Us Page Message";
        $body=$_POST["message"] . "\n\n" . $_POST["name"] . "\n" . $_POST["email"] . "\n" . $_POST["phone"];
        $headers="From: chffreshsales@gmail.com";

        if(mail($to_email,$subject,$body,$headers)){
            $success = "Mail Sent!";
        }
        else{
            $error = "Unable to send message!";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'?>
    <link rel="stylesheet" href="static/CSS/contact.css">
    <title>Contact US</title>
</head>
<!-- Contact form -->
<body>
    <?php include "header.php"; ?>
    <!-- animation banner  -->
    <div class="box2">
                <h1 class="ml5">
                    <span class="text-wrapper">
                        <!-- <span class="line line1"></span> -->
                        <span class="letters letters-left">Order</span>
                        <!-- <span class="letters ampersand">&amp;</span> -->
                        <span class="letters letters-right">Convienece</span>
                        <!-- <span class="line line2"></span> -->
                    </span>
                </h1>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
            </div>
    <div class="grid-container">
        <div class="grid-item1">
            <div class="background">
                <div class="container3">
                    <div class="screen">
                        <div class="screen-header">
                            <div class="screen-header-left">
                                <div class="screen-header-button close"></div>
                                <div class="screen-header-button maximize"></div>
                                <div class="screen-header-button minimize"></div>
                            </div>
                            <div class="screen-header-right">
                                <div class="screen-header-ellipsis"></div>
                                <div class="screen-header-ellipsis"></div>
                                <div class="screen-header-ellipsis"></div>
                            </div>
                        </div>
                        <div class="screen-body">
                            <div class="screen-body-item left">
                                <div class="app-title">
                                    <span>CONTACT</span>
                                    <span>US</span>
                                </div>
                                <div class="app-contact">CONTACT INFO : +44 7911 123456</div>
                            </div>
                            <div class="screen-body-item">
                                <form action="" method="POST">
                                    <div class="app-form">
                                        <div class="app-form-group">
                                            <input class="app-form-control" placeholder="NAME" name="name">
                                        </div>
                                        <div class="app-form-group">
                                            <input class="app-form-control" placeholder="EMAIL" name="email">
                                        </div>
                                        <div class="app-form-group">
                                            <input class="app-form-control" placeholder="CONTACT NO" name="phone">
                                        </div>
                                        <div class="app-form-group message">
                                            <input class="app-form-control" placeholder="MESSAGE" name="message">
                                        </div>
                                        <div class="app-form-group buttons">
                                            <button class="app-form-button">CANCEL</button>
                                            <button class="app-form-button" name="submit">SEND</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            anime.timeline({ loop: true })
                .add({
                    targets: '.ml5 .line',
                    opacity: [0.5, 1],
                    scaleX: [0, 1],
                    easing: "easeInOutExpo",
                    duration: 700
                }).add({
                    targets: '.ml5 .line',
                    duration: 600,
                    easing: "easeOutExpo",
                    translateY: (el, i) => (-0.625 + 0.625 * 2 * i) + "em"
                }).add({
                    targets: '.ml5 .ampersand',
                    opacity: [0, 1],
                    scaleY: [0.5, 1],
                    easing: "easeOutExpo",
                    duration: 600,
                    offset: '-=600'
                }).add({
                    targets: '.ml5 .letters-left',
                    opacity: [0, 1],
                    translateX: ["0.5em", 0],
                    easing: "easeOutExpo",
                    duration: 600,
                    offset: '-=300'
                }).add({
                    targets: '.ml5 .letters-right',
                    opacity: [0, 1],
                    translateX: ["-0.5em", 0],
                    easing: "easeOutExpo",
                    duration: 600,
                    offset: '-=600'
                }).add({
                    targets: '.ml5',
                    opacity: 0,
                    duration: 1000,
                    easing: "easeOutExpo",
                    delay: 1000
                });
        </script>
        <!-- Map -->
        <div class="grid-item">
            <div class="box">
                <div class="map-wrapper">
                    <iframe class="container"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d604101.5879252531!2d-2.2464526458440353!3d53.74013848133418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48791339c06b18f1%3A0x6517b5a23c63c194!2sWest%20Yorkshire%2C%20UK!5e0!3m2!1sen!2snp!4v1650703805626!5m2!1sen!2snp"
                        width="360" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" width="60" height="380" style="border:0;"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>