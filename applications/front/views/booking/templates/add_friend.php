<table width="100%" border="0" cellspacing="0" cellpadding="0" style="" id="add_friend_table" >
    <tr>
        <td class="add_friend_btn_holder" width="11%" align="center"><a href="javascript:void(1);" class="add_friend"><img src="<?php echo asset_url() ?>images/add+.png" alt="" /></a></td>
        <td width="50%" class="add_friend_text" style=""><a href="javascript:void(1);" class="add_friend">Add a friend</a> who isnt registered</td>
        <td width="39%"><div id="addfrndmsg">you have <span>not selected</span> to add friend</div></td>
    </tr>
    <tr>
        <td colspan="3">
            <table >
                <tr id="friend" class="hide">
                    <td>
                        <table  id="friend_table"  width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="3" class="border_friend_table"></td>
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
                                <td colspan="3" class="border_friend_table"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Date of birth:</td>
                                <td width="52" class="birthdate_friend_table_container">
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
                                <td colspan="3" class="border_friend_table"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            
                        </table>
                        <table id="friend_booking_area" >
                            <tr>
                                <td class="camp_cell" colspan="4" style=""><?php echo $selected_camp['name'] ?> <?php echo date('m/d/Y', $selected_camp['start_date']) ?> - <?php echo date('m/d/Y', $selected_camp['end_date']) ?></td>
                            </tr>
                            <tr>
                                <td class="booking_cell" colspan="4" align="center" style=" ">
                                    <table id="children_tbl0" width="620" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:10px;">
                                        <tr>
                                            <td width="174">&nbsp;</td>
                                            <?php
                                            for ($i = $selected_camp['start_date']; $i < $selected_camp['end_date']; $i = strtotime('+1 day', $i)):
                                                ?>
                                                <td align="center" valign="bottom" class="booking_calendar_headers"><?php echo date("D d M", $i) ?></td>
                                            <?php endfor; ?>

                                        </tr>
                                        <tr>
                                            <td width="169" class="tdclassf" style="text-align:center;" >Normal Day</td>
                                            <?php
                                            for ($i = $selected_camp['start_date']; $i < $selected_camp['end_date']; $i = strtotime('+1 day', $i)):
                                                ?>

                                                <td width="89" rowspan="2" align="center" class="tdclasso">
                                                    <input type="checkbox" class="normal_check booking_checkbox" rel="extended"
                                                           name="friend_days_booked[<?php echo date('w', $i) != 0 ? date('w', $i) : 7 ?>]" id="" value="<?php echo date('w', $i) != 0 ? date('w', $i) : 7 ?>" />
                                                    Book </td>
                                            <?php endfor; ?>

                                        </tr>
                                        <tr>
                                            <td valign="top" class="check_all_wrapper" style="">
                                                <input type="checkbox" name="radio" class="book_all_days book_all_days_normal" rel="normal,extended" />
                                                Book all days</td>
                                        </tr>
                                        <tr>
                                            <td width="169" class="tdclassf" style="text-align:center;" >Extended Day</td>
                                            <?php
                                            for ($i = $selected_camp['start_date']; $i < $selected_camp['end_date']; $i = strtotime('+1 day', $i)):
                                                ?>

                                                <td width="89" rowspan="2" align="center" class="tdclasso extended">
                                                    <input type="checkbox"  class="extended_check booking_checkbox" rel="normal"
                                                           name="friend_days_extended_booked[<?php echo date('w', $i) != 0 ? date('w', $i) : 7 ?>]" id="" value="<?php echo date('w', $i) != 0 ? date('w', $i) : 7 ?>" />
                                                    Book </td>
                                            <?php endfor; ?>
                                        </tr>
                                        <tr>
                                            <td valign="top" class="check_all_wrapper">
                                                <input type="checkbox" name="radio" class="book_all_days book_all_days_extended" rel="extended,normal" />
                                                Book all days</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">&nbsp;</td>
                            </tr>
                        </table>
                </tr>
            </table>
        </td>

    </tr>

</table>