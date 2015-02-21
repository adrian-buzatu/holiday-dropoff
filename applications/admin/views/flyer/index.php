
<h2>Welcome To Admin</h2>
<div>
    <div>
        <h3>Download Our HDO E-Flyer
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url()?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
        <?php if($success == false):?>
            <form method="post" action="<?php echo base_url()?>flyer" enctype="multipart/form-data">
                <table>
                    <tbody>
                        <tr style=" ">
                            <td>Upload PDF File</td>                            
                            <td>
                                <input type="file" name="flyer" />
                                <?php if(is_array($flyer)):?>
                                    <a href="<?php echo base_url()?>download/get/<?php echo $flyer['file']?>">Click Here to Download file</a>				
                                <?php endif;?>
                            </td>
                        </tr>

                    </tbody>
                </table>            <br> 
                <input type="submit" name="Submit" value="Submit" class="button9">
            </form>
        <?php else:?>
            <div>Flyer uploaded successfully.</div>
        <?php endif;?>
    </div>
</div>
