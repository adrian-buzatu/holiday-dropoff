var Camps = function() {
    
    this.setDatePicker = function(){
        $('#start_date').datepicker({ minDate: -20 });
        $('#end_date').datepicker({ minDate: -20 });
    }
};