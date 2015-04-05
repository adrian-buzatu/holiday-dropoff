
<h2>Welcome To Admin</h2>
<div>

    <div>
        <h3>Camps
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url() ?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <?php if ($success == false): ?>
            <form method="post" action="<?php echo base_url() ?>camps/create" _lpchecked="1">
                <table>
                    <tbody><tr>
                            <td>Camp Group</td>
                            <td>
                                <select name="camp_group_id">
                                    <?php foreach ($campGroups as $id => $campGroup): ?>
                                        <option value="<?php echo $id ?>"><?php echo $campGroup ?></option>	
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Title :</td>
                            <td>
                                <input type="text" name="name" value="<?php echo set_value('name') ?>"/>
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
                            <td>Start Date :</td>
                            <td>
                                <input type="text" name="start_date" id="start_date" value="<?php echo set_value('start_date') ?>" readonly="true" maxlength="10" class="inputbox">
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
                            <td>End Date :
                            </td>
                            <td>
                                <input type="text" name="end_date" id="end_date" value="<?php echo set_value('end_date') ?>" readonly="true" maxlength="10" class="inputbox">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('end_date') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('end_date'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
<!--                        <tr>
                            <td>Monday Price :
                            </td>
                            <td>
                                <input type="text" name="price[1]" value="<?php echo (int) set_value('price[1]') ?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('price[1]') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('price[1]'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tuesday Price :
                            </td>
                            <td>
                                <input type="text" name="price[2]" value="<?php echo (int) set_value('price[2]') ?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('price[2]') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('price[2]'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Wednesday Price :
                            </td>
                            <td>
                                <input type="text" name="price[3]" value="<?php echo (int) set_value('price[3]') ?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('price[3]') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('price[3]'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Thursday Price :
                            </td>
                            <td>
                                <input type="text" name="price[4]" value="<?php echo (int) set_value('price[4]') ?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('price[4]') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('price[4]'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Friday Price :
                            </td>
                            <td>
                                <input type="text" name="price[5]" value="<?php echo (int) set_value('price[5]') ?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('price[5]') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('price[5]'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Saturday Price :
                            </td>
                            <td>
                                <input type="text" name="price[6]" value="<?php echo (int) set_value('price[6]') ?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('price[6]') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('price[6]'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Sunday Price :
                            </td>
                            <td>
                                <input type="text" name="price[7]" value="<?php echo (int) set_value('price[7]') ?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('price[7]') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('price[7]'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Book All Price :
                            </td>
                            <td>
                                <input type="text" name="price[8]" value="<?php echo (int) set_value('price[8]') ?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('price[8]') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('price[8]'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>-->
                        <tr>
                            
                            <td>
                                <a href="javascript:void(0);" id="set_camp_prices">Set Camp Prices</a>
                            </td>
                            <td>
                                &nbsp;
                            </td>
                            <td colspan="2">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            
                            <td>
                                <div id="camp_prices_holder">
                                    
                                </div>
                            </td>
                            <td>
                                &nbsp;
                            </td>
                            <td colspan="2">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td>Extra Details :
                            </td>
                            <td>
                                <textarea name="details" id="details" rows="5" cols="50"><?php echo set_value('details') ?></textarea>
                            </td>
                            <td colspan="2">
                                <?php if (form_error('name') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <input type="hidden" name="camp_id" value="0">
                <input type="submit" name="Submit" value="Submit" class="button9">
            </form>
        <?php else: ?>
            <div>Camp added successfully.</div>
        <?php endif; ?>
    </div>
</div>
