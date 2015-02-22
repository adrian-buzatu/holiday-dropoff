
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Holiday Drop Off</title>
        <link href="<?php echo asset_url()?>css//style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo asset_url()?>js/jquery-1.11.2.min"></script>
        <script type="text/javascript" src="<?php echo asset_url()?>js/fadeslideshow.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="wrap">
                <div id="page">

                    <div class="header">
                        <div class="logo"><a href="<?php echo base_url()?>"><img src="<?php echo asset_url()?>images/logo.png"></a></div>
                        <div class="loginbox">
                            <div class="login">
                                <!-- <font class="welcomemsg">Welcome, <b></b></font>-->
                                <div class="myaccount"><a href="mydetails.php">My Account</a></div>
                                <div class="sigunup"><a href="logout.php">Sign Out</a></div>
                            </div>
                            <div class="mailbox">
                                <div class="envelop"><img src="<?php echo asset_url()?>images/envelop.png"></div>
                                <div class="mailid"><a href="mailto:Info@holidaydropoff.com">Info@holidaydropoff.com</a></div>
                            </div>
                            <div class="contact">
                                <div class="envelop"><img src="<?php echo asset_url()?>images/phon-icon.png"></div>
                                <div class="mailid">07944 485 552</div>
                            </div>
                        </div>
                        <div class="navigation">
                            <ul>
                                <li><a href="index.php" class="home">Home</a></li>
                                <li><a href="about-us.php" class="about">About Us</a></li>
                                <li><a href="ourcampus.php" class="our-camps">Our Camps</a></li>
                                <li><a href="useful-stuff.php" class="useful-stuff">Useful Stuff</a></li>
                                <li><a href="prices.php" class="prices">Prices</a></li>
                                <li><a href="book-online.php" class="bookonline">Book Online</a></li>
                                <li><a href="contactus.php" class="contact-us">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="menubottomco1"></div>
                    <div class="container">
                        <?php echo $content_for_layout;?>
                    </div>
                    <div class="c1"></div>
                </div>
                <div class="footer">
                    <div class="c1"></div>
                    <div class="main-footer">
                        <div class="footer-news-content">
                            <div class="rightpart">
                                <h2>Latest HDO News</h2>
                                <ul>
                                    <li><a href="news.php?newsID=2">Parents Feedback</a></li><li><a href="news.php?newsID=15">FAQs</a></li><li><a href="news.php?newsID=20">What to bring</a></li>      </ul>
                            </div>
                            <div class="middilepart">
                                <ul>
                                    <li><a href="news.php?newsID=17">Discounts + Pricing</a></li><li><a href="news.php?newsID=27">Press releases</a></li><li><a href="news.php?newsID=26">New Sports</a></li>      </ul>
                            </div>
                            <div class="footer-text-part3">
                                <h2>Join Us on Facebook</h2>
                                <p> See all the latest Holiday Drop Off photos on our Facebook page
                                </p>
                                <div class="like-icon"> <a href="http://www.facebook.com/HolidayDropOff" target="_blank"><img src="<?php echo asset_url()?>images/like-icon.png"></a><a href="http://www.facebook.com/HolidayDropOff" target="_blank"><img src="<?php echo asset_url()?>images/facebook-icon.png"></a> </div>
                            </div>
                            <div class="c1"></div>
                        </div>
                        <div class="c1"></div>
                        <div class="footertext"><a href="termcondition.php">Terms and conditions</a> | <a href="privacy.php">Privacy Policy</a> | <a href="contactus.php">Contact Us</a> | <a href="contactus.php">Site Map</a> | <a href="workforus.php">Work for Us</a></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
