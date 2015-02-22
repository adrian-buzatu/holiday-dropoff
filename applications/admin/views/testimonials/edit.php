
<h2>Welcome To Admin</h2>
<div>
    <div>
        <h3>Edit Testimonial
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url()?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <?php if($success == false):?>
            <form method="post" action="<?php echo base_url()?>testimonials/edit/<?php echo $id?>" enctype="multipart/form-data">
                <table>
                    <tbody>
                        <tr>
                            <td>Author :</td>
                            <td>
                                <input type="text" name="name" 
                                       value="<?php echo set_value('name') == '' ? $testimonial['author_name'] :set_value('name')?>" />
                            </td>
                            <td colspan="2">
                                <?php if (form_error('name') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr style=" ">
                            <td colspan="2">
                                <div>
                                    <textarea name="content" id="content" rows="5" cols="50">
                                        <?php echo $testimonial['content'];?>
                                    </textarea>
                                </div>
                                <?php if(form_error('content') != ""):?>
                                    <div class="form_error">
                                        <?php echo form_error('content'); ?>
                                    </div>
                                <?php endif;?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br> 
                <input type="submit" name="Submit" value="Submit" class="button9">
            </form>
        <?php else:?>
            <div>Testimonial updated successfully.</div>
        <?php endif;?>
    </div>
</div>
