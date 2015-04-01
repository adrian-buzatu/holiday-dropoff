<div class="contactus-right-content ">
    <div class="contactus-right-content1">
        <div id="TabbedPanels4" class="TabbedPanels4">
            <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab"  tabindex="0" style="margin:0px;">Contact Us</li>
                <li class="TabbedPanelsTab4" tabindex="0">Find Us - Maps</li>
                <li class="TabbedPanelsTab5" tabindex="0">Work For Us</li>
            </ul>
            <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent1">
                    <form id="frmPage" name="frmPage" action="" method="post">
                        <div style="padding-left:30px; width:620px; height:850px; overflow:auto;">
                            <table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="	font-size:24px;
                                        font-weight:bold;
                                        color:#FFFFFF; padding:30px 0;
                                        font-family:"Century Gothic";">Please fill in the form to Contact Us</td>
                                </tr>
                                <tr>
                                    <td style="color:#FFFFFF; font-weight:bold;">Name</td>
                                </tr>
                                <tr>
                                    <td><input name="name" id="name" type="text" class="cnameinput" /></td>
                                </tr>
                                <tr>
                                    <td style="color:#FFFFFF;  font-weight:bold;">E-mail</td>
                                </tr>
                                <tr>
                                    <td><input name="email" id="email" type="text" class="cnameinput" /></td>
                                </tr>
                                <tr>
                                    <td style="color:#FFFFFF;  font-weight:bold;">Subject</td>
                                </tr>
                                <tr>
                                    <td ><input name="subject" id="subject" type="text" class="cnameinput" /></td>
                                </tr>
                                <tr>
                                    <td style="color:#FFFFFF;  font-weight:bold;">Message</td>
                                </tr>
                                <tr>
                                    <td class="cmassage" valign="top"><textarea name="msg" id="msg" cols="" rows=""></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right"><input type="image" name="image" src="<?php echo asset_url() ?>images/cosendbt.png" id="submit" style="margin-right:8px;" value="Submit" onclick="return valid(event);" /></td>
                                    <td><!--<a href="contact afttersent.html" onclick="return valid(name,email,subject,msg);"><img src="images/cosendbt.png" alt="" /></a>--></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="8"></td>
                                </tr>
                                <tr>
                                    <td height="35">&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <div id="contactSuccessMsg" class="hide">
                        <div id="successMsgHeader">The form was successfully submitted</div>
                        <div class="contactmasssage">We have received your email and will get back to you shortly. </div>
                    </div>
                </div>
                <div class="TabbedPanelsContent2">
                    <div class="findus-right-content-middile" style="height:750px; overflow:auto;">
                        <h1>Holiday Drop Off <br/>
                            </h1>
                        <div class="mapcollection" style="margin:0px; padding:0px;">
                            <iframe width="622" height="285" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&source=s_q&hl=en&geocode=&q=<?php echo $addressUrl; ?>&output=embed"></iframe>
                            <br />
                            <small><a href="https://maps.google.co.in/maps?f=q&source=embed&hl=en&geocode=&q=<?php echo $addressUrl?>" style="color:#0000FF;text-align:left">View Larger Map</a></small> </div>
                            <p><?php echo nl2br($address)?></p>
                    </div>
                </div>
                <div class="TabbedPanelsContent3">
                    <div class="workforus-right-content-middile" style="height:842px; overflow:auto;">
                        <?php echo $workForUs['content'];?>
                    </div>
                </div>
            </div>
        </div>
        <div class="c1"></div>
    </div>
</div>
<script type="text/javascript">
    function valid(event)
    {
        var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        //alert("h");
        if (document.frmPage.name.value == "")
        {
            alert("Please Enter Name");
            document.getElementById('name').focus();
            return false;
        }


        if (document.frmPage.email.value.length < 1)
        {
            alert("You cannot leave the Email Field Empty");
            document.getElementById('email').focus();
            return false;
        }
        if (!regex.test(document.frmPage['email'].value))
        {
            alert("Invalid email address format");
            document.getElementById('email').focus();
            return false;
        }
        if (document.frmPage.subject.value == "")
        {
            alert("Please Enter Subject");
            document.getElementById('subject').focus();
            return false;
        }
        if (document.frmPage.msg.value == "")
        {
            alert("Please Enter Message");
            document.getElementById('msg').focus();
            return false;
        }
        var $ = jQuery.noConflict();
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url() ?>contact-us/process",
            method: 'POST',
            dataType: "json",
            data: "subject=" + $("#subject").val() + "&email=" + $("#email").val() + "&msg=" + $("#msg").val() + "&name=" + $("#name").val(),
            success: function() {
                $("#frmPage").fadeOut('slow', function() {
                    $("#contactSuccessMsg").height($("#frmPage").outer)
                    $("#contactSuccessMsg").fadeIn('slow', function() {
                        setTimeout(function() {
                            $("#contactSuccessMsg").fadeOut('slow', function() {
                                $("#frmPage").fadeIn();
                            });
                        }, 3000);
                    });
                });

            }
        });

    }
</script>
<script type="text/javascript">
<!--
    var TabbedPanels4 = new Spry.Widget.TabbedPanels("TabbedPanels4", 0);
//-->
</script>