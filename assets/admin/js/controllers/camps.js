var Camps = function() {
    
    this.config = {
        base_url: $('body').attr("base-url"),
        camp_prices_holder: $("#camp_prices_holder")
    }
    
    this.post = {
        camp_id: $("#camp_id").val()
    }
    
    this.accesors = {
        start_date: $('#start_date'),
        end_date: $('#end_date')
    }
    
    this.setDatePicker = function(){
        $('#start_date').datepicker({ minDate: -20, onSelect: function() {
            $("#set_camp_prices").trigger('click')
        }});
        $('#end_date').datepicker({ minDate: -20, onSelect: function() {
            $("#set_camp_prices").trigger('click')
        } });
    }
    
    this.events = function(){
        var me = this;
        $("#set_camp_prices").on('click', function(){
            me.config.camp_prices_holder.html('');
            var startDate = me.accesors.start_date.val();
            var endDate = me.accesors.end_date.val();
            if(me.config.camp_prices_holder.text().replace(/\s/g, '') !== ''){
                return false;
            }
            if(startDate === '' || endDate === ''){
                alert("Please specify a start and an end date");
                return false;
            }
            
            $.ajax({
                url: me.config.base_url + "camps/set_prices",
                type: "POST",
                dataType: "json",
                data: "start_date=" + startDate + "&end_date=" + endDate + "&camp_id=" + me.post.camp_id,
                success: function(response){
                    html = response.output;                    
                    me.config.camp_prices_holder.html(html);
                    
                }
            });
        });
        $(document).on('dblclick', '.price_tag_day', function(){
            $('.price_tag_day').val($(this).val());
            var default_full_weeks_price = ( $('.price_tag_day').length * $(this).val() ) / $('#full_weeks_no').val();
            var default_price = default_full_weeks_price + $('.week_' + $('#full_weeks_no').val() + 1).length * $(this).val();
            $('#book_all').val(default_price)
        });
        
    }
};