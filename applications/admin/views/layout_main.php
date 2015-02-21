
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Holiday Drop Off Camps - Admin Panel</title>
        <!--<link href="stylesheet.css" type="text/css" rel="stylesheet" />-->
        <link href="<?php echo asset_url()?>css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset_url()?>css/styles.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset_url()?>css/jquery.ui.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo asset_url();?>js/jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="<?php echo asset_url();?>js/jquery.ui.js" type="text/javascript"></script>
        <script src="<?php echo asset_url();?>js/main.js" type="text/javascript"></script>
        <?php if(controller() == 'pages'):?>
            <script src="<?php echo asset_url();?>js/nicEdit.js" type="text/javascript"></script>
        <?php endif;?>
    </head>
    <body id="<?php echo controller();?>" rel="<?php echo asset_url()?>">
        <div id="wrapper">
            <div id="wrap">
                <div id="page"><div class="logo"><img src="<?php echo asset_url()?>images/logo.png" alt="" /></div>

                    <div id="home">
                        <div class="content">
                            <div class="content_left">
                                <div class="menutop">
                                    <ul class="mainmenu">
                                        <div class="top_heading_red">Our Camps</div>
                                        <li><a class="<?php echo controller() == 'campgroups' ? 'active' : '';?>"  href="<?php echo base_url()?>campgroups">Camp Groups</a></li>
                                        <li><a class="<?php echo controller() == 'camps' ? 'active' : '';?>"  href="<?php echo base_url()?>camps">Camps</a></li>
                                        <li><a class="<?php echo item() == 'what-happens' ? 'active' : '';?>"  href="<?php echo base_url()?>pages/edit/what-happens">What happens</a></li>
                                        <li><a class="<?php echo item() == 'sports-at-hdo' ? 'active' : '';?>"  href="<?php echo base_url()?>pages/edit/sports-at-hdo">Sports at HDO</a></li>
                                        <li><a class="<?php echo item() == 'facilities' ? 'active' : '';?>"  href="<?php echo base_url()?>pages/edit/facilities">Facilities</a></li>
                                        <li><a class="<?php echo item() == 'camp-dates' ? 'active' : '';?>"  href="<?php echo base_url()?>pages/edit/camp-dates">Camp Dates</a></li>
                                        <li><a class="<?php echo item() == 'staff-at-hdo' ? 'active' : '';?>"  href="<?php echo base_url()?>pages/edit/staff-at-hdo">Staff at HDO</a></li>
                                        <li><a class="<?php echo item() == 'work-for-us' ? 'active' : '';?>"  href="<?php echo base_url()?>pages/edit/work-for-us">Work For Us</a></li>
                                        <div class="top_heading_red">Pages</div>
                                        <li><a class="<?php echo controller() == '' ? 'active' : '';?>" href="<?php echo base_url()?>">Home</a></li>
                                        <li><a class="<?php echo controller() == 'flyer' ? 'active' : '';?>" href="<?php echo base_url()?>flyer">Download Our HDO E-Flyer</a></li>
                                        <li><a class="<?php echo item() == 'about-us' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/about-us">About US</a></li>
                                        <li><a class="<?php echo item() == 'useful-stuff' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/useful-stuff">Useful Stuff</a></li>
                                        <li><a class="<?php echo item() == 'privacy-policy' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/privacy-policy">Privacy Policy</a></li>
                                        <li><a class="<?php echo item() == 'terms-and-conditions' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/terms-and-conditions">Terms and conditions</a></li>
                                        <li><a class="<?php echo item() == 'work-for-us' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/work-for-us">Work for Us</a></li>
                                        <li><a class="<?php echo item() == 'holyay-drop-off-camps' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/holyay-drop-off-camps">Holiday Drop Off Camps</a></li>
                                        <li><a class="<?php echo item() == 'sitemap' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/sitemap">Sitemap</a></li>
                                        <li><a class="" href="<?php echo base_url()?>pages/edit/privacy-policy">Prices</a></li>
                                        <li><a class="" href="#">News</a></li>
                                        <div class="top_heading_red">Misc</div>
                                        <li><a class="" href="#">Home Banners</a></li>
                                        <li><a class="" href="#">Gallery Categories</a></li>
                                        <li><a class="" href="#">My Photos</a></li>
                                        <li><a class="" href="#">My Video</a></li>
                                        <li><a class="" href="#">Order</a></li>
                                        <li><a class="" href="#">Coupon</a></li>
                                        <li><a class="" href="#">Testimonial</a></li>              
                                        <li><a class="" href="#">Users</a></li>
                                        <li><a class="" href="#">Download CSV</a></li>
                                        <li><a href="#">Change Password</a></li>
                                        <li><a href="#">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content_right">

                                <?php echo $content_for_layout;?>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div> 
                </div></div></div>
        <div class="footer">Copyright Holiday Drop Off</div>
    </body>
</html>