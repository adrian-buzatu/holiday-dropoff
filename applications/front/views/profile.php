<div class="myaccount-right-content">
    <div class="myaccount-heading-text" style="padding-bottom:0px;">
        <img src="<?php echo asset_url()?>images/myaccounttitle.png" alt="" /> 
        <span> 
            <a href="<?php echo base_url()?>logout"><img src="<?php echo asset_url()?>images/signoutbt.png" alt="" /></a> 
            <a href="#"><img src="<?php echo asset_url()?>images/bookoninebt.png" alt="" /> </a>
        </span>
    </div>
    <div style="color:#FFFFFF;">Children must be registered prior to booking online</div>
    <div class="myaccount-middle-content">
        <div id="TabbedPanels3" class="TabbedPanels3">
            <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0" style="margin:0px;">My details</li>
                <li class="TabbedPanelsTab3" tabindex="0">My children</li>
                <li class="TabbedPanelsTab3" tabindex="0">My bookings</li>
            </ul>
            <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent1">
                    <table width="642" border="0" cellspacing="0" cellpadding="0" style="
                           -moz-border-radius-bottomright: 10px;
                           border-bottom-right-radius: 10px;
                           -moz-border-radius-topright: 10px;
                           border-top-right-radius: 10px;
                           -moz-border-radius-bottomleft: 10px;
                           border-bottom-left-radius: 10px;">
                        <tr>
                            <td style="padding:15px; font-size:15px; font-weight:bold;">If you need to update/change any of your details, please make sure that you save your changes by clicking the update button below</td>
                        </tr>
                        <tr>
                            <td>                          
                                <form action="<?php echo base_url()?>profile" method="post">
                                    <div class="mydetail-right-content">
                                        <div class="formdetails"><span>Title:</span>
                                            <p>
                                                <select name="title" id="title">
                                                    <option <?php if($me['title'] == "Mr."):?>selected<?php endif;?> value="Mr.">Mr.</option>
                                                    <option <?php if($me['title'] == "Mrs."):?>selected<?php endif;?> value="Mrs.">Mrs.</option>
                                                    <option <?php if($me['title'] == "Ms."):?>selected<?php endif;?> value="Ms.">Ms.</option>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Forename:</span>
                                            <p>
                                                <input name="forename" type="text" value="<?php echo $me['first_name']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Surname:</span>
                                            <p>
                                                <input name="surname" type="text" value="<?php echo $me['last_name']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Username:</span>
                                            <p>
                                                <input name="username" type="text" value="<?php echo $me['username']?>" readonly />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Password:</span>
                                            <p>
                                                <input name="password" type="password" value="" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Re-enter password:</span>
                                            <p>
                                                <input name="password" type="password" value="" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Email address:</span>
                                            <p>
                                                <input name="email" type="text" value="<?php echo $me['email']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Daytime phone number:</span>
                                            <p>
                                                <input name="landline" type="text" value="<?php echo $me['landline']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Mobile phone number:</span>
                                            <p>
                                                <input name="mobile" type="text" value="<?php echo $me['phone_number']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Address line 1:</span>
                                            <p>
                                                <input name="add1" type="text" value="<?php echo $me['address1']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Address line 2:</span>
                                            <p>
                                                <input name="add2" type="text" value="<?php echo $me['address2']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Address line 3:</span>
                                            <p>
                                                <input name="add3" type="text" value="<?php echo $me['address3']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Postcode:</span>
                                            <p>
                                                <input name="postcode" type="text" value="<?php echo $me['zip']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Country</span>
                                            <p>
                                                <select name="country_id">
                                                    <?php foreach($countries as $id => $country):?>
                                                        <option 
                                                            <?php if($me['country_id'] == $id):?>selected<?php endif;?>
                                                            value="<?php echo $id?>"><?php echo $country?>
                                                        </option>
                                                    <?php endforeach;?>

                                                </select>
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Where did you hear about us:</span>
                                            <p>
                                                <input name="ref" type="text" value="<?php echo $me['reference']?>" />
                                            </p>
                                        </div>
                                        <div>
                                            <input type="submit" class="signupbt" value="Update" style="border-radius:15px; border:none; cursor:pointer">
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <div class="TabbedPanelsContent2">
                    
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="children_table" >
                        <?php if(is_array($children)):?>
                            <?php foreach($children as $child):?>
                                <tr>
                                    <td width="11%" align="center" style="font-weight: normal; padding: 16px 0pt 13px 28px;"><a href="#"><img height="22" width="24" alt="" src="<?php echo asset_url()?>images/star-icon.png"></a></td>
                                    <td width="22%" style="font-size: 15px; height: 32px; line-height: 27px;">
                                        <a style="color: rgb(51, 51, 51);" href="javascript:void(1);" class="update_child editable_text" rel="<?php echo $child['id']?>"><?php echo $child['first_name']. " " .$child['last_name']?></a> 
                                    </td>
                                    <td>
                                        <a href="javascript:void(1);" class="update_child" rel="<?php echo $child['id']?>"><img alt="" src="<?php echo asset_url()?>images/updateyellobt.png"></a>
                                    </td>
                                    <td style="margin-right:5%;">
                                        <a href="javascript:void(1);" rel="<?php echo $child['id']?>" class="delete_child"><img alt="" src="<?php echo asset_url()?>images/deleteyellobt.png"></a>
                                    </td>							

                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                   
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="11%" align="center" style=" font-weight:normal; padding:13px 0 13px 20px;"><a href="#"><img src="<?php echo asset_url()?>images/add+.png" onclick="return addChild();" alt="" /></a></td>
                            <td width="63%" style="  font-size:15px; font-weight:bold; height:32px; line-height:27px; "><a href="#" style="color:#333333; text-decoration:none;" onclick="return addChild();" >Add new child</a> </td>
                            <td width="26%">&nbsp;</td>
                        </tr>
                    </table>
                    <table style="margin-left:5%;">
                        <tr id="old_child" style=" ">
                            <td>
                                <form id="editchildform" name="addchildform" method="post">
                                    <table id="editchildTbl" width="300" border="0" align="center" cellpadding="0" cellspacing="0" style=" display:none; ">
                                        <tr>
                                            <td colspan="3" style="border-bottom: #999999 dotted 2px; padding:0px 0 15px 0;"></td>
                                        </tr>
                                        <tr>
                                            <td style="margin-left:5%;"></td>
                                            <td>Forename:</td>
                                            <td width="225">
                                                <input name="first_name" id="up_first_name" class="afnamebg" type="text" value="" />
                                                <div id="up_first_name_error" class="child_form_error">&nbsp;</div>
                                            </td>
                                            <td width="302">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="margin-left:5%;"></td>
                                            <td>Surname:</td>
                                            <td>
                                                <input name="last_name" id="up_last_name" class="afnamebg" type="text"  value=""  />
                                                <div id="up_last_name_error" class="child_form_error">&nbsp;</div>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="border-bottom: #999999 dotted 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Date of birth:</td>
                                            <td width="52" style=" height:32px;   padding:5px; padding-right:13px;"><!--<img src="<?php echo asset_url()?>images/topbottom-arrow.png" alt="" style="float:right;" /> -->
                                                <input name="birthdate" id="up_birthdate" class="datepicker afnamebg" type="text" readonly="" value=""  /> 
                                                <div id="up_birthdate_error" class="child_form_error">&nbsp;</div>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td colspan="3">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <table width="585" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="210" valign="top">Allergies/notes:</td>
                                                        <td valign="top"><textarea name="notes" id="up_notes" class="textbox" cols="" rows=""></textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="border-top: #999999 dotted 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <table width="300" border="0" align="right" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="199" height="80">&nbsp;</td>
                                                        <td width="101"><input type="hidden" name="children_id" value="0" />
                                                            <input type="hidden" name="parent_id" value="<?php echo $me['id']?>" />
                                                            <input type="hidden" id="child_id" value="0" />
                                                            <!--<input type="image" src="<?php echo asset_url()?>images/addbt.png" id="submit" />-->

                                                            <input type="image" name="image" src="<?php echo asset_url()?>images/addbt.png" id="submit" value="Update" />                                       
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        </tr>
                        <tr id="new_child" style=" ">
                            <td>
                                <form id="addchildform1" name="addchildform1" method="post">
                                    <table id="addchildTbl" width="300" border="0" align="center" cellpadding="0" cellspacing="0" style=" display:none; ">
                                        <tr>
                                            <td colspan="3" style="border-bottom: #999999 dotted 2px; padding:0px 0 15px 0;"></td>
                                        </tr>
                                        <tr>
                                            <td style="margin-left:5%;"></td>
                                            <td>Forename:</td>
                                            <td width="225">
                                                <input name="first_name" id="first_name" class="afnamebg" type="text" value="" />
                                                <div id="first_name_error" class="child_form_error">&nbsp;</div>
                                            </td>
                                            <td width="302">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="margin-left:5%;"></td>
                                            <td>Surname:</td>
                                            <td>
                                                <input name="last_name" id="last_name" class="afnamebg" type="text"  value=""  />
                                                <div id="last_name_error" class="child_form_error">&nbsp;</div>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="border-bottom: #999999 dotted 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Date of birth:</td>
                                            <td width="52" style=" height:32px;   padding:5px; padding-right:13px;"><!--<img src="<?php echo asset_url() ?>images/topbottom-arrow.png" alt="" style="float:right;" /> -->
                                                <input name="birthdate" id="birthdate" class="afnamebg datepicker" type="text" readonly="" value=""  /> 
                                                <div id="birthdate" class="child_form_error">&nbsp;</div>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <table width="585" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="210" valign="top">Allergies/notes:</td>
                                                        <td valign="top"><textarea name="notes" id="notes" class="textbox" cols="" rows=""></textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">&nbsp;</td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="3" style="border-top: #999999 dotted 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><table width="300" border="0" align="right" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="199" height="80">&nbsp;</td>
                                                        <td width="101"><input type="hidden" name="children_id" value="0" />
                                                            <input type="hidden" name="parent_id" value="<?php echo $me['id']?>" />
                                                            <input type="hidden" name="related_id" value="0" />
                                                            <input type="image" name="image" src="<?php echo asset_url()?>images/addbt.png" id="submit" value="Submit" />
                                                        </td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="TabbedPanelsContent3">
                    <table width="642" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="185" align="center" style="padding-top:40px; padding-bottom:42px;">Select Camp :</td>
                            <td width="237" class=""><select    onchange="showbooking(this.value);">
                                    <option value="0">Summer Camp</option>
                                    <option value="35">januari camp - 2014-01-27 2014-01-31</option>                          </select>
                                <div class="photogallerysearch">
                                    <div class="demo"> </div>
                                </div></td>
                            <td width="248">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td width="1"></td>
                        </tr>
                        <tr>
                            <td height="30" colspan="4" align="right" valign="top" style="padding-right:20px;">Extended days are shown in <span>RED</span></td>
                        </tr>
                        <tr>
                            <td colspan="3"><table width="654" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#f9f5b1; padding-left:15px;">
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;">Finn Ashworth</td>
                                                    <td align="right" style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;"><span>Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" >Camp : Start Date: 27 Jan 2014- Days :Mon &nbsp; - Mon</td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;">Mieke Ashworth</td>
                                                    <td align="right" style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;"><span>Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" >Camp : Start Date: 27 Jan 2014- Days :Mon &nbsp; - Mon</td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;">Noortje Ashworth</td>
                                                    <td align="right" style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;"><span>Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" >Camp : Start Date: 27 Jan 2014- Days :Mon &nbsp; - Mon</td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;">Finn Ashworth</td>
                                                    <td align="right" style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;"><span>Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" >Camp : Start Date: 02 Dec 2009- Days :Wed,Thu,Fri,EXT_Thu &nbsp; - Wed,Thu,Fri,<span>Thu</span></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;">Mieke Ashworth</td>
                                                    <td align="right" style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;"><span>Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" >Camp : Start Date: 02 Dec 2009- Days :Wed,Thu,Fri,EXT_Thu &nbsp; - Wed,Thu,Fri,<span>Thu</span></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;">Finn Ashworth</td>
                                                    <td align="right" style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;"><span>Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" >Camp : Start Date: 02 Dec 2009- Days :Wed,Thu,Fri,EXT_Thu &nbsp; - Wed,Thu,Fri,<span>Thu</span></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;">Mieke Ashworth</td>
                                                    <td align="right" style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;"><span>Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" >Camp : Start Date: 02 Dec 2009- Days :Wed,Thu,Fri,EXT_Thu &nbsp; - Wed,Thu,Fri,<span>Thu</span></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;">Finn Ashworth</td>
                                                    <td align="right" style="font-size:15px;  border-top: #999999 dotted 1px;padding:10px 0 15px 0;"><span>Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" >Camp : Start Date: 19 Dec 2013- Days :Thu &nbsp; - Thu</td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="115"><a href="#"><img src="<?php echo asset_url()?>images/printbt.png" alt="" /></a></td>
                                                    <td width="523"><div style="position:relative; background:url(images/amountbt2.png) top left no-repeat; line-height:25px; text-align:right; width:182px; padding-right:10px;">&pound;182.5</div></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table></td>
                        </tr>
                        <tr>
                            <td height="33" colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding-left:30px;"><img src="<?php echo asset_url()?>images/changebt.png" alt="" /></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-size:18px; font-weight:normal; color:#666666; padding:10px 0 0 30px;">Please note that bookings can’t be changed<br/>
                                or cancelled 3 days prior to booking </td>
                        </tr>
                        <tr>
                            <td height="33" colspan="3">&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="c1"></div>
    </div>
</div>
<script type="text/javascript">
<!--
    var TabbedPanels3 = new Spry.Widget.TabbedPanels("TabbedPanels3", 0);
//-->

</script>