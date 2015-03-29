<div class="about-us-right-content">
    <div class="news-heading-text"><?php echo $page['title']?></div>
    <div class="about-us-middle-content "> 
        <?php if($page['image'] != ''):?>
        <img src="<?php echo asset_url()?>images/<?php echo $page['image']?>">
        <?php endif;?>
        <?php echo $page['content']?>
    </div>
</div>