<div class="bookonline-right-content">
    <div class="bookonline-heading-text"><img src="<?php echo asset_url()?>images/book-online-img.png" alt="" />
        <p>You are signed in as <?php echo $user['user'] ?></p>
        <span>
            <a href="#"><img src="<?php echo asset_url()?>images/signoutbt.png" alt="" /></a>
        </span>
    </div>
    <form method="post" action="https://www.sandbox.paypal.com/webscr">
        <input type="hidden" name="camp_id" value="<?php echo $camp_id?>" />
        <input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="Paypal-facilitator@holidaydropoff.com">
	<input type="hidden" name="currency_code" value="GBP">
	<input type="hidden" name="item_name" value="<?php echo $selected_camp['name']?>">
        <input type="hidden" name="notify_url" value="<?php echo base_url()?>booking/process_paypal">
        <input type="hidden" name="return" value="<?php echo base_url()?>booking/success">
        <input type="hidden" name="cancel" value="<?php echo base_url()?>booking/cancel">
        <input type="hidden" name="amount" value="<?php echo $total?>">
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
                                                <td class="child_style"><?php echo $child['first_name']?> <?php echo $child['last_name']?> </td>
                                            </tr>
                                        <?php endforeach;?>
                                        <?php if(isset($friend)):?>
                                            <tr>
                                                <td class="child_style"><?php echo $friend['first_name'] ?> <?php echo $friend['last_name'] ?> </td>
                                            </tr>
                                        <?php endif;?>
                                    </table>
                                </td>
                            </tr>
                            
                            <tr>
                                <td height="40" colspan="2">Please note: You will receive confirmation of this booking by email</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Please note: Pressing the back button will delete all selected dates
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td width="105"><a href="<?php echo base_url()?>"><img src="<?php echo asset_url()?>images/backbt.png" alt="" /></a></td>
                                            <td width="523"><a href="#" onclick="return getPrint();"><img src="<?php echo asset_url()?>images/printpage.png" alt="" /></a></td>
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
            <div class="total">Total Charge: &pound;<?php echo $total?></div>
            <div style="clear:both;"></div>
            <div class="total">Discount: &pound;<?php echo $discount?></div>
            <div style="clear:both;"></div>
            <div class="total">Total Without Discount: &pound;<?php echo $total + $discount?></div>
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