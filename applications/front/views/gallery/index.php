<div class="photogallery-right-content ">
    <div class="photogallery-right-content1">
        <div id="TabbedPanels6" class="TabbedPanels6">
            <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab6 TabbedPanelsTabSelected tab" tabindex="0" style="margin:0px;" rel="images" hide-element="videos">Photo Gallery</li>
                <li class="TabbedPanelsTab tab" tabindex="0" rel="videos" hide-element="images">Video Gallery</li>
            </ul>
            <div class="TabbedPanelsContentGroup">
                
                <div class="TabbedPanelsContent<?php echo $tab !== 'videos' ? 1 : 2?> TabbedPanelsContentVisible">
                    <div class="photogallerysearch">
                        <table style="padding-top:5px;">
                            <tbody>
                                <tr>
                                    <td><div class="photogallerysearch_text">Choose HDO camp</div></td>
                                    <td> 
                                        <div class="demo">
                                            <select name="cate"  class="photogallery_category_browser" rel="<?php echo $tab?>">
                                                <option value="0">Please Select Category</option>						  

                                                <?php foreach ($categories as $category): ?>
                                                    <option value="<?php echo $category['id'] ?>" <?php echo $category['id'] === $category_id ? 'selected' : ''?>><?php echo $category['name'] ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>              
                    </div>
                    <br style="clear:both;">  
                    <div id="container">
                        <!------------------------------------- THE IMG CONTENT ------------------------------------------------->
                        <div id="images" class="<?php echo ($tab != 'images') ? 'hide' : ''?>">
                            <h3> Images </h3>
                            <div id="images_list">
                                <?php if(is_array($images)):?>
                                    <ul>
                                        <?php foreach ($images as $image):?>
                                            <li data-thumb="<?php echo base_url()?>timthumb.php?src=<?php echo asset_url()?>images/banners/<?php echo $image['src']?>&w=150&h=75" 
                                                data-src="<?php echo base_url()?>timthumb.php?src=<?php echo asset_url()?>images/banners/<?php echo $image['src']?>&w=700&h=350">
                                                <img src="<?php echo base_url()?>timthumb.php?src=<?php echo asset_url()?>images/banners/<?php echo $image['src']?>&w=700&h=350" />
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php else:?>
                                No images found!
                                <?php endif;?>
                            </div>
                        </div>
                        <div id="videos" class="<?php echo ($tab != 'videos') ? 'hide' : ''?>">
                            <h3>Videos</h3>
                            <div id="video_list">
                                <?php if(is_array($videos)):?>
                                    <ul>
                                        <?php foreach ($videos as $video):?>
                                            <li>
                                                <a href="<?php echo $video['src']?>"><?php echo $video['title']?></a>
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php else:?>
                                    No videos found!
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="c1"></div>
                    </div>

                </div>
                
            </div>
            <div class="c1"></div>
        </div>
    </div>
</div>
 