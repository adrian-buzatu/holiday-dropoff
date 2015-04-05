<?php $days = 0;?>
<div class="price_day_holder">
    <?php for ($i = $startDate; $i <= $endDate; $i = strtotime('+1 day', $i)): $days++;?>

        <div class="strong" style='padding: 5px 0 0 0;'>
            Price for <?php echo date("d/m/Y", $i);?>
        </div>
        <div class="price_tag_camp">
            <input type="text" name="price[<?php echo $i?>]" size="4" class='price_tag_day'
                value='<?php echo isset($camp[$i]) ? $camp[$i] : '1'?>' />
        </div>

    <?php endfor; ?>
    <div class="strong" style='padding: 5px 0 0 0;'>
            Book all price
    </div>
    <div class="price_tag_camp">
        <input type="text" name="price[0]" id='book_all' size="4" value='<?php echo isset($camp[0]) ? $camp[0] : 1 * $days?>' />
    </div>
    
</div>

