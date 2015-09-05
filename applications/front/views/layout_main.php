<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Holiday Drop Off</title>
        <link href="<?php echo asset_url() ?>css/style.css" rel="stylesheet" type="text/css" />
        <?php if (controller() != 'our-camps'): ?>
            <script type="text/javascript" src="<?php echo asset_url() ?>js/jquery-1.11.2.min"></script>
            <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
        <?php endif; ?>
        <?php if (controller() == "contact-us"): ?>
            <link rel="stylesheet" href="<?php echo asset_url() ?>css/style2.css" />

            <link rel="stylesheet" href="<?php echo asset_url() ?>css/style3.css" />
            <script src="<?php echo asset_url() ?>js/SpryTabbedPanels.js" type="text/javascript"></script>
            <link href="<?php echo asset_url() ?>css/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo asset_url() ?>css/SpryTabbedPanels2.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo asset_url() ?>css/SpryTabbedPanels3.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo asset_url() ?>css/SpryTabbedPanels4.css" rel="stylesheet" type="text/css" />

        <?php endif; ?>
        <?php if (controller() == "profile"): ?>
            <script src="<?php echo asset_url() ?>js/SpryTabbedPanels.js" type="text/javascript"></script>
            <link href="<?php echo asset_url() ?>css/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo asset_url() ?>css/SpryTabbedPanels2.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo asset_url() ?>css/SpryTabbedPanels3.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo asset_url() ?>css/jquery.ui.css" rel="stylesheet" type="text/css" />
            <script src="<?php echo asset_url() ?>js/jquery.ui.js" type="text/javascript"></script>
            <script src="<?php echo asset_url() ?>js/jquery.ui.datepicker.js" type="text/javascript"></script>
            <script src="<?php echo asset_url() ?>js/profile.js" type="text/javascript"></script>
        <?php endif; ?>
        <?php if (controller() == 'our-camps'): ?>
            <script src="<?php echo asset_url() ?>js/SpryTabbedPanels.js" type="text/javascript"></script>
            <script type="text/javascript" src="<?php echo asset_url() ?>js/jquery_002.js"></script>
            <link href="<?php echo asset_url() ?>css/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="<?php echo asset_url() ?>css/text.css" type="text/css" media="screen">

            <?php endif; ?>
            <script type="text/javascript" src="<?php echo asset_url() ?>js/fadeslideshow.js"></script>
            <?php if (controller() == 'booking'): ?>
                <link href="<?php echo asset_url() ?>css/jquery.ui.css" rel="stylesheet" type="text/css" />
                <script src="<?php echo asset_url() ?>js/jquery.ui.js" type="text/javascript"></script>
                <script src="<?php echo asset_url() ?>js/jquery.ui.datepicker.js" type="text/javascript"></script>
                <script src="<?php echo asset_url() ?>js/SpryTabbedPanels.js" type="text/javascript"></script>
                <script src="<?php echo asset_url() ?>js/booking.js" type="text/javascript"></script>            
                <link href="<?php echo asset_url() ?>css/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo asset_url() ?>css/SpryTabbedPanels2.css" rel="stylesheet" type="text/css" />
            <?php endif; ?>
            <?php if (controller() == 'gallery'): ?>
                <script src="<?php echo asset_url() ?>js/jquery.lightSlider.js" type="text/javascript"></script>
                <script src="<?php echo asset_url() ?>js/colorbox.js" type="text/javascript"></script>
                <script src="<?php echo asset_url() ?>js/jquery.youtubevideogallery.js" type="text/javascript"></script>
                <script src="<?php echo asset_url() ?>js/gallery.js" type="text/javascript"></script>
                <link href="<?php echo asset_url() ?>css/colorbox.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo asset_url() ?>css/lightSlider.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo asset_url() ?>css/youtube-video-gallery.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo asset_url() ?>css/youtube-video-gallery-legacy-ie.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo asset_url() ?>css/SpryTabbedPanels5.css" rel="stylesheet" type="text/css" />
            <?php endif; ?>
    </head>
    <body>
        <div id="wrapper">
            <div id="wrap"  class="page-<?php echo controller(); ?>">
                <div id="page">
                    <!--header-->
                    <div class="header">
                        <div class="logo"><a href="<?php echo base_url() ?>"><img src="<?php echo asset_url() ?>images/logo.png"></a></div>
                        <div class="loginbox">
                            <div class="login">
                                <?php if (isset($user_id)): ?>
                                    <div class="myaccount"><a href="<?php echo base_url() ?>profile">My Account</a></div>
                                    <div class="sigunup"><a href="<?php echo base_url() ?>logout">Sign Out</a></div>
                                <?php else: ?>
                                    <div class="myaccount"><a href="<?php echo base_url() ?>register">Sign Up Now</a></div>
                                    <div class="sigunup"><a href="<?php echo base_url() ?>login">Log In</a></div>
                                <?php endif ?>
                            </div>
                            <div class="mailbox">
                                <div class="envelop"><img src="<?php echo asset_url() ?>images/envelop.png"></div>
                                <div class="mailid"><a href="mailto:Info@holidaydropoff.com">Info@holidaydropoff.com</a></div>
                            </div>
                            <div class="contact">
                                <div class="envelop"><img src="<?php echo asset_url() ?>images/phon-icon.png"></div>
                                <div class="mailid">0203 488 1410</div>
                            </div>
                        </div>
                        <div class="navigation">
                            <ul>
                                <li><a href="<?php echo base_url() ?>" class="home">Home</a></li>
                                <li><a href="<?php echo base_url() ?>about-us" class="about">About Us</a></li>
                                <li><a href="<?php echo base_url() ?>our-camps" class="our-camps">Our Camps</a></li>
                                <li><a href="<?php echo base_url() ?>useful-stuff" class="useful-stuff">Useful Stuff</a></li>
                                <li><a href="<?php echo base_url() ?>prices" class="prices">Prices</a></li>
                                <li><a href="<?php echo base_url() ?>booking" class="bookonline">Book Online</a></li>
                                <li><a href="<?php echo base_url() ?>contact-us" class="contact-us">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--end header-->
                    <div class="menubottomco-<?php echo controller() ?>"></div>
                    <div class="container">
                        <div class="middlepart1">
                            <div class="middleleft">
                                <div class="newslatter">
                                    <div class="newstext1">Newsletters</div>
                                    <div class="newstext2">Enter your e-mail address</div>
                                    <table>
                                        <tr>
                                            <td align="center"><form id="frmMail" name="frmMail" action="<?php echo base_url() ?>newsletter" method="post">
                                                    <input name="newsEmail" id="newsEmail" class="newstext3"   type="text" style="color:#333333;text-decoration:none;" onfocus="if (this.value == 'Enter your e-mail address')
                                                                this.value = ''" onblur="if (this.value == '')
                                                                            this.value = 'Enter your e-mail address'"  value="Enter your e-mail address" />
                                                    <br/>
                                                    <input type="image" src="<?php echo asset_url() ?>images/submit.jpg" name="mail" style="margin-bottom:10px;" id="mail" value="Submit" onclick="return validation(newsEmail);" />
                                                </form></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="nextcamps">

                                    <div class="newstext1">Next Camps</div>
                                    <?php foreach ($campGroups as $item): ?>
                                        <div class="newstext2">
                                            <a style="color: #FFFFFF; text-decoration:none;font-size: 13px;   font-weight: bold;" href="<?php echo base_url() ?>booking/<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                        </div>
                                    <?php endforeach; ?>  
                                </div>
                                <div class="gallery2"> 
                                    <a href="<?php echo base_url() ?>gallery" class="gallery_global_link">
                                        <?php foreach ($galleryPics as $loop => $gallery): ?>
                                            <div class="gallery-img">
                                                <img class="gallery_front_thumb" src="<?php echo base_url() ?>timthumb.php?src=<?php echo asset_url() ?>images/banners/<?php echo $gallery['src'] ?>&w=99&h=66" />
                                            </div>
                                        <?php endforeach; ?>
                                        <div class="gallery-img5">See the latest Holiday Drop Off<br>
                                                photos</div>
                                    </a>
                                </div>
                                <div class="checklist2">
                                    <div class="cheklist-text-hd">HDO Checklist...</div>
                                    <div class="cheklist-text-hd2">
                                        <?php foreach($checklist as $item):?>
                                            <div class="cheklist-offer"><img src="<?php echo asset_url() ?>images/icon.png" /><?php echo $item?></div>
                                        <?php endforeach;?>
                                        <div class="c1"></div>
                                    </div>
                                </div>
                                <div class="c1"></div>
                            </div>
                            <?php echo $content_for_layout; ?>
                        </div>
                        <div class="c1"></div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="c1"></div>
                <div class="main-footer">
                    <div class="footer-news-content">
                        <?php foreach ($news as $loop => $item): ?>
                            <?php if ($loop === 0): ?>
                                <div class="rightpart">
                                    <h2>Latest HDO News</h2>
                                    <ul>
                                    <?php endif; ?>
                                    <?php if ($loop > 2 && $loop === count($news) / 2): ?>
                                    </ul>
                                </div>
                                <div class="middilepart">

                                    <ul>
                                    <?php endif; ?>
                                    <li>
                                        <a href="<?php echo base_url() ?>news/<?php echo $item['slug'] ?>"><?php echo $item['title'] ?></a>
                                    </li>

                                <?php endforeach; ?>
                                <?php if ($news_count > 5): ?>
                                    <li>
                                        <a href="<?php echo base_url() ?>news">More News</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="footer-text-part3">
                            <h2>Join Us on Facebook</h2>
                            <p> See all the latest Holiday Drop Off photos on our Facebook page
                            </p>
                            <div class="like-icon"> <a href="http://www.facebook.com/HolidayDropOff" target="_blank"><img src="<?php echo asset_url() ?>images/like-icon.png"></a><a href="http://www.facebook.com/HolidayDropOff" target="_blank"><img src="<?php echo asset_url() ?>images/facebook-icon.png"></a> </div>
                        </div>
                        <div class="c1"></div>
                    </div>
                    <div class="c1"></div>
                    <div class="footertext">
                        <a href="<?php echo base_url() ?>terms-and-conditions">Terms and conditions</a> | <a href="<?php echo base_url() ?>privacy-policy">Privacy Policy</a> | <a href="<?php echo base_url() ?>contact-us">Contact Us</a> | <a href="<?php echo base_url() ?>sitemap">Site Map</a> | <a href="<?php echo base_url() ?>work-for-us">Work for Us</a>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            /*  checks the validity of an email address entered 
             *   returns true or false 
             */
            function validateEmail(email)
            {
                var splitted = email.match("^(.+)@(.+)$");
                if (splitted == null)
                    return false;
                if (splitted[1] != null)
                {
                    var regexp_user = /^\"?[\w-_\.]*\"?$/;
                    if (splitted[1].match(regexp_user) == null)
                        return false;
                }
                if (splitted[2] != null)
                {
                    var regexp_domain = /^[\w-\.]*\.[A-Za-z]{2,4}$/;
                    if (splitted[2].match(regexp_domain) == null)
                    {
                        var regexp_ip = /^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
                        if (splitted[2].match(regexp_ip) == null)
                            return false;
                    } // if
                    return true;
                }
                return false;
            }
        </script>
    </body>
</html>
