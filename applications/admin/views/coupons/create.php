<div>
    <div>
        <h3>Add Coupon
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url() ?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <!--<a style="text-align:right;" href="pages.php">Back</a>-->
        <?php if($success == false):?>
            <form method="post" action="<?php echo base_url()?>coupons/create">
                <table>
                    <tbody><tr>
                            <td>
                                Coupon Name :
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo set_value('name')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('name') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Coupon Description :
                            </td>
                            <td>
                                <textarea name="description" rows="5" cols="50"><?php echo set_value('description')?></textarea>
                            </td>
                            <td colspan="2">
                                <?php if (form_error('description') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('description'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Coupon Code :
                            </td>
                            <td>
                                <input type="text" name="code" value="<?php echo set_value('code')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('code') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('code'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Coupon Amount :
                            </td>
                            <td>
                                <input type="text" name="amount" value="<?php echo set_value('amount')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('amount') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('amount'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Coupon Type :
                            </td>
                            <td>
                                Amount :<input type="radio" name="type" value="1" <?php if((int)set_value('type') <= 1):?>selected<?php endif;?>>               
                                % of Amount :<input checked="checked" type="radio" name="type" value="2" <?php if(set_value('type') == 2):?>selected<?php endif;?>>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Start Date :
                            </td>
                            <td>
                                <input type="text" name="start_date" id="start_date" value="<?php echo set_value('start_date')?>" readonly="true" maxlength="10" class="inputbox ">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('start_date') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('start_date'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                End Date :
                            </td>
                            <td>
                                <input type="text" name="end_date" id="end_date" value="<?php echo set_value('end_date')?>" readonly="true" maxlength="10" class="inputbox ">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('end_date') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('end_date'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Use :
                            </td>
                            <td>
                                <input type="text" name="use" value="<?php echo set_value('use')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('use') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('use'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody></table>
                <br>
                <input type="hidden" name="txtcampid" value="30">
                <input type="submit" name="Submit" value="Submit" class="button9">
            </form>
        <?php else:?>
            <div>Coupon created successfully</div>
        <?php endif;?>
    </div>
</div>