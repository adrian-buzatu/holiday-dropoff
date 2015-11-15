
<div class="price_day_holder">
    <?php $weekCount = 0; for ($week = $startDate; $week <= $endDate; $week = strtotime('+1 week', $week)): $weekCount++?>
        <?php $days = 0;?>
        <?php for ($i = $week; ($i < strtotime('+1 week', $week) && $i <= $endDate); $i = strtotime('+1 day', $i)): $days++;?>

            <div class="strong" style='padding: 5px 0 0 0;'>
                Price for <?php echo date("d/m/Y", $i);?>
            </div>
            <div class="price_tag_camp">
                <input type="text" name="price[<?php echo $i?>]" size="4" class='price_tag_day week_<?php echo $weekCount?>'
                    value='<?php echo isset($camp[$i]) ? $camp[$i] : '0'?>' />
            </div>
        <?php endfor; ?>
        <div class="book-all-wrapper">
            <div class="strong">
                    Book all week price
            </div>
            <div class="price_tag_camp">
                <input type="text" name="price[<?php echo $weekCount - 1?>]" class='book_all' size="4" value='<?php echo isset($camp[$weekCount - 1]) ? $camp[$weekCount - 1] : 1 * $days?>' />
            </div>
        </div>
    <?php endfor; ?>
    <input type="hidden" id="full_weeks_no" value="<?php echo $weekCount - 1?>">
    
</div>

