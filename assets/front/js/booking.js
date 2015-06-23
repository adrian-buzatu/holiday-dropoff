(function(window, $, undefined) {
    $.Booking = function(){
        this.childId = 0;
        this.day = 0;
        this.checkboxType = '';
        this.accesors = {
            form: $("#js-booking-form"),
            datePicker: $('.datepicker'),
            totalSum: $("#total_num"),
            totalSumBottom: $("#total_num_bottom"),
            bookAll: $('.book_all_days'),
            bookOne: $(".booking_checkbox"),
            bookOneStromg: '.booking_checkbox',
            childTable: $('.child_name_table'),
            childrenAreaPrefix: '#children_area_',
            childrenBookingAreaPrefix: '#children_booking_area_',
            bookAllDaysPrefix: '.book_all_days_',
            bookingParentPrefix: '#children_tbl',
            addFriendTriggerEl: $('.add_friend'),
            friendElement: $("#friend"),
            currentParent: {},
            dynClasses: {
                checkbox_element: '.{type}_check',
                check_all: '.book_all_days_{type}'
            }
        }
        this.post = [];
        this.total = 0;
    }
    
    $.Booking.prototype = {
        init: function(){
            this.accesors.datePicker.datepicker({ changeYear: true });
            this.makeCompatible();
            this.events();
        },
        makeCompatible: function(){
            if (!Array.prototype.indexOf)
            {
                Array.prototype.indexOf = function(elt /*, from*/)
                {
                    var len = this.length >>> 0;

                    var from = Number(arguments[1]) || 0;
                    from = (from < 0)
                            ? Math.ceil(from)
                            : Math.floor(from);
                    if (from < 0)
                        from += len;

                    for (; from < len; from++)
                    {
                        if (from in this &&
                                this[from] === elt)
                            return from;
                    }
                    return -1;
                };
            }
            if (!window.location.origin) {
                window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port : '');
            }
        },
        setAccesors: function(accesorsList){
            this.accesors = accesorsList;
            return this;
        },
        
        getAccesor: function(accesor){
            return this.accesors[accesor];
        },
        setParent: function(parent){
            this.accesors.currentParent = parent;
        },
        ajaxCall: function(){
            var me = this;
            $.ajax({
                url: window.location.origin + "/holiday-dropoff/ajax/update_total",
                method: "POST",
                dataType: "json",
                data: this.accesors.form.serialize(),
                success: function(response){
                    me.accesors.totalSum.text(response.total);
                    me.accesors.totalSumBottom.text(response.total);
                }
            });
        },
        events: function(){
            
            var me = this;
            this.accesors.addFriendTriggerEl.click(function(){
                if(me.accesors.friendElement.hasClass('hide')){
                    me.accesors.friendElement.removeClass('hide');
                } else {
                    me.accesors.friendElement.addClass('hide');
                }
            });
            this.accesors.childTable.click(function(){
                var child_id = $(this).attr('rel');
                if($(me.accesors.childrenAreaPrefix + child_id).hasClass('hide')){
                    $(me.accesors.childrenAreaPrefix + child_id).removeClass('hide');
                    $(me.accesors.childrenBookingAreaPrefix + child_id).removeClass('hide');
                } else {
                    $(me.accesors.childrenAreaPrefix + child_id).addClass('hide');
                    $(me.accesors.childrenBookingAreaPrefix + child_id).addClass('hide');
                }
            });
            this.accesors.bookOne.click(function(){
                me.day = $(this).val();
                var target = $(this).attr('rel');
                var week = $(this).attr('week');
                me.checkboxType = (target == 'extended' ? 'normal' : 'extended');
                var checkbox_class_generic = me.accesors.dynClasses.checkbox_element;
                var checkbox_class = checkbox_class_generic.replace('{type}', me.checkboxType);
                if(!me.helpers.isUndefined($(this).attr('child'))){
                    me.childId = $(this).attr('child');
                } else {
                    me.childId = 0;
                }
                
                me.setParent($(me.accesors.bookingParentPrefix + "_" + week + "_" + me.childId));
                    var parent = me.accesors.currentParent;
//                parent.find(me.accesors.dynClasses.check_all.
//                        replace('{type}', target)).
//                        removeAttr('checked');
                if(!$(this).hasClass("js_checked")){
                    me.checkMirrorEl(parent.find('.' + target + '_check'));
                   $(this).addClass('js_checked');
                    
                    if(parent.find(checkbox_class  + "_" + week + '.js_checked').length >= 
                    parent.find('td.show_' + week + "." + me.checkboxType).length) {                
                        parent.find(me.accesors.dynClasses.check_all.replace('{type}', me.checkboxType))
                            .trigger('click');
                    } else {
                        me.ajaxCall();
                        
                    }
                    
                } else {
                    if(me.checkboxType === 'normal'){ 
                        parent.find(me.accesors.dynClasses.check_all.replace('{type}', target))
                            .removeAttr('checked');
                        me.uncheckMirrorEl(parent.find('.' + target + '_check'));
                        console.log(parent.find('.' + target + '_check'));
                    }
                    parent.find(me.accesors.dynClasses.check_all.replace('{type}', me.checkboxType))
                            .removeAttr('checked');                  
                    
                    $(this).removeClass('js_checked');
                    
                    me.ajaxCall();
                }
                
                
            });
            this.accesors.bookAll.click(function(){   
                var type_raw = $(this).attr('rel');
                var week = $(this).attr('week');
                type_arr = type_raw.split(",");
                me.checkboxType = type_arr[0];
                if(!me.helpers.isUndefined($(this).attr('child'))){
                    me.childId = $(this).attr('child');
                } else {
                    me.childId = 0;
                }
                var book_all_to_uncheck = type_arr[1];
                me.setParent($(me.accesors.bookingParentPrefix + "_" + week + "_" + me.childId));
                var checkbox_class_generic = me.accesors.dynClasses.checkbox_element;
                var checkbox_class = checkbox_class_generic.replace('{type}', me.checkboxType);
                var target_checkbox_class = checkbox_class_generic.replace('{type}', book_all_to_uncheck);
                var parent = me.accesors.currentParent;
                
                if(!me.helpers.isUndefined($(this).attr('checked'))){
                    parent.find(checkbox_class + '_' + week).each(function(){
                        $(this).attr('checked', 'checked');
                        $(this).addClass('js_checked');
                    });
                    //$(me.accesors.bookAllDaysPrefix + book_all_to_uncheck + "_" + week).attr('checked', 'checked');
                    //$(me.accesors.bookAllDaysPrefix + book_all_to_uncheck + "_" + week).removeClass('js_checked').
                    //        addClass('js_checked');
                    if(me.checkboxType === 'extended'){
                        parent.find(target_checkbox_class + "_" + week).attr('checked', 'checked').
                            removeClass('js_checked').addClass('js_checked');
                        parent.find(me.accesors.bookAllDaysPrefix + book_all_to_uncheck + "_" + week).attr('checked', 'checked');
                        parent.find(me.accesors.bookAllDaysPrefix + book_all_to_uncheck + "_" + week).removeClass('js_checked').
                            addClass('js_checked');
                    }
                    
                } else {
                    parent.find(checkbox_class + '.js_checked' + checkbox_class + '_' + week).
                            removeClass('js_checked').removeAttr('checked');
                }
                me.ajaxCall();
            });
        },
        
        helpers: {
            isUndefined: function(element){
                if(typeof element === 'undefined'){
                    return true;
                }
                return false;
            },
            between: function(number, interval){
                if(this.isUndefined(number) || this.isUndefined(interval)
                    || interval.length !== 2){
                    return false;
                }
                
                if(number >= interval[0] && number <= interval[1]){
                    return true;
                }
                return false;
            }
            
        },
        arraySum: function(array, skipCurrentChild){
                var sum = 0;
                var me = this;
                $.each(array, function(index, value){
                    if(!me.helpers.isUndefined(skipCurrentChild) 
                        && skipCurrentChild === true){
                        if(index !== me.childId){
                            sum += value; 
                        }
                    } else {
                        sum += value; 
                    }
                   
                });
                return sum;
        },
        checkMirrorEl: function($mirrorCheckboxes){
            var me = this;
            $mirrorCheckboxes.each(function(){                
                if($(this).val() == me.day && !$(this).hasClass('js_checked') && me.checkboxType === 'extended'){
                    $(this).attr('checked', 'checked');
                    $(this).removeClass('js_checked').addClass('js_checked');
                } 
             });
        },
        uncheckMirrorEl: function($mirrorCheckboxes){
            var me = this;
            $mirrorCheckboxes.each(function(){                
                if($(this).val() == me.day && $(this).hasClass('js_checked') && me.checkboxType === 'normal'){
                    $(this).removeAttr('checked');
                    $(this).removeClass('js_checked');
                } 
             });
        }
    }
    $(document).ready(function(){
        var booking = new $.Booking();
        booking.init();
    });
    
})(this, jQuery);