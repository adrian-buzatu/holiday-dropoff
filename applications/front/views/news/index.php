<div class="about-us-right-content">
    <div class="news-page-heading-text">News</div>
    <div class="about-us-middle-content "> 
        <?php foreach($news as $item):?>
            <div class="news_item" news-id="<?php echo $item['id']?>">
                <h3 class="news_title"><?php echo $item['title']?></h3>
                <div class="news_content">
                    <div class="news_content_body">
                        <?php echo $item['content_raw']?>...
                    </div>
                    <div class="news_read_more">
                        <a href="<?php echo base_url(). "news/". $item['slug']?>">Read more</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>