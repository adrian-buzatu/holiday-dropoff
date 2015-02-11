<div class="middlepart1">
    <script type="text/javascript">
        function validation(newsEmail)
        {
            var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (document.frmMail.newsEmail.value.length < 1)
            {
                alert("You cannot leave the Email Field Empty");
                document.getElementById('newsEmail').focus();
                return false;
            }
            if (!regex.test(document.frmMail['newsEmail'].value))
            {
                alert("Invalid email address format");
                document.getElementById('newsEmail').focus();
                return false;
            }
        }
    </script>

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
                            <input type="image" src="<?php echo asset_url()?>images/submit.jpg" name="mail" style="margin-bottom:10px;" id="mail" value="Submit" onclick="return validation(newsEmail);" />
                        </form></td>
                </tr>
            </table>
        </div>
        <div class="nextcamps">
            <div class="newstext1">Next Camps</div>
            <div class="newstext2"><a style="color: #FFFFFF; text-decoration:none;font-size: 13px;   font-weight: bold;" href="book-online.php?tab=33">Summer Camp</a></div><div class="newstext2"><a style="color: #FFFFFF; text-decoration:none;font-size: 13px;   font-weight: bold;" href="book-online.php?tab=32">Easter Camp</a></div>  </div>
        <div class="gallery2"> <a href="photogallery.php">
                <div class="gallery-img1"><img width="66" height="66" src="<?php echo asset_url()?>images/gallery29.jpg" /></div><div class="gallery-img2"><img width="66" height="66" src="<?php echo asset_url()?>images/gallery28.jpg" /></div><div class="gallery-img3"><img width="66" height="66" src="<?php echo asset_url()?>images/gallery24.jpg" /></div><div class="gallery-img4"><img width="66" height="66" src="<?php echo asset_url()?>images/gallery25.jpg" /></div><div class="gallery-img4"><img width="66" height="66" src="<?php echo asset_url()?>images/gallery26.jpg" /></div><div class="gallery-img4"><img width="66" height="66" src="<?php echo asset_url()?>images/gallery27.jpg" /></div><div class="gallery-img4"><img width="66" height="66" src="<?php echo asset_url()?>images/gallery23.jpg" /></div><div class="gallery-img4"><img width="66" height="66" src="<?php echo asset_url()?>images/gallery22.jpg" /></div><div class="gallery-img4"><img width="66" height="66" src="<?php echo asset_url()?>images/gallery20.jpg" /></div>    <div class="gallery-img5">See the latest Holiday Drop Off<br />
                    photos</div>
            </a> </div>
        <div class="checklist2">
            <div class="cheklist-text-hd">HDO Checklist...</div>
            <div class="cheklist-text-hd2">
                <div class="cheklist-offer"><img src="<?php echo asset_url()?>images/icon.png" />Packed Lunch</div>
                <div class="cheklist-offer"><img src="<?php echo asset_url()?>images/icon.png" />Swimming Kit</div>
                <div class="cheklist-offer"><img src="<?php echo asset_url()?>images/icon.png" />Clothing</div>
                <div class="cheklist-offer"><img src="<?php echo asset_url()?>images/icon.png" />Medical Equipment</div>
                <div class="cheklist-offer"><img src="<?php echo asset_url()?>images/icon.png" />Application Form</div>
                <div class="c1"></div>
            </div>
        </div>
        <div class="c1"></div>
    </div>
    <div class="bannerbox">
        <script type="text/javascript">

            var mygallery = new fadeSlideShow({
                wrapperid: "fadeshow1", //ID of blank DIV on page to house Slideshow
                dimensions: [671, 229], //width/height of gallery in pixels. Should reflect dimensions of largest image
                imagearray: [
                    ["<?php echo asset_url()?>images/gallery26.jpg"], ["<?php echo asset_url()?>images/gallery27.jpg"], ["<?php echo asset_url()?>images/gallery28.jpg"], ],
                displaymode: {type: 'auto', pause: 2500, cycles: 0, wraparound: false},
                persist: false, //remember last viewed slide and recall within same session?
                fadeduration: 500, //transition duration (milliseconds)
                descreveal: "ondemand",
                togglerid: ""
            })

        </script>
        <div id="fadeshow1"></div>
    </div>
    <div class="middlecontant2">
        <div class="welcome"><img src="<?php echo asset_url()?>images/welcome.png" width="428" height="40" /></div>
        <div class="welcome2">Holiday Boredom solved!</div>
        <div class="icon2"> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> <img src="<?php echo asset_url()?>images/holidaystar.png" alt="" /> </div>
        <div class="body-main-content">
            <div class="bodycontent1">
                <p>
                    Holiday Drop Off is a great way for children to learn new sports in a fun and exciting environment. &#39;HDO&#39; believe that sport should be enjoyed by all and have created a sports camp for children between the ages of Rising 4 -14 years old..<br />
                    &#39;HDO&#39; is a sports camp which is taught by coaches of various sporting backgrounds, helping develop sporting techniques or simply introducing children to sports they are yet to learn.<br />
                    <br />
                    Places are limited so its best to book in advance. Although you can turn up on the day (depending on availability) &#39;HDO&#39; have great discounts when booking online...<br />
                    <br />
                    To take advantage of the first class coaching in an admirable sporting facility, book online now and don&#39;t miss out.</p>
                <p>
                    &nbsp;</p>
                <p>
                    <img alt="" src="https://scontent-a-lhr.xx.fbcdn.net/hphotos-prn1/935249_527113407324075_272446065_n.jpg" style="width: 200px; height: 267px;" /><img alt="" src="https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/935469_527502617285154_733424246_n.jpg" style="width: 200px; height: 267px;" /></p>
                <p>
                    &nbsp;</p>
                <p>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                <p>
                    &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
                <p>
                    &nbsp;</p>
                <p>
                    <a href="http://storiesandsavings.com/test/holiday/book-online.php">Next Camp is the Xmas Camp - Click here to book now</a>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
            </div>
        </div>
    </div>
    <div class="middlecontant3">
        <div class="flayer">
            <div class="downloadtext">
                <a href="download.php?download_file=050226171113.pdf">Download Our HDO E-Flyer</a>              </div>
            <div class="img-effect"><img src="<?php echo asset_url()?>images/img-effect.png" /></div>
        </div>
    </div>
</div>