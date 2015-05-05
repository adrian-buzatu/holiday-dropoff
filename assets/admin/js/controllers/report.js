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
};