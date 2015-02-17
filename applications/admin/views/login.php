<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Holiday Drop Off Camps - Admin Panel</title>
        <!--<link href="stylesheet.css" type="text/css" rel="stylesheet" />-->
        <link href="<?php echo asset_url() ?>css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="wrapper">
            <div id="wrap">
                <div id="page"><div class="logo"><img src="<?php echo asset_url() ?>images/logo.png" alt="" /></div>

                    <div id="home">
                        <div class="admin_in">
                            <div style="margin:0px auto;">
                                <h1>
                                    <br />Admin Login</h1>
                                <div class="adminlogin">
                                    <div style="font-size:14px; color:#FF0000; margin-top:-5px; position:absolute;">  
                                        <?php if(form_error('username') != ''):?>
                                            <?php echo form_error('username')?>
                                        <?php endif;?>
                                    </div>
                                    <form method="post" action="<?php echo base_url() ?>login">
                                        <table align="center" cellpadding="0" cellspacing="0"  style="margin:0px auto; padding-top:22px; width:315px;">
                                            <tr>
                                                <td>UserName :</td>
                                                <td class="login-box"><input type="text" name="username" id="username" class="input" /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" height="12"></td>
                                            </tr>
                                            <tr>
                                                <td>Password :</td>
                                                <td class="login-box"><input type="password" name="password" id="password"  class="input"/></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" height="12"></td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2" align="right"><input type="image" src="<?php echo asset_url() ?>images/login.png" style="margin-right:6px;" name="btnlogin" value="Login" />
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <!--==============================footer=================================-->
                    <div style="clear:both;"></div>	
                </div></div></div>
        <div class="footer">Copyright Holiday Drop Off</div>
    </body>
</html>