(function(window, $, undefined) {
    $.Booking = function(){
        this.partialSum = {};
        this.discounts = {
            2: 0.75,
            3: 0.5
        }
        this.discountAllDaysIndex = 9;
        this.discountTotal = 0;
        this.priceList = {};
        this.daysChecked = {};
        this.childId = 0;
        this.day = 0;
        this.checkboxType = '';
        this.accesors = {
            priceList: $("#prices_list"),
            totalSum: $("#total_num"),
            totalSumBottom: $("#total_num_bottom"),
            datePicker: $('.datepicker'),
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
            bookingSubmit: $(".confirm_booking_submit"),
            extendedDaysFee: $("#extended_days_fee"),
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
            this.setPriceList(this.accesors.priceList);
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
        setPriceList: function($priceListContainer){
            this.priceList = jQuery.parseJSON($priceListContainer.val());
            return this;
        },
        getAccesor: function(accesor){
            return this.accesors[accesor];
        },
        setParent: function(parent){
            this.accesors.currentParent = parent;
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
                me.checkboxType = (target == 'extended' ? 'normal' : 'extended');
                if(!me.helpers.isUndefined($(this).attr('child'))){
                    me.childId = $(this).attr('child');
                } else {
                    me.childId = 0;
                }
                me.setParent($(me.accesors.bookingParentPrefix + me.childId));
                    var parent = me.accesors.currentParent;
                if(!$(this).hasClass("js_checked")){
                    
                    //When I book a normal day, the same extended day should be unchecked and vice-versa.
                    me.uncheckMirrorEl(parent.find('.' + target + '_check'));
                    $(this).addClass('js_checked');
                    me.addChildToBookDay();
                    if(me.helpers.isUndefined(me.partialSum[me.childId])){
                        me.partialSum[me.childId] = 0;
                    }
                    me.updateTotals();
                    
                } else {
                    me.updateTotals(-1);
                    me.removeChildFromBookDay();
                    $(this).removeClass('js_checked');
                    parent.find(me.accesors.dynClasses.check_all.replace('{type}', me.checkboxType))
                            .removeAttr('checked');
                }
                
            });
            this.accesors.bookAll.click(function(){   
                var type_raw = $(this).attr('rel');
                type_arr = type_raw.split(",");
                me.checkboxType = type_arr[0];
                if(!me.helpers.isUndefined($(this).attr('child'))){
                    me.childId = $(this).attr('child');
                } else {
                    me.childId = 0;
                }
                me.setParent($(me.accesors.bookingParentPrefix + me.childId));
                var checkbox_class_generic = me.accesors.dynClasses.checkbox_element;
                var checkbox_class = checkbox_class_generic.replace('{type}', me.checkboxType);
                var parent = me.accesors.currentParent;
                var book_all_to_uncheck = type_arr[1];
                if(!me.helpers.isUndefined($(this).attr('checked'))){
                    parent.find(checkbox_class + '.js_checked').each(function() {
                        me.day = $(this).val();
                        me.updateTotals(-1);
                        me.removeChildFromBookDay();
                        $(this).removeClass('js_checked');
                    });
                    parent.find(me.accesors.bookOneString).removeAttr('checked');
                    parent.find(me.accesors.bookOneString).removeClass('js_checked');
                    $(me.accesors.bookAllDaysPrefix + book_all_to_uncheck).removeAttr('checked');
                    $(me.accesors.bookAllDaysPrefix + book_all_to_uncheck).removeClass('js_checked');
                    parent.find('td.show ' + checkbox_class).each(function(){   
                        $(this).attr('checked', 'checked');
                        $(this).addClass('js_checked');
                        me.day = $(this).val();
                        me.addChildToBookDay();
                        if(me.helpers.isUndefined(me.partialSum[me.childId])){
                            me.partialSum[me.childId] = 0;
                        }
                        me.updateTotals();
                    });
                } else {
                    console.log(parent.find('td.show ' + checkbox_class))
                    parent.find('td.show ' + checkbox_class).each(function(){   
                        
                        me.day = $(this).val();
                        me.updateTotals(-1);
                        me.removeChildFromBookDay();
                        $(this).removeAttr('checked');
                        $(this).removeClass('js_checked');
                    });
                    parent.find(me.accesors.dynClasses.check_all.replace('{type}', me.checkboxType))
                            .removeAttr('checked');
                }
            });
        },
        makePrice: function(){
            
            var children_booked = this.daysChecked[this.day].length;
            var output = this.priceList[this.day] * 1;
            if(this.helpers.between(children_booked, [2, 3]) !== false){
                var discount = this.discounts[children_booked];
                output *= discount;
                
            }
            if (this.checkboxType === "extended") {
                output += this.accesors.extendedDaysFee.val() * 1;
            }
                
            return output;
        },
        updateTotals: function(sign){
            
            if(this.helpers.isUndefined(sign) || sign * sign != 1){
                sign = 1;
            }
            var type = this.checkboxType;
            var checkbox_class_generic = this.accesors.dynClasses.checkbox_element;
            var checkbox_class = checkbox_class_generic.replace('{type}', type);
            var check_all_generic = this.accesors.dynClasses.check_all;
            var check_all_class = check_all_generic.replace('{type}', type);
            var parent = this.accesors.currentParent;
            var day_booked_real_price = this.makePrice();
            this.partialSum[this.childId] += day_booked_real_price * sign;
            this.total += day_booked_real_price * sign;
            
            this.totalDiscount += this.getDayDiscount(day_booked_real_price) * sign;
            if(parent.find(checkbox_class + '.js_checked').length === 
                    parent.find('td.show ' + checkbox_class).length) {
                this.total -= this.priceList[this.discountAllDaysIndex] * sign;
                this.partialSum[this.childId] -= this.priceList[this.discountAllDaysIndex] * sign;
                parent.find(check_all_class).attr("checked", "checked");
            } 
            this.updateTotalElements();
        },
        getDayDiscount: function(reduced_price){
            return this.priceList[this.day] * 1 - reduced_price;
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
        uncheckMirrorEl: function($mirrorCheckboxes){
            var me = this;
            $mirrorCheckboxes.each(function(){
                if($(this).val() == me.day && $(this).hasClass('js_checked')){
                    me.removeChildFromBookDay();
                    me.total -= me.makePrice();
                    if(me.checkboxType === 'extended'){
                        me.total += me.accesors.extendedDaysFee.val() * 1;
                    } else {
                        me.total -= me.accesors.extendedDaysFee.val() * 1;
                    }
                    $(this).removeAttr('checked');
                    $(this).removeClass('js_checked');
                } 
             });
        },
        addChildToBookDay: function(){
            if (typeof this.daysChecked[this.day] === 'undefined') {
                this.daysChecked[this.day] = new Array();
            }
            this.daysChecked[this.day].push(this.childId);
        },
        removeChildFromBookDay: function(){
            var position = this.daysChecked[this.day].indexOf(this.childId);
            if (position > -1) {
                this.daysChecked[this.day].splice(position, 1);
            }
        },
        updateTotalElements: function(){
            this.accesors.totalSum.text(this.total);
            this.accesors.totalSumBottom.text(this.total);
        }
        
    }
    $(document).ready(function(){
        var booking = new $.Booking();
        booking.init();
    });
    
})(this, jQuery);