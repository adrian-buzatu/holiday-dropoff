
<h2>Welcome To Admin</h2>
<div>
    <div>
        <h3>Add Gallery Photo
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url() ?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <?php if ($success == false): ?>
            <form method="post" action="<?php echo base_url()?>gallery/create" enctype="multipart/form-data">
                <table width="100%" cellspacing="4" cellpadding="0" border="0" class="tbl">
                    <tbody>
                        <tr>
                            <td class="categories-form-content" align="right">
                                <div class="form_label">Category</div>
                            </td>
                            <td>
                                <select name="gallery_category_id">
                                    <?php foreach ($galleryCategories as $id => $galleryCategory): ?>
                                    <option <?php if($id == set_value('gallery_category_id')):?>selected<?php endif;?> value="<?php echo $id ?>"><?php echo $galleryCategory ?></option>	
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Title</td>
                            <td width="85%"><input type="text" name="title" value="<?php echo set_value('title') ?>"></td>
                            <td colspan="2">
                                <?php if (form_error('title') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('title'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class=" categories-form-content" id="heading" align="right" valign="top">
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
                        <tr>
                            <td>&nbsp;</td>
                            <td align="left">
                                <input type="submit" name="btnsubmit" value="Submit" class="button9">
                            </td>
                        </tr>
                    </tbody></table>
            </form>
        <?php else:?>
            <div>Gallery photo added successfully.</div>
        <?php endif;?>
    </div>
</div>
