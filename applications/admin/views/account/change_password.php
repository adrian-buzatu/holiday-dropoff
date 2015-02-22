
<h2>Welcome To Admin</h2>
<div>

    <div style="color: #FF0000; margin-bottom:-16px; padding-left: 127px; padding-top: 14px;">				 </div>
    <?php if($success == false):?>
        <form method="post" action="<?php echo base_url()?>account/change_password">	
            <table align="left" style="padding:10px 0px 0px 0px;" cellpadding="5" cellspacing="5">
                <tbody><tr>
                        <td class="categories-form-content">Old Password :</td>
                        <td><input type="password" class="input2" name="old_pass"></td>
                        <td colspan="2">
                            <?php if (form_error('old_pass') != ""): ?>
                                <div class="form_error">
                                    <?php echo form_error('old_pass'); ?>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="categories-form-content">New Passsword :</td>
                        <td><input type="password" name="new_pass" class="input2" value="" ></td>
                        <td colspan="2">
                            <?php if (form_error('new_pass') != ""): ?>
                                <div class="form_error">
                                    <?php echo form_error('new_pass'); ?>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="categories-form-content">Confirm New Passsword :</td>
                        <td><input type="password" name="passconf" class="input2" value="" ></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="Submit" value="Submit" class="button9" style="margin-left:139px;">
                        </td>
                    </tr>
                </tbody></table> 
        </form>
    <?php else:?>
        <div>You have changed your password successfully!</div>
    <?php endif;?>

</div>
