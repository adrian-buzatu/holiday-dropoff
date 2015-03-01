
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Holiday Drop Off</title>
        <link href="<?php echo asset_url()?>css/style.css" rel="stylesheet" type="text/css" />
        <?php if(controller() != 'our-camps'):?>
        <script type="text/javascript" src="<?php echo asset_url()?>js/jquery-1.11.2.min"></script>
        <?php endif;?>
        <?php if(controller() == "contact-us"):?>
            <link rel="stylesheet" href="<?php echo asset_url()?>css/style2.css" />

            <link rel="stylesheet" href="<?php echo asset_url()?>css/style3.css" />
            <script src="<?php echo asset_url()?>js/SpryTabbedPanels.js" type="text/javascript"></script>
            <link href="<?php echo asset_url()?>css/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo asset_url()?>css/SpryTabbedPanels2.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo asset_url()?>css/SpryTabbedPanels3.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo asset_url()?>css/SpryTabbedPanels4.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript">
                function valid(event)
                {   
                    var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                    //alert("h");
                    if(document.frmPage.name.value == "")
                    {
                        alert("Please Enter Name");
                        document.getElementById('name').focus();
                        return false;	
                    }


                    if(document.frmPage.email.value.length < 1)
                    {
                        alert("You cannot leave the Email Field Empty");
                        document.getElementById('email').focus();
                        return false;	
                    }
                    if(!regex.test(document.frmPage['email'].value))
                    {
                        alert("Invalid email address format");
                        document.getElementById('email').focus();	
                        return false;
                    }
                    if(document.frmPage.subject.value == "")
                    {
                        alert("Please Enter Subject");
                        document.getElementById('subject').focus();
                        return false;	
                    }
                    if(document.frmPage.msg.value == "")
                    {
                        alert("Please Enter Message");
                        document.getElementById('msg').focus();	
                        return false;	
                    }
                    var $ = jQuery.noConflict();
                    event.preventDefault();
                    $.ajax({
                        url: "<?php echo base_url()?>contact-us/process",
                        method: 'POST',
                        dataType: "json",
                        data: "subject=" + $("#subject").val()+ "&email=" + $("#email").val() + "&msg=" + $("#msg").val() + "&name=" + $("#name").val(),
                        success: function(){
                            $("#frmPage").fadeOut('slow', function(){
                                $("#contactSuccessMsg").height($("#frmPage").outer)
                                $("#contactSuccessMsg").fadeIn('slow', function(){
                                    setTimeout(function(){
                                        $("#contactSuccessMsg").fadeOut('slow', function(){
                                            $("#frmPage").fadeIn();
                                        });
                                    }, 3000);
                                });
                            });
                            
                        }
                    });

                } 
            </script>
        <?php endif;?>
        <?php if(controller() == 'our-camps'):?>
            <script src="<?php echo asset_url()?>js/SpryTabbedPanels.js" type="text/javascript"></script>
            <script type="text/javascript" src="<?php echo asset_url()?>js/jquery_002.js"></script>
            <link href="<?php echo asset_url()?>css/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="<?php echo asset_url()?>css/text.css" type="text/css" media="screen">
            <script type="text/javascript">
                var $ = jQuery.noConflict();
                $(function() {
                    //caching
                    //next and prev buttons
                    if (typeof $ == 'undefined') $ = jQuery.noConflict();
                    var $cn_next	= $('#cn_next');
                    var $cn_prev	= $('#cn_prev');
                    //wrapper of the left items
                    var $cn_list 	= $('#cn_list');
                    var $pages		= $cn_list.find('.cn_page');
                    //how many pages
                    var cnt_pages	= $pages.length;
                    //the default page is the first one
                    var page		= 1;
                    //list of news (left items)
                    var $items 		= $cn_list.find('.cn_item');
                    //the current item being viewed (right side)
                    var $cn_preview = $('#cn_preview');
                    //index of the item being viewed. 
                    //the default is the first one
                    var current		= 1;

                    /*
                    for each item we store its index relative to all the document.
                    we bind a click event that slides up or down the current item
                    and slides up or down the clicked one. 
                    Moving up or down will depend if the clicked item is after or
                    before the current one
                    */
                    $items.each(function(i) {
                        var $item = $(this);
                        $item.data('idx', i + 1);

                        $item.bind('click', function() {
                            var $this = $(this);
                            $cn_list.find('.selected').removeClass('selected');
                            $this.addClass('selected');
                            var idx = $(this).data('idx');
                            var $current = $cn_preview.find('.cn_content:nth-child(' + current + ')');
                            var $next = $cn_preview.find('.cn_content:nth-child(' + idx + ')');

                            if (idx > current) {
                                $current.stop().animate({'top': '-300px'}, 600, 'easeOutBack', function() {
                                    $(this).css({'top': '310px'});
                                });
                                $next.css({'top': '310px'}).stop().animate({'top': '5px'}, 600, 'easeOutBack');
                            }
                            else if (idx < current) {
                                $current.stop().animate({'top': '310px'}, 600, 'easeOutBack', function() {
                                    $(this).css({'top': '310px'});
                                });
                                $next.css({'top': '-300px'}).stop().animate({'top': '5px'}, 600, 'easeOutBack');
                            }
                            current = idx;
                        });
                    });

                    /*
                     shows next page if exists:
                     the next page fades in
                     also checks if the button should get disabled
                     */
                    $cn_next.bind('click', function(e) {
                        var $this = $(this);
                        $cn_prev.removeClass('disabled');
                        ++page;
                        if (page == cnt_pages)
                            $this.addClass('disabled');
                        if (page > cnt_pages) {
                            page = cnt_pages;
                            return;
                        }
                        $pages.hide();
                        $cn_list.find('.cn_page:nth-child(' + page + ')').fadeIn();
                        e.preventDefault();
                    });
                    /*
                     shows previous page if exists:
                     the previous page fades in
                     also checks if the button should get disabled
                     */
                    $cn_prev.bind('click', function(e) {
                        var $this = $(this);
                        $cn_next.removeClass('disabled');
                        --page;
                        if (page == 1)
                            $this.addClass('disabled');
                        if (page < 1) {
                            page = 1;
                            return;
                        }
                        $pages.hide();
                        $cn_list.find('.cn_page:nth-child(' + page + ')').fadeIn();
                        e.preventDefault();
                    });

                });
            </script>
        <?php endif;?>
        <script type="text/javascript" src="<?php echo asset_url()?>js/fadeslideshow.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="wrap">
                <div id="page">
                    <!--header-->
                        <div class="header">
                            <div class="logo"><a href="<?php echo base_url()?>"><img src="<?php echo asset_url()?>images/logo.png"></a></div>
                            <div class="loginbox">
                                <div class="login">
                                    <!-- <font class="welcomemsg">Welcome, <b></b></font>-->
                                    <div class="myaccount"><a href="mydetails.php">My Account</a></div>
                                    <div class="sigunup"><a href="<?php echo base_url()?>logout">Sign Out</a></div>
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
                                    <li><a href="<?php echo base_url()?>" class="home">Home</a></li>
                                    <li><a href="<?php echo base_url()?>about-us" class="about">About Us</a></li>
                                    <li><a href="<?php echo base_url()?>our-camps" class="our-camps">Our Camps</a></li>
                                    <li><a href="<?php echo base_url()?>useful-stuff" class="useful-stuff">Useful Stuff</a></li>
                                    <li><a href="<?php echo base_url()?>prices" class="prices">Prices</a></li>
                                    <li><a href="book-online.php" class="bookonline">Book Online</a></li>
                                    <li><a href="<?php echo base_url()?>contact-us" class="contact-us">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    <!--end header-->
                    <div class="menubottomco1"></div>
                    <div class="container">
                        <div class="middlepart1">
                            <div class="middleleft">
                                <div class="newslatter">
                                    <div class="newstext1">Newsletters</div>
                                    <div class="newstext2">Enter your e-mail address</div>
                                    <table>
                                        <tr>
                                            <td align="center"><form id="frmMail" name="frmMail" method="post">
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
                                    <?php foreach($campGroups as $item):?>
                                        <div class="newstext2">
                                            <a style="color: #FFFFFF; text-decoration:none;font-size: 13px;   font-weight: bold;" href="#book-online/<?php echo $item['id']?>"><?php echo $item['name']?></a>
                                        </div>
                                    <?php endforeach;?>  
                                </div>
                                <div class="gallery2"> 
                                    <a href="photogallery.php">
                                        <?php foreach($galleryPics as $loop => $gallery):?>
                                        <div class="gallery-img<?php echo $loop < 4 ? ($loop % 4) + 1 : 4;?>">
                                            <img width="66" height="66" src="<?php echo asset_url() ?>images/banners/<?php echo $gallery['src']?>" />
                                        </div>
                                        <?php endforeach;?>
                                        <div class="gallery-img5">See the latest Holiday Drop Off<br>
                                        photos</div>
                                    </a>
                                </div>
                                <div class="checklist2">
                                    <div class="cheklist-text-hd">HDO Checklist...</div>
                                    <div class="cheklist-text-hd2">
                                        <div class="cheklist-offer"><img src="<?php echo asset_url() ?>images/icon.png" />Packed Lunch</div>
                                        <div class="cheklist-offer"><img src="<?php echo asset_url() ?>images/icon.png" />Swimming Kit</div>
                                        <div class="cheklist-offer"><img src="<?php echo asset_url() ?>images/icon.png" />Clothing</div>
                                        <div class="cheklist-offer"><img src="<?php echo asset_url() ?>images/icon.png" />Medical Equipment</div>
                                        <div class="cheklist-offer"><img src="<?php echo asset_url() ?>images/icon.png" />Application Form</div>
                                        <div class="c1"></div>
                                    </div>
                                </div>
                                <div class="c1"></div>
                            </div>
                            <?php echo $content_for_layout;?>
                        </div>
                    <div class="c1"></div>
                </div>
                </div>
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
                            <div class="like-icon"> <a href="http://www.facebook.com/HolidayDropOff" target="_blank"><img src="<?php echo asset_url() ?>images/like-icon.png"></a><a href="http://www.facebook.com/HolidayDropOff" target="_blank"><img src="<?php echo asset_url() ?>images/facebook-icon.png"></a> </div>
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
