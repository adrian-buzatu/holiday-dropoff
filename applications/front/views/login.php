<div class="ourcampus-right-content1">
    <div class="bookonline-right-content">
        <div class="login-heading-text1">
            <h1>Log in</h1>
            <form id="signup" method="post" action="<?php echo base_url()?>login">
                <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="border:#333333 solid 1px; 
                       -moz-border-radius: 10px; /* Firefox */
                       -webkit-border-radius: 10px; /* Safari and Chrome */
                       border-radius: 10px; /* Opera 10.5+, future browsers, and now also Internet Explorer 6+ using IE-CSS3 */
                       background:#ffffff;   ">
                    <tr>
                        <td style="padding-left:20px; padding-top:50px;"><table width="610" border="0" cellspacing="0" cellpadding="0">
                                <?php if (form_error('username') != ''): ?>
                                    <tr>
                                        <td>
                                            <div style="font-size:14px; color:#FF0000; margin-top:-25px; position:absolute;">  

                                                <?php echo form_error('username') ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="2" style="color:#000000; font-size:15px;">Username :</td>
                                    <td><input id="username" name="username" type="text"  class="useriputbg" /></td>
                                    <!--<td class="massagebg">This will be used to sign
                                  into your account</td>-->
                                </tr>
                                <tr>
                                    <td colspan="2" style="color:#000000; font-size:15px; ">Password :</td>
                                    <td colspan="2"><input id="password" name="password" type="password"  class="useriputbg" /></td>
                                    <!--<td class="massagebg">Pick something that you 
                                  will remember!</td>-->
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td colspan="4">
                                        <div id="submit_holder">
                                            <input type="submit" class="signupbt" value="Log In"  />
                                        </div>
                                    </td>
                                </tr>
                            </table></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </form>
            <div class="login-content-text1">Having your own log in allows you to book, amend and cancel* HDO bookings. If you haven’t yet created an account click on the link below</div>
        </div>
    </div>
    <div class="c1"></div>
    <div class="forgotbt"><a href="<?php echo base_url()?>login/forgot">I forgot my password</a></div>
    <div class="accountsignbt"><a href="<?php echo base_url()?>register">Haven’t got an account - Sign up</a></div>
</div>
