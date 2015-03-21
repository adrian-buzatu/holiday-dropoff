(function(window, $, undefined) {
    $(document).ready(function(){
        var prices_list = jQuery.parseJSON($("#prices_list").val());
        var extended_days_fee = $("#extended_days_fee").val();
        $('.datepicker').datepicker({ changeYear: true });
        $('.add_friend').click(function(){
            if($("#friend").hasClass('hide')){
                $("#friend").removeClass('hide');
            } else {
                $("#friend").addClass('hide');
            }
        })
        $('.child_name_table').click(function(){
            childId = $(this).attr('rel');
            if($('#children_area_' + childId).hasClass('hide')){
                $('#children_area_' + childId).removeClass('hide');
                $('#children_booking_area_' + childId).removeClass('hide');
            } else {
                $('#children_area_' + childId).addClass('hide');
                $('#children_booking_area_' + childId).addClass('hide');
            }
        });
        $('.book_all_days').click(function(){
            type_raw = $(this).attr('rel');
            type_arr = type_raw.split(",");
            type = type_arr[0];
            book_all_to_uncheck = type_arr[1];
            parent_element = $(this).parent().
                    parent().parent().parent().
                    parent().parent().parent().
                    parent();
            if(typeof $(this).attr('checked') != 'undefined'){
                var to_remove = 0;
                parent_element.find('.booking_checkbox.js_checked').each(function(){
                   to_remove += prices_list[$(this).val()] * 1;
                });
                console.log(to_remove, parent_element.find('.booking_checkbox.js_checked').length);
                var current_total = $("#total_num").text() * 1 - to_remove;
                $("#total_num").text(current_total + prices_list[8] * 1);
                $("#total_num_bottom").text(current_total + prices_list[8] * 1);
                parent_element.find('.booking_checkbox').removeAttr('checked');
                parent_element.find('.booking_checkbox').removeClass('js_checked');
                $(".book_all_days_" + book_all_to_uncheck).removeAttr('checked');
                $(".book_all_days_" + book_all_to_uncheck).removeClass('js_checked');
                parent_element.find('.' + type + '_check').attr('checked', 'checked');
                parent_element.find('.' + type + '_check').addClass('js_checked');
                
                console.log('unchecked');
            } else {
                console.log('checked');
                var current_total = $("#total_num").text() * 1;
                $("#total_num").text(current_total - prices_list[8] * 1);
                $("#total_num_bottom").text(current_total - prices_list[8] * 1);
                parent_element.find('.' + type + '_check').removeAttr('checked');
                parent_element.find('.' + type + '_check').removeClass('js_checked');
            }
            
        });
        $(".booking_checkbox").click(function(){
            var day = $(this).val();
            var target = $(this).attr('rel');
            var type = target == 'extended' ? 'normal' : 'extended';
            var parent_element = $(this).parent().
                    parent().parent().parent().
                    parent().parent().parent().
                    parent();
            if(typeof $(this).attr('checked') != 'undefined'){
                parent_element.find('.' + target + '_check').each(function(){
                   if($(this).val() == day){
                       $(this).removeAttr('checked');
                       $(this).removeClass('js_checked');
                   } 
                });
                $(this).addClass('js_checked');
                var current_total = $("#total_num").text() * 1;
                $("#total_num").text(current_total + prices_list[day] * 1);
                $("#total_num_bottom").text(current_total + prices_list[day] * 1);
                if(parent_element.find('.' + type + '_check:checked').length == 7){
                    parent_element.find('.book_all_days_' + type).attr('checked', 'checked');
                    var current_total = $("#total_num").text() * 1;
                    $("#total_num").text(current_total - prices_list[9] * 1);
                    $("#total_num_bottom").text(current_total - prices_list[9] * 1);
                }
            } else {
                var current_total = $("#total_num").text() * 1;
                $("#total_num").text(current_total - prices_list[day] * 1);
                $(this).removeClass('js_checked');
                $("#total_num_bottom").text(current_total - prices_list[day] * 1);
                if(parent_element.find('.' + type + '_check:checked').length == 6){
                    parent_element.find('.book_all_days_' + type).removeAttr('checked');
                    $("#total_num").text(current_total - (prices_list[day] * 1) + prices_list[9] * 1);
                    $("#total_num_bottom").text(current_total - (prices_list[day] * 1) + prices_list[9] * 1);
                } 
                
            }
        });
    });
})(this, jQuery);