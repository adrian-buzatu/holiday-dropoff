
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
            <div class="strong">
                    Daily discount for full week
            </div>
            <div class="price_tag_camp">
                <input type="text" name="daily_discount_for_full_week[<?php echo $weekCount - 1?>]" class='daily_discount_for_full_week_<?php echo $weekCount - 1?>' size="4" value='0' readonly />
            </div>
        </div>
    <?php endfor; ?>
    <input type="hidden" id="full_weeks_no" value="<?php echo $weekCount - 1?>">
    
</div>
<script type="text/javascript">
$('.book_all').on('keyup', function(){
    var week_total = parseInt($(this).val());
    console.log($(this).val());
    var week_number = parseInt($(this).attr('name').replace(/[a-z\[]+/,'').substr(0,1)) + 1;
    var week_sum = 0;
    $('.week_' + week_number + '[value!=0]').each(function(){
       week_sum += parseInt($(this).val()); 
    });
    if(week_total < week_sum){
        $('.daily_discount_for_full_week_' + (week_number - 1)).val(
            (week_sum - week_total) / ($('.week_' + week_number + '[value!=0]').length)
        );
    }
});
</script>

