
<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="300lo.json"></script>
    <script type="text/javascript" src="_ate.config_resp"></script>
    <title>Fit Point a Sports Category Flat Bootstrap Responsive Web Template| Home :: w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="og:title" content="Vide">
    <meta name="keywords" content="Fit Point Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- Custom Theme files -->
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="css/header-inner.css" rel="stylesheet" type="text/css">
    <!-- js -->
    <script src="js/jquery-1.js"></script>
    <!-- //js -->
    <!-- Custom Theme files -->
    <!--webfont-->
    <link href="css/css_002.css" rel="stylesheet" type="text/css">
    <link href="css/css.css" rel="stylesheet" type="text/css">
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
	<link type="text/css" src="css/smooth-scroll.css" rel="stylesheet" >
</head>

<body>
    <div data-vide-bg="video/training" style="position: relative;">
        
        <div class="center-container">
            <div class="container">
                <div class="navigation">
                    <div class="logo">
                        <h1>
                            <a class="navbar-brand link link--yaku" href="/"><span>X</span><span>Y</span><span>Z</span></a>
                        </h1>
                    </div>
                    <div class="top-nav">
                        <span class="menu"><img src="/images/menu.png" alt=" "></span>
                        <ul class="nav1 nav nav-wil cl-effect-11" id="cl-effect-11">
                            <li><a class="" data-hover="HOME" href="/">HOME <span class="sr-only">(current)</span></a></li>
                            <?php
                                if(!isset($_SESSION['email'])) {
                            ?>
                            <li><a data-hover="Login" href="index.php?option=login">Login</a></li>
                            <li><a href="index.php?option=signup">Sign up</a></li>
                            <?php } else { ?>
                                <li><a data-hover="Dashboard" href="index.php?option=dashboard">Dashboard</a></li>
                                <li><a data-hover="Logout" href="index.php?option=logout">Logout</a></li>
                            <?php }
                            ?>
                        </ul>
                        <!-- script-for-menu -->
                        <script>
                            $("span.menu").click(function() {
                                $("ul.nav1").slideToggle(300, function() {
                                    // Animation complete.
                                });
                            });
                        </script>
                        <!-- /script-for-menu -->
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="socials">
                    <script type="text/javascript" src="/js/addthis_widget.js"></script>
                </div>
                
            </div>
        </div>
    </div>
    <div style="visibility: hidden; height: 1px; width: 1px; position: absolute; top: -9999px; z-index: 100000;" id="_atssh"><iframe id="_atssh984" title="AddThis utility frame" style="height: 1px; width: 1px; position: absolute; top: 0px; z-index: 100000; border: 0px none; left: 0px;" src="text/sh.htm"></iframe></div>
    <style id="service-icons-0"></style>

    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')
    </script>
    <script src="/js/jquery.js"></script>