
<h2>Welcome To Admin</h2>
<div>
    <div>
        <h3>Change Company Adress
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url()?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <?php if($success == false):?>
            <form method="post" action="<?php echo base_url()?>companyaddress" enctype="multipart/form-data">
                <table>
                    <tbody>

                        <tr style=" ">
                            <td colspan="2">
                                <div>
                                    <textarea name="address" id="content" style="width: 705px;height: 150px"><?php echo $address;?></textarea>
                                </div>
                                <?php if(form_error('address') != ""):?>
                                    <div class="form_error">
                                        <?php echo form_error('address'); ?>
                                    </div>
                                <?php endif;?>
                            </td>
                        </tr>
                    </tbody></table>


                <br> 
                <input type="hidden" name="txtpageid" value="1">
                <input type="submit" name="Submit" value="Submit" class="button9">
            </form>
        <?php else:?>
            <div>Company address updated successfully.</div>
        <?php endif;?>
    </div>
</div>
