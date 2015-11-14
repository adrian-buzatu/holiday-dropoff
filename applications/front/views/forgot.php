<div class="ourcampus-right-content1">
    <div class="ourcampus-right-content">
        <div class="login-heading-text">Log in
            <?php if($success == false):?>
                <p>Please enter the email address you used when signing up for your account.</br>
                    Click “Email me a new password” and we will send you a new password.</p>
                <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="border:#333333 solid 1px; 
                       -moz-border-radius: 10px; /* Firefox */
                       -webkit-border-radius: 10px; /* Safari and Chrome */
                       border-radius: 10px; /* Opera 10.5+, future browsers, and now also Internet Explorer 6+ using IE-CSS3 */
                       background:#ffffff;   ">
                    <tr>
                        <td style="padding-left:20px; padding-top:50px;">
                            <form id="frmforgot" name="frmforgot" action="<?php echo base_url()?>login/forgot" method="post">
                                <table width="380" border="0" cellspacing="0" cellpadding="0">
                                    <?php if (form_error('email') != ''): ?>
                                        <tr>
                                            <td>
                                                <div style="font-size:14px; color:#FF0000; margin-top:-25px; position:absolute;">  

                                                    <?php echo form_error('email') ?>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td style="color:#000000; font-size:15px;">Email Address</td>
                                    </tr>
                                    <tr>
                                        <td><input name="email" id="email" type="text" class="emailiputbg"/></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="emailbt"><input type="submit" name="submit" style="background:none;border:0px;color:#FFFFFF;font-weight:bold;cursor:pointer;" id="submit" value="Email me a new password" onclick="return valid(email);"></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </form></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            <?php else:?>
                <p>
                    <div>A new password has now been sent to you.</div>
                    <div>Please check your email in a few seconds.</div>
                    <div>Note: If the email has not been received, please check your junk box.</div>
                </p>
            <?php endif;?>
        </div>
    </div>
    <div class="c1"></div>
    <div class="emailsignbt"><a href="<?php echo base_url()?>register">Haven’t got an account - Sign up</a></div>
</div>