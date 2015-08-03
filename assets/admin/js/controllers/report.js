var Report = function() {
    
    this.config = {
        base_url: $('body').attr("base-url"),
        camp_prices_holder: $("#camp_prices_holder")
    };
    
    this.post = {
        camp_id: $("#camp_id").val()
    };
    
    this.accesors = {
        start_date: $('#start_date'),
        end_date: $('#end_date')
    };
    
    this.setDatePicker = function(){
        $('#start_date').datepicker();
        $('#end_date').datepicker();
    };
    
    this.events = function(){
        var me = this;
        $("select[name=camp_id]").on('change', function(){
            me.request($(this));
        });
    }
    
    this.request = function(el){
        var me = this;
        $.ajax({
            url: me.config.base_url + "report/get_dates_for_camp/" + el.val(),
            dataType: 'json',
            success: function(response){
                $.each(['start_date', 'end_date'], function(key, val){
                    $("#" + val).val(response[val]);
                })
            }
        });
    }
    this.request($("select[name=camp_id]"));
    this.events();
};