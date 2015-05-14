
<h2>Welcome To Admin</h2>
<div>
    <div>
        <h3>Change Notification Email
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url()?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <?php if($success == false):?>
            <form method="post" action="<?php echo base_url()?>notificationemail" enctype="multipart/form-data">
                <table>
                    <tbody>

                        <tr style=" ">
                            <td colspan="2">
                                <div>
                                    <input name="email" size="50" id="notification_email" value="<?php echo $email;?>" />
                                </div>
                                <?php if(form_error('email') != ""):?>
                                    <div class="form_error">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                <?php endif;?>
                            </td>
                        </tr>
                    </tbody></table>

                <input type="submit" name="Submit" value="Submit" class="button9">
            </form>
        <?php else:?>
            <div>Notification email updated successfully.</div>
        <?php endif;?>
    </div>
</div>
