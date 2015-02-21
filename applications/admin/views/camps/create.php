
<h2>Welcome To Admin</h2>
<div>

    <div>
        <h3>Camps
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url()?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <?php if($success == false):?>
        <form method="post" action="<?php echo base_url()?>camps/create" _lpchecked="1">
                <table>
                    <tbody><tr>
                            <td>Camp Group</td>
                            <td>
                                <select name="camp_group_id">
                                    <option value="32">Easter Camp</option>					
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Title :</td>
                            <td>
                                <input type="text" name="name" value=""/>
                            </td>
                        </tr>
                        <tr>
                            <td>Start Date :</td>
                            <td>
                                <input type="text" name="start_date" id="start_date" value="" readonly="true" maxlength="10" class="inputbox"></td>
                        </tr>
                        <tr>
                            <td>End Date :
                            </td><td><input type="text" name="end_date" id="end_date" value="" readonly="true" maxlength="10" class="inputbox"></td>
                        </tr>
                        <tr>
                            <td>Monday Price :
                            </td><td><input type="text" name="price[1]" value="0"></td>
                        </tr>
                        <tr>
                            <td>Tuesday Price :
                            </td><td><input type="text" name="price[2]" value="0"></td>
                        </tr>
                        <tr>
                            <td>Wednesday Price :
                            </td><td><input type="text" name="price[3]" value="0"></td>
                        </tr>
                        <tr>
                            <td>Thursday Price :
                            </td><td><input type="text" name="price[4]" value="0"></td>
                        </tr>
                        <tr>
                            <td>Friday Price :
                            </td><td><input type="text" name="price[5]" value="0"></td>
                        </tr>
                        <tr>
                            <td>Saturday Price :
                            </td><td><input type="text" name="price[6]" value="0"></td>
                        </tr>
                        <tr>
                            <td>Sunday Price :
                            </td><td><input type="text" name="price[7]" value="0"></td>
                        </tr>
                        <tr>
                            <td>Book All Price :
                            </td><td><input type="text" name="price[8]" value="0"></td>
                        </tr>
                        <tr>
                            <td>Extra Details :
                            </td>
                            <td>
                                <textarea name="details" id="details" rows="5" cols="50"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <input type="hidden" name="txtcampid" value="0">
                <input type="submit" name="Submit" value="Submit" class="button9">
            </form>
        <?php else: ?>
            <div>Camp added successfully.</div>
        <?php endif; ?>
    </div>
</div>
