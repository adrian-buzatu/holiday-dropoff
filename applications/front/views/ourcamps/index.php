<div class="ourcampus-right-content">
    <div class="price-heading-text"><img src="<?php echo asset_url() ?>images/ourcampus.png" alt="" /></div>
    <div class="ourcampus-middle-content ">
        <div id="TabbedPanels1" class="TabbedPanels">
            <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">What Happens</li>
                <li class="TabbedPanelsTab" tabindex="0">Sports at HDO</li>
                <li class="TabbedPanelsTab" tabindex="0">Facilities</li>
                <li class="TabbedPanelsTab" tabindex="0">Camp Dates</li>
                <li class="TabbedPanelsTab" tabindex="0">Staff at HDO</li>
            </ul>
            <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                    <?php echo $whatHappens['content']?>
                </div>
                <div class="TabbedPanelsContent">
                    <?php echo $sportsAtHDO['content']?>
                </div>
                <div class="TabbedPanelsContent">
                    <?php echo $facilities['content']?>
                </div>
                <div class="TabbedPanelsContent">
                    <?php echo $campDates['content']?>
                </div>
                <div class="TabbedPanelsContent">
                    <?php echo $staffAtHDO['content']?>
                </div>
            </div>
        </div>
    </div>
    <div class="ourcampus-testmonials">
        <div class="testitag">Testimonials</div>
        <div class="cn_nav"> <a id="cn_prev" class="cn_prev"></a> <a id="cn_next" class="cn_next"></a> </div>
        <style>
            .cn_page p
            {
                border:0px;
            }
        </style>
        <div id="cn_list" class="cn_list">
            <?php foreach ($testimonials as $index => $testimonial): ?>
                <div class="cn_page" <?php if ($index == 0): ?>style="display: block;"<?php endif; ?>>
                    <?php echo $testimonial['content']; ?>
                </div>
            <?php endforeach; ?>           

        </div>
    </div>
</div>
<script type="text/javascript">
    var $ = jQuery.noConflict();
    $(function() {
        //caching
        //next and prev buttons
        if (typeof $ == 'undefined')
            $ = jQuery.noConflict();
        var $cn_next = $('#cn_next');
        var $cn_prev = $('#cn_prev');
        //wrapper of the left items
        var $cn_list = $('#cn_list');
        var $pages = $cn_list.find('.cn_page');
        //how many pages
        var cnt_pages = $pages.length;
        //the default page is the first one
        var page = 1;
        //list of news (left items)
        var $items = $cn_list.find('.cn_item');
        //the current item being viewed (right side)
        var $cn_preview = $('#cn_preview');
        //index of the item being viewed. 
        //the default is the first one
        var current = 1;

        /*
         for each item we store its index relative to all the document.
         we bind a click event that slides up or down the current item
         and slides up or down the clicked one. 
         Moving up or down will depend if the clicked item is after or
         before the current one
         */
        $items.each(function(i) {
            var $item = $(this);
            $item.data('idx', i + 1);

            $item.bind('click', function() {
                var $this = $(this);
                $cn_list.find('.selected').removeClass('selected');
                $this.addClass('selected');
                var idx = $(this).data('idx');
                var $current = $cn_preview.find('.cn_content:nth-child(' + current + ')');
                var $next = $cn_preview.find('.cn_content:nth-child(' + idx + ')');

                if (idx > current) {
                    $current.stop().animate({'top': '-300px'}, 600, 'easeOutBack', function() {
                        $(this).css({'top': '310px'});
                    });
                    $next.css({'top': '310px'}).stop().animate({'top': '5px'}, 600, 'easeOutBack');
                }
                else if (idx < current) {
                    $current.stop().animate({'top': '310px'}, 600, 'easeOutBack', function() {
                        $(this).css({'top': '310px'});
                    });
                    $next.css({'top': '-300px'}).stop().animate({'top': '5px'}, 600, 'easeOutBack');
                }
                current = idx;
            });
        });

        /*
         shows next page if exists:
         the next page fades in
         also checks if the button should get disabled
         */
        $cn_next.bind('click', function(e) {
            var $this = $(this);
            $cn_prev.removeClass('disabled');
            ++page;
            if (page == cnt_pages)
                $this.addClass('disabled');
            if (page > cnt_pages) {
                page = cnt_pages;
                return;
            }
            $pages.hide();
            $cn_list.find('.cn_page:nth-child(' + page + ')').fadeIn();
            e.preventDefault();
        });
        /*
         shows previous page if exists:
         the previous page fades in
         also checks if the button should get disabled
         */
        $cn_prev.bind('click', function(e) {
            var $this = $(this);
            $cn_next.removeClass('disabled');
            --page;
            if (page == 1)
                $this.addClass('disabled');
            if (page < 1) {
                page = 1;
                return;
            }
            $pages.hide();
            $cn_list.find('.cn_page:nth-child(' + page + ')').fadeIn();
            e.preventDefault();
        });

    });
</script>
<script type="text/javascript">
<!--
    var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", 0);
//-->
</script>