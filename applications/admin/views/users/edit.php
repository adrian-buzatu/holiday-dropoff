<h2>Welcome To Admin</h2>
<div>
    <div>
        <h3>User Detail
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url()?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <?php if($success == false):?>
            <form method="post" action="<?php echo base_url()?>users/edit/<?php echo $id?>" enctype="multipart/form-data">
                <table width="100%" cellspacing="4" cellpadding="0" border="0" class="tbl">
                    <tbody>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Title</td>
                            <td width="85%">
                                <select name="title">
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Forename</td>
                            <td width="85%">
                                <input type="text" name="first_name" value="<?php echo set_value('first_name') == '' ? $user['first_name'] :set_value('first_name')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('first_name') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('first_name'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Surname</td>
                            <td width="85%">
                                <input type="text" name="last_name" value="<?php echo set_value('last_name') == '' ? $user['first_name'] :set_value('first_name')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('last_name') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('last_name'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Username</td>
                            <td width="85%">
                                <input type="text" name="username" value="<?php echo set_value('username') == '' ? $user['username'] :set_value('username')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('username') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('username'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Email</td>
                            <td width="85%">
                                <input type="text" name="email" value="<?php echo set_value('email') == '' ? $user['email'] :set_value('email')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('email') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Landline</td>
                            <td width="85%">
                                <input type="text" name="landline" value="<?php echo set_value('landline') == '' ? $user['landline'] :set_value('landline')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('landline') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('landline'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Mobile</td>
                            <td width="85%">
                                <input type="text" name="phone_number" value="<?php echo set_value('phone_number') == '' ? $user['phone_number'] :set_value('phone_number')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('phone_number') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('phone_number'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Address1</td>
                            <td width="85%">
                                <input type="text" name="address1" value="<?php echo set_value('address1') == '' ? $user['address1'] :set_value('address1')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('address1') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('address1'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Address2</td>
                            <td width="85%">
                                <input type="text" name="address2" value="<?php echo set_value('address2') == '' ? $user['address2'] :set_value('address2')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('address2') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('address2'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Address3</td>
                            <td width="85%">
                                <input type="text" name="address3" value="<?php echo set_value('address3') == '' ? $user['address3'] :set_value('address3')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('address3') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('address3'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Postcode</td>
                            <td width="85%">
                                <input type="text" name="zip" value="<?php echo set_value('zip') == '' ? $user['zip'] :set_value('zip')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('zip') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('zip'); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Country</td>
                            <td width="85%">
                                <select name="country_id">
                                    <?php foreach($countries as $id => $country):?>
                                        <option 
                                            <?php if($user['country_id'] == $id || (set_value('country_id')) != "" && (set_value('country_id')) == $id):?>selected<?php endif;?>
                                            value="<?php echo $id?>"><?php echo $country?></option>
                                    <?php endforeach;?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="categories-form-content" align="right" width="15%">Reference</td>
                            <td width="85%">
                                <input type="text" name="reference" value="<?php echo set_value('reference') == '' ? $user['reference'] :set_value('reference')?>">
                            </td>
                            <td colspan="2">
                                <?php if (form_error('reference') != ""): ?>
                                    <div class="form_error">
                                        <?php echo form_error('reference'); ?>
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
                    </tbody>
                </table>
            </form>
        <?php else:?>
            <div>User updated succesfully</div>
        <?php endif;?>
    </div>
</div>