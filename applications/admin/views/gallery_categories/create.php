
<h2>Welcome To Admin</h2>
<div>

    <div>
        <h3>Gallery Category
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url()?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <?php if($success == false):?>
            <form method="post" action="<?php echo base_url()?>gallerycategories/create">
                <table>
                    <tbody>
                        <tr>
                            <td>Title :</td>
                            <td>
                                <div>
                                    <input type="text" name="name" value="">
                                </div>
                                <?php if(form_error('name') != ""):?>
                                    <div class="form_error">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                <?php endif;?>
                            </td>                
                        </tr>  
                    </tbody></table>
                <br> 
                <input type="submit" name="Submit" value="Submit" class="button9">
            </form>
        <?php else: ?>
            <div>Gallery Category added successfully.</div>
        <?php endif; ?>
    </div>
</div>
