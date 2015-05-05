<div class="myaccount-right-content">
    <div class="myaccount-heading-text" style="padding-bottom:0px;">
        <img src="<?php echo asset_url()?>images/myaccounttitle.png" alt="" /> 
        <span> 
            <a href="<?php echo base_url()?>logout"><img src="<?php echo asset_url()?>images/signoutbt.png" alt="" /></a> 
            <a href="<?php echo base_url()?>booking"><img src="<?php echo asset_url()?>images/bookoninebt.png" alt="" /> </a>
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
                                <form action="<?php echo base_url()?>profile" method="post" id="profile_form">
                                    <?php echo validation_errors(); ?>
                                    <?php if($this->session->flashdata('profile_up_success') !== ''):?>
                                    <div class="profile-up-success"><?php echo $this->session->flashdata('profile_up_success')?></div>
                                    <?php endif;?>
                                    <div class="mydetail-right-content">
                                        <div class="formdetails"><span>Title:</span>
                                            <p>
                                                <select name="title" id="title">
                                                    <option <?php if($me['title'] == "Mr."):?>selected<?php endif;?> value="Mr.">Mr.</option>
                                                    <option <?php if($me['title'] == "Mrs."):?>selected<?php endif;?> value="Mrs.">Mrs.</option>
                                                    <option <?php if($me['title'] == "Ms."):?>selected<?php endif;?> value="Ms.">Ms.</option>
                                                    <option <?php if($me['title'] == "Miss"):?>selected<?php endif;?> value="Miss">Miss</option>
                                                    <option  <?php if($me['title'] == "Dr."):?>selected<?php endif;?> value="Dr.">Dr.</option>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Forename<sup>*</sup>:</span>
                                            <p>
                                                <input name="first_name" type="text" value="<?php echo $me['first_name']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Surname<sup>*</sup>:</span>
                                            <p>
                                                <input name="last_name" type="text" value="<?php echo $me['last_name']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Username<sup>*</sup>:</span>
                                            <p>
                                                <input name="username" type="text" value="<?php echo $me['username']?>" readonly />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Current Password:</span>
                                            <p>
                                                <input name="old_password" type="password" value="" />
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
                                        <div class="formdetails"><span>Email address<sup>*</sup>:</span>
                                            <p>
                                                <input name="email" type="text" value="<?php echo $me['email']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Daytime phone number:</span>
                                            <p>
                                                <input name="landline" type="text" value="<?php echo $me['landline']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Mobile phone number<sup>*</sup>:</span>
                                            <p>
                                                <input name="phone_number" type="text" value="<?php echo $me['phone_number']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Address line 1<sup>*</sup>:</span>
                                            <p>
                                                <input name="address1" type="text" value="<?php echo $me['address1']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Address line 2:</span>
                                            <p>
                                                <input name="address2" type="text" value="<?php echo $me['address2']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Address line 3:</span>
                                            <p>
                                                <input name="address3" type="text" value="<?php echo $me['address3']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Postcode<sup>*</sup>:</span>
                                            <p>
                                                <input name="zip" type="text" value="<?php echo $me['zip']?>" />
                                            </p>
                                        </div>
                                        <div class="formdetails"><span>Country<sup>*</sup>:</span>
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
                                        <div class="formdetails"><span>Where did you hear about us<sup>*</sup>:</span>
                                            <p>
                                                <input name="reference" type="text" value="<?php echo $me['reference']?>" />
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
                    <div>
                        <table class="profile__bookings" cellpadding = "0" cellspacing = "0">
                            <thead>
                                <tr>
                                    
                                    <th>
                                        Child Name
                                    </th>
                                    <th>
                                        Days Booked
                                    </th>
                                    <th>
                                        Camp
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bookings as $loopIndex => $item): ?>
                                    <tr >
                                        
                                        <td>
                                            <?php echo $item['child'];?>
                                        </td>
                                        <td cellpadding = "0">
                                            <?php echo $item['days_booked'];?>
                                        </td>
                                        <td cellpadding = "0">
                                            <?php echo $item['camp'];?>
                                        </td>                                        
                                    </tr>
                                    <?php if(isset($bookings[$loopIndex +1])
                                                && $bookings[$loopIndex]['id'] != $bookings[$loopIndex + 1]['id']):?>
                                    <tr >
                                        <td colspan="3" class="profile__booking_total_cell">
                                            TOTAL: &pound; <?php echo number_format($item['total'], 2);?>
                                        </td> 
                                    </tr>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
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