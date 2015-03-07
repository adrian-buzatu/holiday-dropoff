<form name="addtocartfrm" action="<?php echo base_url()?>booking/process"  method="post">
    <div class="bookonline-right-content">
        <div id="floatMenu">
            <div id="float_div">
                <div id="total_price" class="total">Total Charge: &pound;<span id="total_num">0</span></div>
                <input type="hidden" id="prices_list" value='<?php echo json_encode($prices);?>'>
                <input type="hidden" id="extended_days_fee" value="5" />
                <input type="hidden" name="camp_id" value="<?php echo $selected_camp['id'];?>" />

            </div>
        </div>
        <div class="bookonline-heading-text"><img src="<?php echo asset_url() ?>images/book-online-img.png" alt="" />
            <p>You are signed in as <?php echo $user['user'] ?></p>
            <span>
                <a href="<?php echo controller() ?>logout"><img src="<?php echo asset_url() ?>images/signoutbt.png" alt="" /></a></span></div>
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
                                        <tr>
                                            <td colspan="4">
                                            <?php foreach($children as $child):?>
                                                <table class="child_name_table" rel="<?php echo $child['id']?>">
                                                    <tr>
                                                        <td class="add_holder">
                                                            <img src="<?php echo asset_url() ?>images/add+.png"  alt="" /><?php echo $child['first_name']. " ".$child['last_name'] ?>                               
                                                            <input type="hidden" name="txt_children_tmp_value_<?php echo $child['id']?>" id="txt_children_tmp_value_<?php echo $child['id']?>" value="<?php echo $child['id']?>"  />
                                                            <input type="hidden" name="txt_children_tmpEXT_value_<?php echo $child['id']?>" id="txt_children_tmpEXT_value_<?php echo $child['id']?>" value="<?php echo $child['id']?>"  />
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table id="children_area_<?php echo $child['id']?>" class="hide" >
                                                    <tr>
                                                        <td class="book_for_child_name">Book Camp For: <?php echo $child['first_name']. " ".$child['last_name'] ?>   </td>
                                                    </tr>
                                                </table>
                                                <table id="children_booking_area_<?php echo $child['id']?>" class="hide" >
                                                    <tr>
                                                        <td class="camp_cell" colspan="4" style=""><?php echo $selected_camp['name']?> <?php echo date('m/d/Y', $selected_camp['start_date'])?> - <?php echo date('m/d/Y', $selected_camp['end_date'])?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="booking_cell" colspan="4" align="center" style=" ">
                                                            <table id="children_tbl0" width="620" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:10px;">
                                                                <tr>
                                                                    <td width="174">&nbsp;</td>
                                                                    <?php for($i = $selected_camp['start_date']; 
                                                                            $i < $selected_camp['end_date']; 
                                                                            $i = strtotime('+1 day', $i)):?>
                                                                        <td align="center" valign="bottom" class="booking_calendar_headers"><?php echo date("D d M", $i)?></td>
                                                                    <?php endfor;?>

                                                                </tr>
                                                                <tr>
                                                                    <td width="169" class="tdclassf" style="text-align:center;" >Normal Day</td>
                                                                        <?php
                                                                        for ($i = $selected_camp['start_date']; $i < $selected_camp['end_date']; $i = strtotime('+1 day', $i)):
                                                                            ?>

                                                                            <td width="89" rowspan="2" align="center" class="tdclasso">
                                                                                <input type="checkbox" class="normal_check booking_checkbox" rel="extended"
                                                                                       name="days_booked[<?php echo date('w', $i) != 0 ? date('w', $i) : 7 ?>][<?php echo $child['id']?>]" id="" value="<?php echo date('w', $i) != 0 ? date('w', $i) : 7 ?>" />
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
                                                                                    name="days_extended_booked[<?php echo date('w', $i) != 0 ? date('w', $i) : 7 ?>][<?php echo $child['id']?>]" id="" value="<?php echo date('w', $i) != 0 ? date('w', $i) : 7 ?>" />
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
                                            <?php endforeach;?>
                                        </table>
                                    </td>
                                </tr>
                            <tr>
                                <td colspan="3" class="hide">
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
            <input type="hidden" name="txttotal_price" id="txttotal_price" />
            <div class="total" id="total_price1">Total Charge: &pound;0.00</div>
            <div class="c1"></div>
            <div align="right" style="color:#fff;">Discounts will be show on the next page</div>
            <div class="oncart11" style="display:none;">Update Cart</div>
            <div class="oncart1">
                <input type="hidden" name="txt_children_tmp_1" id="txt_children_tmp_1" value="0" />
                <input type="hidden" name="txt_children_tmp_2" id="txt_children_tmp_2" value="0" />
                <input type="hidden" name="txt_children_tmp_3" id="txt_children_tmp_3" value="0" />
                <input type="submit" class="confirm_booking_submit" value="Confirm Booking" />
            </div>
        </div>
        <div class="c1"></div>
    </div>
</form>