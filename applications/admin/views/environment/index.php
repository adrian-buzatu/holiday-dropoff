
<h2>Welcome To Admin</h2>
<div>
    <div>
        <h3>Change Notification Email
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url()?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <?php if($success == false):?>
            <form method="post" action="<?php echo base_url()?>environment" enctype="multipart/form-data">
                <table>
                    <tbody>

                        <tr style=" ">
                            <td colspan="2">
                                <div>
                                    <select name="env" id="env">
                                        <option value="dev" <?php echo $env == 'dev' ? 'selected' : ''?>>Devel</option>
                                        <option value="prod" <?php echo $env == 'prod' ? 'selected' : ''?>>Production</option>
                                    </select>
                                </div>
                                <?php if(form_error('env') != ""):?>
                                    <div class="form_error">
                                        <?php echo form_error('env'); ?>
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
