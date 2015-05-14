<div class="<?php echo $page['slug']?>-right-content">
    <div class="price-heading-text">
        <?php if(!file_exists(base_path(). "assets/front/images/".$page['slug']. "-img.png" )):?>
            <div class="news-heading-text">
                <?php echo $page['title'];?>
            </div>
            
        <?php else:?>
            <div class="price-heading-text">
                <img src="<?php echo asset_url();?>images/<?php echo $page['slug']?>-img.png" />
            </div>
        <?php endif;?>
    
    <div class="<?php echo $page['slug']?>-middle-content ">
        <?php echo $page['content']?>
    </div>
</div>