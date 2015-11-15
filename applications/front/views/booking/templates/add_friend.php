<table width="100%" border="0" cellspacing="0" cellpadding="0" style="" id="add_friend_table" >
    <tr>
        <td class="add_friend_btn_holder" width="11%" align="center"><a href="javascript:void(1);" class="add_friend"><img src="<?php echo asset_url() ?>images/add+.png" alt="" /></a></td>
        <td width="50%" class="add_friend_text" style=""><a href="javascript:void(1);" class="add_friend">Add a friend</a> who isnt registered</td>
        <td width="39%"><div id="addfrndmsg">you have <span>not selected</span> to add friend</div></td>
    </tr>
    <tr>
        <td colspan="3">
            <table >
                <tr id="friend" class="<?php if(!isset($children_days_booked[0])):?>hide<?php endif;?>">
                    <td>
                        <table  id="friend_table"  width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="3" class="border_friend_table"></td>
                            </tr>
                            <tr>
                                <td style="margin-left:5%;"></td>
                                <td>Forename:</td>
                                <td width="225">
                                    <input name="first_name" id="first_name" class="afnamebg" type="text" value="<?php echo $friend['first_name']?>" />
                                    <div id="first_name_error" class="child_form_error">&nbsp;</div>
                                </td>
                                <td width="302">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="margin-left:5%;"></td>
                                <td>Surname:</td>
                                <td>
                                    <input name="last_name" id="last_name" class="afnamebg" type="text"  value="<?php echo $friend['last_name']?>"  />
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
                                    <input name="birthdate" id="birthdate" class="afnamebg datepicker" type="text" readonly="" value="<?php echo $friend['birthdate']?>"  /> 
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
                                            <td valign="top"><textarea name="notes" id="notes" class="textbox" cols="" rows=""><?php echo $friend['notes']?></textarea>
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
                                <td class="camp_cell" colspan="4" style=""><?php echo $selected_camp['name'] ?> <?php echo date('d/m/Y', $selected_camp['start_date']) ?> - <?php echo date('d/m/Y', $selected_camp['end_date']) ?></td>
                            </tr>
                            <tr>
                                <td class="booking_cell" colspan="4" align="center" style=" ">
                                     <?php $weekCount = 0; for ($week = $selected_camp['start_date']; $week <= $selected_camp['end_date']; $week = strtotime('+1 week', $week)): $weekCount++?>
                                    <table id="children_tbl_<?php echo $weekCount?>_0" width="620" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:10px;">
                                       
                                        <tr>
                                            <td width="174">&nbsp;</td>
                                            <?php
                                            for ($i = $week; $i < strtotime('+1 week', $week); $i = strtotime('+1 day', $i)):
                                                ?>
                                                <?php if(isset($prices[$i])):?>
                                                    <td align="center" valign="bottom" class="booking_calendar_headers "><?php echo date("D d M", $i)?></td>
                                                <?php endif;?>
                                            <?php endfor; ?>

                                        </tr>
                                        <tr>
                                            <td width="169" class="tdclassf" style="text-align:center;" >Normal Day</td>
                                            <?php
                                            $dayCount = 0;
                                            for ($i = $week; $i < strtotime('+1 week', $week); $i = strtotime('+1 day', $i)):
                                                ?>

                                                <?php if(isset($prices[$i])): $dayCount ++;?>
                                                    <td width="89" rowspan="2" align="center" class="tdclasso normal <?php echo ($prices[$i] == 0) ? 'disabled-entry' : 'show_'. $weekCount?>">
                                                        <input <?php echo ($prices[$i] == 0) ? 'disabled' : ''?> week="<?php echo $weekCount?>" type="checkbox" 
                                                               class="<?php if(isset($children_days_booked[0]['normal']) && in_array($i, $children_days_booked[0]['normal'])):?>js_checked<?php endif;?> normal_check booking_checkbox normal_check_<?php echo $weekCount?>" rel="extended" child="0"
                                                               <?php if(isset($children_days_booked[0]['normal']) && in_array($i, $children_days_booked[0]['normal'])):?>checked<?php endif;?> name="friend_days_booked[<?php echo $weekCount?>][<?php echo $i ?>][0]" id="" value="<?php echo $i ?>" />
                                                                <?php echo ($prices[$i] == 0) ? 'N/A' : 'Book'?> </td>
                                                <?php endif;?>
                                            <?php endfor; ?>

                                        </tr>
                                        <tr>
                                            <td valign="top" class="check_all_wrapper" style="">
                                                <input <?php if(isset($children_days_booked[0]['normal']) && count($children_days_booked[0]['normal']) === $dayCount):?>checked<?php endif;?>  week="<?php echo $weekCount?>" type="checkbox" child="0" name="book_all_normal_friend[<?php echo $weekCount?>][0]" class="book_all_days book_all_days_normal book_all_days_normal_<?php echo $weekCount?>" rel="normal,extended" />
                                                Book all days</td>
                                        </tr>
                                        <tr>
                                            <td width="169" class="tdclassf" style="text-align:center;" >Extended Day</td>
                                            <?php $dayCount = 0;
                                            for ($i = $week; $i < strtotime('+1 week', $week); $i = strtotime('+1 day', $i)):
                                                ?>

                                                <?php if(isset($prices[$i])): $dayCount ++;?>
                                                <td width="89" rowspan="2" align="center" class="tdclasso extended <?php echo ($prices[$i] == 0) ? 'disabled-entry' : 'show_'. $weekCount?>">
                                                    <input <?php echo ($prices[$i] == 0) ? 'disabled' : ''?> week="<?php echo $weekCount?>" type="checkbox"  
                                                           <?php if(isset($children_days_booked[0]['extended']) && in_array($i, $children_days_booked[0]['extended'])):?>checked<?php endif;?> 
                                                        class="<?php if(isset($children_days_booked[0]['extended']) && in_array($i, $children_days_booked[0]['extended'])):?>js_checked<?php endif;?> extended_check booking_checkbox extended_check_<?php echo $weekCount?>" rel="normal" child="0"
                                                        name="friend_days_extended_booked[<?php echo $weekCount?>][<?php echo $i ?>][0]" id="" value="<?php echo $i ?>" />
                                                            <?php echo ($prices[$i] == 0) ? 'N/A' : 'Book'?> </td>
                                                <?php endif;?>
                                            <?php endfor; ?>
                                        </tr>
                                        <tr>
                                            <td valign="top" class="check_all_wrapper">
                                                <input <?php if(isset($children_days_booked[0]['extended']) && count($children_days_booked[0]['extended']) === $dayCount):?>checked<?php endif;?>  week="<?php echo $weekCount?>" type="checkbox" child="0" name="book_all_extended_friend[<?php echo $weekCount?>][0]" class="book_all_days book_all_days_extended book_all_days_extended_<?php echo $weekCount?>" rel="extended,normal" child="0" />
                                                Book all days</td>
                                        </tr>
                                        
                                    </table>
                                    <?php endfor;?>
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