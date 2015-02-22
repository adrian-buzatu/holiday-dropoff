
<h2>Welcome To Admin</h2>
<div>
    <div>
        <h3>Add News
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url()?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <?php if($success == false):?>
            <form method="post" action="<?php echo base_url()?>news/create" enctype="multipart/form-data">
                <table>
                    <tbody>
                        <tr>
                            <td class=" categories-form-content" id="heading" align="left" valign="top">Title :</td>
                            <td>
                                <input type="text" name="title" value="<?php echo set_value('title') ?>"/>
                            </td>
                            <td colspan="2">
                                <?php if (form_error('title') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('title'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class=" categories-form-content" id="heading" align="left" valign="top">
                                <div class="form_label">Upload Image</div>
                            </td>
                            <td class="form_banner_image">
                                <input type="file" name="image">
                            </td>
                            <td colspan="2">
                                <?php if (isset($error)): ?>
                                    <div class="form_error img_form_error">
                                        <?php echo $error; ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr style=" ">
                            <td colspan="2">
                                <div>
                                    <textarea name="content" id="content" rows="5" cols="50">
                                        
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
            <div>News created successfully.</div>
        <?php endif;?>
    </div>
</div>
