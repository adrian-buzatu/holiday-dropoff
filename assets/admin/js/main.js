(function(window, $, undefined) {
    
    $(document).ready(function(){        
        var callback = false;
        function App(controller) {
            var me = this;
            this.controller = controller;
            this.assetsUrl = $('body').attr('rel');
            this.globalEventsInit = function(){
                $('.back_button').click(function() {
                    history.go(-1);
                    return true;
                });
            }
            this.loadController = function (url, callback)
            {
                // Adding the script tag to the head as suggested before
                var head = document.getElementsByTagName('head')[0];
                var script = document.createElement('script');
                if(typeof url == 'undefined'){
                    url = '';
                }
                script.type = 'text/javascript';
                script.src = url;

                // Then bind the event to the callback function.
                // There are several events for cross browser compatibility.
                if(typeof callback != 'undefined'){
                    script.onreadystatechange = callback;
                    script.onload = callback;
                }


                // Fire the loading
                head.appendChild(script);
            }
            this.start = function(){
                this.globalEventsInit();
                switch (this.controller) {
                    case 'pages': {
                        pagesUrl = this.assetsUrl + "js/controllers/pages.js";
                        callback = function() {
                            var page = new Pages();
                            page.setMceIconsPath(me.assetsUrl);
                            page.bindMceToEl('content');
                        }
                        this.loadController(pagesUrl, callback);

                    }
                    case 'camps': {
                        campsUrl = this.assetsUrl + "js/controllers/camps.js";
                        callback = function() {
                            var camps = new Camps();
                            camps.setDatePicker();
                            camps.events();
                        }
                        this.loadController(campsUrl, callback);

                    }
                    case 'coupons': {
                        couponsUrl = this.assetsUrl + "js/controllers/coupons.js";
                        callback = function() {
                            var coupons = new Coupons();
                            coupons.setDatePicker();
                        }
                        this.loadController(couponsUrl, callback);

                    }
                    case 'testimonials': {
                        testimonialsUrl = this.assetsUrl + "js/controllers/testimonials.js";
                        callback = function() {
                            var testimonials = new Testimonials();
                            testimonials.setMceIconsPath(me.assetsUrl);
                            testimonials.bindMceToEl('content');
                        }
                        this.loadController(testimonialsUrl, callback);

                    }
                    case 'news': {
                        newsUrl = this.assetsUrl + "js/controllers/news.js";
                        callback = function() {
                            var news = new News();
                            news.setMceIconsPath(me.assetsUrl);
                            news.bindMceToEl('content');
                        }
                        this.loadController(newsUrl, callback);

                    }
                }
            }
        }
        
        var session = new App($('body').attr('id'));        
        session.start();
    });
    
})(this, jQuery);