(function(window, $, undefined) {
    $(document).ready(function(){
        if (!window.location.origin) {
            window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port : '');
        }
        $('.tab').click(function() {
            var classes = {
                images: 'TabbedPanelsContent1',
                videos: 'TabbedPanelsContent2'
            };
            $('.tab').removeClass('TabbedPanelsTabSelected');
            $(this).addClass('TabbedPanelsTabSelected');
//            $("#" + $(this).attr('rel')).removeClass('hide');
//            $("#" + $(this).attr('hide-element')).addClass('hide');
//            $(".photogallery_category_browser").attr('rel', $(this).attr('rel'));
//            console.log("here i am");
//            $(".TabbedPanelsContentVisible").removeClass('TabbedPanelsContent1').
//                removeClass('TabbedPanelsContent2').
//                addClass(classes[$(this).attr('rel')]);
            window.location.href = window.location.origin + "/gallery/" + $(".photogallery_category_browser").val() + "/" + $(this).attr('rel');
        });
        $(".photogallery_category_browser").change(function(){
            window.location.href = window.location.origin + "/gallery/" + $(this).val() + "/" + $(this).attr('rel');
        });
        $('#images_list ul').lightSlider({
            gallery: true,
            item: 1,
            auto: true,
            controls: true,
            loop:true,
            thumbItem: 9,
            slideMargin: 0,
            currentPagerPosition: 'left'
        }); 
        $("#video_list ul").youtubeVideoGallery({
            assetFolder: window.location.origin + "/assets/front/images/",
            plugin:'colorbox'
        });
    });
    
})(this, jQuery);