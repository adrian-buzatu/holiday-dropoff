
<h2>Welcome To Admin</h2>
<div>

    <div>
        <h3>Report
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url()?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <form method="post" action="<?php echo base_url()?>report" _lpchecked="1">
            <table>
                <tbody><tr>
                        <td>Select a camp</td>
                        <td>
                            <select name="camp_id">
                                <?php foreach($camps as $id => $camp):?>
                                    <option value="<?php echo $id?>"><?php echo $camp;?></option>	
                                <?php endforeach;?>				
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Start Date :</td>
                        <td>
                            <input type="text" name="start_date" id="start_date" 
                                value="" readonly="true" maxlength="10" class="inputbox">
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
                            <input type="text" name="end_date" id="end_date" 
                            value="" readonly="true" maxlength="10" class="inputbox">
                        </td>
                        <td colspan="2">
                            <?php if (form_error('end_date') != ""): ?>
                                <div class="form_error">
                                    <?php echo form_error('end_date'); ?>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>

                </tbody>
            </table>
            <br>

            <input type="submit" name="Submit" value="Get Report" class="button9">
        </form>
    </div>
</div>
