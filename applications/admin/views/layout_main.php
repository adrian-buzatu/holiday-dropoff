
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
        <?php if(in_array(controller(), array('pages', 'news', 'testimonials', 'emails'))):?>
            <script src="<?php echo asset_url();?>js/nicEdit.js" type="text/javascript"></script>
        <?php endif;?>
    </head>
    <body id="<?php echo controller();?>" rel="<?php echo asset_url()?>" base-url="<?php echo base_url()?>">
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
                                        <li><a class="<?php echo item() == 'home' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/home">Home</a></li>
                                        <li><a class="<?php echo controller() == 'flyer' ? 'active' : '';?>" href="<?php echo base_url()?>flyer">Download Our HDO E-Flyer</a></li>
                                        <li><a class="<?php echo item() == 'about-us' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/about-us">About US</a></li>
                                        <li><a class="<?php echo item() == 'useful-stuff' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/useful-stuff">Useful Stuff</a></li>
                                        <li><a class="<?php echo item() == 'privacy-policy' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/privacy-policy">Privacy Policy</a></li>
                                        <li><a class="<?php echo item() == 'terms-and-conditions' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/terms-and-conditions">Terms and conditions</a></li>
                                        <li><a class="<?php echo item() == 'work-for-us' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/work-for-us">Work for Us</a></li>
                                        <li><a class="<?php echo item() == 'holyay-drop-off-camps' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/holyay-drop-off-camps">Holiday Drop Off Camps</a></li>
                                        <li><a class="<?php echo item() == 'sitemap' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/sitemap">Sitemap</a></li>
                                        <li><a class="<?php echo item() == 'prices' ? 'active' : '';?>" href="<?php echo base_url()?>pages/edit/prices">Prices</a></li>
                                        <li><a class="<?php echo controller() == 'news' ? 'active' : '';?>" href="<?php echo base_url()?>news">News</a></li>
                                        <div class="top_heading_red">Email Templates</div>
                                        <li><a class="<?php echo item() == 'registration-to-user' ? 'active' : '';?>" href="<?php echo base_url()?>emails/edit/registration-to-user">Registration Mail(User)</a></li>
                                        <li><a class="<?php echo item() == 'registration-to-admin' ? 'active' : '';?>" href="<?php echo base_url()?>emails/edit/registration-to-admin">Registration Mail(Admin)</a></li>
                                        <li><a class="<?php echo item() == 'sign-up' ? 'active' : '';?>" href="<?php echo base_url()?>emails/edit/sign-up">Sign Up Mail</a></li>
                                        <li><a class="<?php echo item() == 'forgot-pass' ? 'active' : '';?>" href="<?php echo base_url()?>emails/edit/forgot-pass">Password Recovery Mail</a></li>
                                        <div class="top_heading_red">Misc</div>
                                        <li><a class="<?php echo controller() == 'banners' ? 'active' : '';?>" href="<?php echo base_url()?>banners">Home Banners</a></li>
                                        <li><a class="<?php echo controller() == 'checklist' ? 'active' : '';?>" href="<?php echo base_url()?>checklist">Checklist</a></li>
                                        <li><a class="<?php echo controller() == 'gallerycategories' ? 'active' : '';?>" href="<?php echo base_url()?>gallerycategories">Gallery Categories</a></li>
                                        <li><a class="<?php echo controller() == 'gallery' ? 'active' : '';?>" href="<?php echo base_url()?>gallery">My Photos</a></li>
                                        <li><a class="<?php echo controller() == 'videos' ? 'active' : '';?>" href="<?php echo base_url()?>videos">My Video</a></li>
                                        <li><a class="<?php echo controller() == 'order' ? 'active' : '';?>" href="<?php echo base_url()?>order">Order</a></li>
                                        <li><a href="<?php echo base_url()?>coupons" class="<?php echo controller() == 'coupons' ? 'active' : '';?>">Coupon</a></li>
                                        <li><a class="<?php echo controller() == 'newsletter' ? 'active' : '';?>" href="<?php echo base_url()?>newsletter">Newsletter</a></li>
                                        <li><a class="<?php echo controller() == 'testimonials' ? 'active' : '';?>" href="<?php echo base_url()?>testimonials">Testimonial</a></li>              
                                        <li><a class="<?php echo controller() == 'users' ? 'active' : '';?>" href="<?php echo base_url()?>users">Users</a></li>
                                        <li><a class="<?php echo controller() == 'csv' ? 'active' : '';?>" href="<?php echo base_url()?>csv">Download CSV</a></li>
                                        <li><a class="<?php echo controller() == 'report' ? 'active' : '';?>" href="<?php echo base_url()?>report">Report</a></li>
                                        <li><a class="<?php echo controller() == 'companyaddress' ? 'active' : '';?>" href="<?php echo base_url()?>companyaddress">Change Company Address</a></li>
                                        <li><a class="<?php echo controller() == 'notificationemail' ? 'active' : '';?>" href="<?php echo base_url()?>notificationemail">Change Admin Notification Email</a></li>
                                        <li><a class="<?php echo controller() == 'account' ? 'active' : '';?>" href="<?php echo base_url()?>account/change_password">Change Password</a></li>
                                        <li><a href="<?php echo base_url()?>logout">Logout</a></li>
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