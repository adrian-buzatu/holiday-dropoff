<?php 
    $action = base_url(). "booking/process_paypal";
    
    if($total == 0){
        $action = base_url(). "booking/success?no_paypal=1";
    }
?>
<div class="bookonline-right-content">
    <div class="bookonline-heading-text"><img src="<?php echo asset_url()?>images/book-online-img.png" alt="" />
        <p>You are signed in as <?php echo $user['user'] ?></p>
        <span>
            <a href="#"><img src="<?php echo asset_url()?>images/signoutbt.png" alt="" /></a>
        </span>
    </div>
    <form method="post" action="<?php echo $action;?>">
        <input type="hidden" name="camp_id" value="<?php echo $camp_id?>" />
        <input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="paypal@holidaydropoff.com">
	<input type="hidden" name="currency_code" value="GBP">
	<input type="hidden" name="item_name" value="<?php echo $selected_camp['name']?>">
        <input type="hidden" name="notify_url" value="<?php echo base_url()?>booking/process_paypal">
        <input type="hidden" name="return" value="<?php echo base_url()?>booking/success">
        <input type="hidden" name="cancel" value="<?php echo base_url()?>booking">
        <input type="hidden" name="amount" value="<?php echo number_format((float)$total, 2)?>">
        <div class="bookonline-middle-content">
            <div id="TabbedPanels2" class="TabbedPane2s">
                <ul class="TabbedPanelsTabGroup">
                    <li class="TabbedPanelsTab" tabindex="0"><?php echo $selected_camp['name']?></li>
                </ul>
                <div class="TabbedPanelsContentGroup">
                    <div class="TabbedPanelsContent1">
                        <table style="margin-left:22px;" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            
                            <tr>
                                <td colspan="2">
                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <?php foreach($children as $child):?>
                                            <tr>
                                                <td class="child_style child_name"><?php echo $child['first_name']?> <?php echo $child['last_name']?> </td>
                                            </tr>
                                            <tr>
                                                <td class="child_style">
                                                    Booked for: <?php echo implode(", ", $finalChildren[$child['id']])?>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        <?php if(isset($friend)):?>
                                            <tr>
                                                <td class="child_style child_name"><?php echo $friend['first_name'] ?> <?php echo $friend['last_name'] ?> </td>
                                            </tr>
                                            <tr>
                                                <td class="child_style">
                                                    Booked for: <?php echo implode(", ", $finalChildren[0])?>
                                                </td>
                                            </tr>
                                        <?php endif;?>
                                    </table>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="process_booking__notification" height="40" colspan="2"><span class="red">Please note:</span> 
                                    <ul>
                                        <li>You will receive confirmation of this booking by email</li>
                                        <li>The days marked with <span class='orange'>orange</span> are extended</li>
                                    </ul>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td width="105"><a href="javascript:history.go(-1)"><img src="<?php echo asset_url()?>images/backbt.png" alt="" /></a></td>
<!--                                            <td width="523"><a href="#" onclick="return getPrint();"><img src="<?php echo asset_url()?>images/printpage.png" alt="" /></a></td>-->
                                        </tr>

                                    </table></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="c1"></div>
        </div>
        <div class="bottomblock">
            <div class="total">Total Charge: &pound;<?php echo sprintf('%.2f', $total)?></div>
            <div style="clear:both;"></div>
            <div class="total">Discount: &pound;<?php echo sprintf('%.2f', $discount)?></div>
            <div style="clear:both;"></div>
            <div class="total">Total Without Discount: &pound;<?php echo sprintf('%.2f', $total + $discount)?></div>
            <div class="c1"></div>
            <div class="">
                <input type="hidden" name="discount_amount" value="0.00" />
                <input type="image" src="http://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" 
                       border="0" name="submit" 
                       alt="Make payments with PayPal - it's fast, free and secure!">
            </div>
        </div>
    </form>
    <div class="c1"></div>
</div>