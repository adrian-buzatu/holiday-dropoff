<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background: none repeat scroll 0% 0% rgb(244, 235, 34); border-bottom: 2px solid rgb(102, 102, 102); " >
    <tr>
        <td width="11%" align="center" style=" font-weight:normal; padding:13px 0 13px 20px;"><a href="#"><img src="<?php echo asset_url() ?>images/add+.png" onclick="return addChild();" alt="" /></a></td>
        <td width="50%" style="font-size:18px; height:32px; line-height:27px; "><a href="#" style="color:#333333;" onclick="return addChild();">Add a friend</a> who isnt registered</td>
        <td width="39%"><div id="addfrndmsg" style="color:#000; font-size:12px;">you have <span>not selected</span> to add friend</div></td>
    </tr>
    <tr>
        <td colspan="3">
            <table >
                <tr id="new_child" style=" display:none;">
                    <td>
                        <table  id="newtbl123"  width="300" border="0" align="center" cellpadding="0" cellspacing="0" style=" display:none; ">
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
                            <table id="Childrens_area_NEWFIEND" style=" " >
                                <tr>
                                    <td><input type="hidden" name="txt_children_tmp_value_NEWFIEND" id="txt_children_tmp_value_NEWFIEND" value="0"  />
                                        <input type="hidden" name="txt_children_tmpEXT_value_NEWFIEND" id="txt_children_tmpEXT_value_NEWFIEND" value="0"  />
                                <tr>
                                    <td colspan="4" style="font-size:16px; padding-bottom:5px;">januari camp                                    27 Jan 2014 - 31 Jan 2014</td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="center" style=" font-size:13px;  	border:#333333 solid 1px;
                                    -moz-border-radius: 10px; /* Firefox */
                                    -webkit-border-radius: 10px; /* Safari and Chrome */
                                    border-radius: 10px; /* Opera 10.5+, future browsers, and now also Internet Explorer 6+ using IE-CSS3 */
                                    background:#3e52a3; 
                                    margin-top:10px;"><table id="children_tbl0" width="620" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:10px;">
                                            <tr>
                                                <td width="174">&nbsp;</td>
                                                <td width="89" height="33" align="center" valign="bottom" style="color:#FFFFFF;">Mon 27Jan</td>
                                                <td width="89" height="33" align="center" valign="bottom" style="color:#FFFFFF;">Tue 28Jan</td>
                                                <td width="89" height="33" align="center" valign="bottom" style="color:#FFFFFF;">Wed 29Jan</td>
                                                <td width="89" height="33" align="center" valign="bottom" style="color:#FFFFFF;">Thu 30Jan</td>
                                                <td width="89" height="33" align="center" valign="bottom" style="color:#FFFFFF;">Fri 31Jan</td>
                                            </tr>
                                            <tr>
                                                <td width="169" class="tdclassf"  style="text-align:center;" >Normal Day</td>
                                                <td width="89" rowspan="2" align="center" class="tdclasso"><input type="checkbox" onclick="addCamptoBasketFriend(35, 10.00, this, 'NEWFIEND', '35NEWFIEND', 'Mon')" name="checkBox_NEWFIEND_35[]" id="checkBox_normal_31"  value="Mon" />
                                                    Book </td>
                                                <td width="89" rowspan="2" align="center" class="tdclasso"><input type="checkbox" onclick="addCamptoBasketFriend(35, 10.00, this, 'NEWFIEND', '35NEWFIEND', 'Tues')" name="checkBox_NEWFIEND_35[]" id="checkBox_normal_32"  value="Tues" />
                                                    Book </td>
                                                <td width="89" rowspan="2" align="center" class="tdclasso"><input type="checkbox" onclick="addCamptoBasketFriend(35, 10.00, this, 'NEWFIEND', '35NEWFIEND', 'Wed')" name="checkBox_NEWFIEND_35[]" id="checkBox_normal_33"  value="Wed" />
                                                    Book </td>
                                                <td width="89" rowspan="2" align="center" class="tdclasso"><input type="checkbox" onclick="addCamptoBasketFriend(35, 10.00, this, 'NEWFIEND', '35NEWFIEND', 'Thu')" name="checkBox_NEWFIEND_35[]" id="checkBox_normal_34"  value="Thu" />
                                                    Book </td>
                                                <td width="89" rowspan="2" align="center" class="tdclasso"><input type="checkbox" onclick="addCamptoBasketFriend(35, 10.00, this, 'NEWFIEND', '35NEWFIEND', 'Fri')" name="checkBox_NEWFIEND_35[]" id="checkBox_normal_35"  value="Fri" />
                                                    Book </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="background:#FFFFFF;border-bottom:#666666 solid 1px; border-right:#666666 solid 1px;  padding-left:10px;border-left:#666666 solid 1px; padding-top:3px; padding-bottom:5px;"><input type="checkbox"   name="radio" id="all_select_camps_35NEWFIEND_CHK" onclick="checkBox_selectFriend('31_10.00,31,32_10.00,32,33_10.00,33,34_10.00,34,35_10.00,35,', this, '10.00', '60', 'book_all', 35);" value="NEWFIEND" />
                                                    <input type="hidden" name="all_select_camps_NEWFIEND" id="all_select_camps_35NEWFIEND" value="60" />
                                                    Book all days</td>
                                            </tr>
                                            <tr>
                                                <td width="169" class="tdextented" style="text-align:center;" >Extended Day (5 extra)</td>
                                                <td width="89" rowspan="2" align="center" class="tdextentedr"><input type="checkbox"  onclick="addCamptoBasketEXTFriend(35, 5, this, 'NEWFIEND')" name="checkBox_ext_NEWFIEND_35[]" id="checkBox_normal_36"  value="EXT_Mon" />
                                                    Book</td>
                                                <td width="89" rowspan="2" align="center" class="tdextentedr"><input type="checkbox"  onclick="addCamptoBasketEXTFriend(35, 5, this, 'NEWFIEND')" name="checkBox_ext_NEWFIEND_35[]" id="checkBox_normal_37"  value="EXT_Tues" />
                                                    Book</td>
                                                <td width="89" rowspan="2" align="center" class="tdextentedr"><input type="checkbox"  onclick="addCamptoBasketEXTFriend(35, 5, this, 'NEWFIEND')" name="checkBox_ext_NEWFIEND_35[]" id="checkBox_normal_38"  value="EXT_Wed" />
                                                    Book</td>
                                                <td width="89" rowspan="2" align="center" class="tdextentedr"><input type="checkbox"  onclick="addCamptoBasketEXTFriend(35, 5, this, 'NEWFIEND')" name="checkBox_ext_NEWFIEND_35[]" id="checkBox_normal_39"  value="EXT_Thu" />
                                                    Book</td>
                                                <td width="89" rowspan="2" align="center" class="tdextentedr"><input type="checkbox"  onclick="addCamptoBasketEXTFriend(35, 5, this, 'NEWFIEND')" name="checkBox_ext_NEWFIEND_35[]" id="checkBox_normal_40"  value="EXT_Fri" />
                                                    Book</td>
                                            </tr>
                                            <tr>
                                                <td valign="top" class="tdbookall" style=" padding-left:10px;"><input type="checkbox" onclick="checkBoxEXT_selectFriend('36_5,36,37_5,37,38_5,38,39_5,39,40_5,40,', this, 35, 'EXTALL');"  name="radio" id="checkBox_EXT_ALL_35_NEWFIEND" value="NEWFIEND"  />
                                                    Book all days</td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                </tr>
                                </td>

                                </tr>

                            </table>
                        </table>
                    </td>

                </tr>

            </table>