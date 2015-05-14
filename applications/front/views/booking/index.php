<form name="addtocartfrm" action="<?php echo base_url()?>booking/process" id="js-booking-form"  method="post">
    <div class="bookonline-right-content">
        <div id="floatMenu">
            <div id="float_div">
                <div id="total_price" class="total">Total Charge: &pound;<span id="total_num"><?php echo number_format((float)$total, 2)?></span></div>
                <input type="hidden" id="prices_list" value='<?php echo json_encode($prices);?>'>
                <input type="hidden" id="extended_days_fee" value="5" />
                <input type="hidden" name="camp_id" value="<?php echo $selected_camp['id'];?>" />

            </div>
        </div>
        <div class="bookonline-heading-text"><img src="<?php echo asset_url() ?>images/book-online-img.png" alt="" />
            <p>You are signed in as <?php echo $user['user'] ?></p>
            <span>
                <a href="<?php echo base_url() ?>logout"><img src="<?php echo asset_url() ?>images/signoutbt.png" alt="" /></a></span></div>
        <div class="bookonline-middle-content">
            <div id="TabbedPanels2" class="TabbedPane2s">
                <ul class="TabbedPanelsTabGroup">
                    <?php foreach ($camps as $camp): ?>
                        <li class="TabbedPanelsTab <?php if ($camp['selected'] == true): ?>TabbedPanelsTabSelected<?php endif; ?>" tabindex="0" >
                            <a href="<?php echo base_url() ?>booking/<?php echo $camp['id'] ?>"><?php echo $camp['name'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="TabbedPanelsContentGroup">
                    <div class="TabbedPanelsContent1">
                        <div class="bcodebg">Promotional Code
                            <input name="txtcoupon_code" type="text">
                        </div>
                        <div style="clear:both;"></div>
                        <table width="644" border="0" cellpadding="0" cellspacing="0" class="bgcolor">
                            <tr>
                                <td colspan="3">
                                    <table width="615" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-top:15px; margin-left:10px;">
                                        <tr>
                                            <td width="123" rowspan="3" colspan="3" valign="top" style="font-weight:normal; font-size:14px; padding-top:0px;">Please select your children</td>
                                            <td width="211" class="normal_extended_box">Normal Day:      9am - 4pm</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:2px;"></td>
                                        </tr>
                                        <tr>
                                            <td class="normal_extended_box">Extended Day:  8am - 5pm</td>
                                        </tr>
                                        <tr>
                                            <td style="line-height: 14px;"  colspan="4">&nbsp;</td>
                                        </tr>
                                        <?php if(is_array($children)):?>
                                            <tr>
                                                <td colspan="4">
                                                <?php foreach($children as $child):?>
                                                    <table class="child_name_table" rel="<?php echo $child['id']?>">
                                                        <tr>
                                                            <td class="add_holder">
                                                                <img src="<?php echo asset_url() ?>images/add+.png"  alt="" /><?php echo $child['first_name']. " ".$child['last_name'] ?>                               
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table id="children_area_<?php echo $child['id']?>" class="<?php if(!isset($children_days_booked[$child['id']])):?>hide<?php endif;?>" >
                                                        <tr>
                                                            <td class="book_for_child_name">Book Camp For: <?php echo $child['first_name']. " ".$child['last_name'] ?>   </td>
                                                        </tr>
                                                    </table>
                                                    <table id="children_booking_area_<?php echo $child['id']?>" class="<?php if(!isset($children_days_booked[$child['id']])):?>hide<?php endif;?>" >
                                                        <tr>
                                                            <td class="camp_cell" colspan="4" style=""><?php echo $selected_camp['name']?> <?php echo date('d/m/Y', $selected_camp['start_date'])?> - <?php echo date('d/m/Y', $selected_camp['end_date'])?></td>
                                                        </tr>
                                                        <?php $weekCount = 0; for ($week = $selected_camp['start_date']; $week <= $selected_camp['end_date']; $week = strtotime('+1 week', $week)): $weekCount++?>
                                                        <tr>
                                                            
                                                            <td class="booking_cell" colspan="4" align="center" style=" ">
                                                                
                                                                <table id="children_tbl_<?php echo $weekCount?>_<?php echo $child['id']?>" width="620" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:10px;">
                                                                    
                                                                    <tr>
                                                                        <td width="174">&nbsp;</td>
                                                                        <?php
                                                                                for ($i = $week; $i < strtotime('+1 week', $week); $i = strtotime('+1 day', $i)):
                                                                                    ?>
                                                                                    <?php if(isset($prices[$i])):?>
                                                                                        <td align="center" valign="bottom" class="booking_calendar_headers <?php echo ($prices[$i] == 0) ? 'hide' : ''?>"><?php echo date("D d M", $i)?></td>
                                                                                    <?php endif;?>
                                                                        <?php endfor;?>

                                                                    </tr>
                                                                     
                                                                        <tr>
                                                                            <td width="169" class="tdclassf" style="text-align:center;" >Normal Day</td>
                                                                                <?php $dayCount = 0;
                                                                                for ($i = $week; $i < strtotime('+1 week', $week); $i = strtotime('+1 day', $i)):
                                                                                    
                                                                                    ?>
                                                                                    <?php if(isset($prices[$i])):$dayCount ++;?>
                                                                                        <td width="89" rowspan="2" align="center" class="tdclasso normal <?php echo ($prices[$i] == 0) ? 'hide' : 'show show_'. $weekCount?>">
                                                                                            <input week="<?php echo $weekCount?>" type="checkbox" 
                                                                                                   class="<?php if(isset($children_days_booked[$child['id']]['normal']) && in_array($i, $children_days_booked[$child['id']]['normal'])):?>js_checked<?php endif;?> normal_check booking_checkbox normal_check_<?php echo $weekCount?>" rel="extended" child="<?php echo $child['id']?>"
                                                                                              <?php if(isset($children_days_booked[$child['id']]['normal']) && in_array($i, $children_days_booked[$child['id']]['normal'])):?>checked<?php endif;?>      name="days_booked[<?php echo $weekCount?>][<?php echo $i ?>][<?php echo $child['id']?>]" id="" value="<?php echo $i ?>" />
                                                                                                    Book </td>
                                                                                    <?php endif;?>
                                                                                <?php endfor; ?>

                                                                        </tr>
                                                                        <tr>
                                                                            <td valign="top" class="check_all_wrapper" style="">
                                                                                <input <?php if(isset($children_days_booked[$child['id']]['normal']) && count($children_days_booked[$child['id']]['normal']) === $dayCount):?>checked<?php endif;?> week="<?php echo $weekCount?>" type="checkbox" child="<?php echo $child['id']?>" name="book_all_normal[<?php echo $weekCount?>][<?php echo $child['id']?>]" class="book_all_days book_all_days_normal book_all_days_normal_<?php echo $weekCount?>" rel="normal,extended" />
                                                                                Book all days</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td width="169" class="tdclassf" style="text-align:center;" >Extended Day</td>
                                                                             <?php $dayCount = 0;
                                                                                for ($i = $week; $i < strtotime('+1 week', $week); $i = strtotime('+1 day', $i)):
                                                                                    ?>
                                                                                    <?php if(isset($prices[$i])):$dayCount ++;?>
                                                                                    <td width="89" rowspan="2" align="center" class="tdclasso extended <?php echo ($prices[$i] == 0) ? 'hide' : 'show show_'. $weekCount?>">
                                                                                        <input <?php if(isset($children_days_booked[$child['id']]['extended']) && in_array($i, $children_days_booked[$child['id']]['extended'])):?>checked<?php endif;?> week="<?php echo $weekCount?>" type="checkbox"  
                                                                                            class="<?php if(isset($children_days_booked[$child['id']]['extended']) && in_array($i, $children_days_booked[$child['id']]['extended'])):?>js_checked<?php endif;?> extended_check booking_checkbox extended_check_<?php echo $weekCount?>" rel="normal" child="<?php echo $child['id']?>"
                                                                                            name="days_extended_booked[<?php echo $weekCount?>][<?php echo $i ?>][<?php echo $child['id']?>]" id="" value="<?php echo $i ?>" />
                                                                                                Book </td>
                                                                                    <?php endif;?>
                                                                                <?php endfor; ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <td valign="top" class="check_all_wrapper">
                                                                                <input <?php if(isset($children_days_booked[$child['id']]['extended']) && count($children_days_booked[$child['id']]['extended']) === $dayCount):?>checked<?php endif;?> week="<?php echo $weekCount?>" type="checkbox" child="<?php echo $child['id']?>" name="book_all_extended[<?php echo $weekCount?>][<?php echo $child['id']?>]" class="book_all_days book_all_days_extended book_all_days_extended_<?php echo $weekCount?>" rel="extended,normal" child="<?php echo $child['id']?>" />
                                                                                Book all days</td>
                                                                        </tr>
                                                                        <tr><?php
                                                                                for ($i = $week; $i < strtotime('+1 week', $week); $i = strtotime('+1 day', $i)):
                                                                                    ?>
                                                                                    <?php if(isset($prices[$i])):?>
                                                                                    <td>&nbsp;</td>
                                                                                    <?php endif;?>
                                                                            <?php endfor; ?>
                                                                        </tr>
                                                                    
                                                                </table>
                                                            </td>
                                                            
                                                        </tr>
                                                        <?php endfor; ?>
                                                        <tr>
                                                            <td colspan="4">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                <?php endforeach;?>
                                                </td>
                                            </tr>
                                        <?php else:?>
                                            <tr>
                                                <td>You added no children</td>
                                            </tr>
                                        <?php endif;?>
                                        </table>
                                    </td>
                                </tr>
                            <tr>
                                <td colspan="3">
                                    <?php echo $add_friend?>
                                </td>

                            </tr>
                        </table>
                          
                    </div>
                    <div class="TabbedPanelsContent1" style="display:none;">Content 2</div>
                </div>
            </div>
            <div class="c1"></div>
        </div>
        <div class="bottomblock">
            <div class="total" id="total_price1">Total Charge: &pound;<span id="total_num_bottom"><?php echo number_format((float)$total, 2)?></span></div>
            <div class="c1"></div>
            <div align="right" style="color:#fff;">Discounts will be show on the next page</div>
            <div class="oncart11" style="display:none;">Update Cart</div>
            <div class="oncart1">
               
                <input type="submit" class="confirm_booking_submit" value="Confirm Booking" />
            </div>
        </div>
        <div class="c1"></div>
    </div>
</form>