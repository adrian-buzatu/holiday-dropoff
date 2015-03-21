<div class="photogallery-right-content ">
    <div class="photogallery-right-content1">
        <div id="TabbedPanels6" class="TabbedPanels6">
            <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab6 TabbedPanelsTabSelected tab" tabindex="0" style="margin:0px;" rel="images" hide-element="videos">Photo Gallery</li>
                <li class="TabbedPanelsTab tab" tabindex="0" rel="videos" hide-element="images">Video Gallery</li>
            </ul>
            <div class="TabbedPanelsContentGroup">
                
                <div class="TabbedPanelsContent1 TabbedPanelsContentVisible">
                    <div class="photogallerysearch">
                        <table style="padding-top:5px;">
                            <tbody>
                                <tr>
                                    <td><div class="photogallerysearch_text">Choose HDO camp</div></td>
                                    <td> 
                                        <div class="demo">
                                            <select name="cate"  class="photogallery_category_browser">
                                                <option value="0">Please Select Category</option>						  

                                                <?php foreach ($categories as $category): ?>
                                                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
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
                        <div id="images">
                            <h3> Images </h3>
                            <div id="images_list">
                                <ul>
                                    <?php foreach ($images as $image):?>
                                        <li data-thumb="<?php echo asset_url()?>images/banners/<?php echo $image['src']?>" 
                                            data-src="<?php echo asset_url()?>images/banners/<?php echo $image['src']?>">
                                            <img src="<?php echo asset_url()?>images/banners/<?php echo $image['src']?>" />
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                        <div id="videos" class="hide">
                            <h3>Videos</h3>
                            <ul>
                                <li>
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="c1"></div>
                    </div>

                </div>
                <div class="TabbedPanelsContent14" class="hide">
                    <div id="container" style="height:auto;">
                        <!------------------------------------- THE CONTENT ------------------------------------------------->

                        <br style="clear:both;">
                        <div>
                            <ul class="videoshow">

<!--                                <li><iframe width="170" src="http://www.youtube.com/embed/AfsiNfWApzk"></iframe></li>

                                <li><iframe width="170" src="http://www.youtube.com/embed/imezQ1CQuM0"></iframe></li>

                                <li><iframe width="170" src="http://www.youtube.com/embed/imezQ1CQuM0"></iframe></li>

                                <li><iframe width="170" src="http://www.youtube.com/embed/imezQ1CQuM0"></iframe></li>

                                <li><iframe width="170" src="http://www.youtube.com/embed/imezQ1CQuM0"></iframe></li>

                                <li><iframe width="170" src="http://www.youtube.com/embed/imezQ1CQuM0"></iframe></li>

                                <li><iframe width="170" src="http://www.youtube.com/embed/imezQ1CQuM0"></iframe></li>

                                <li><iframe width="170" src="http://www.youtube.com/embed/imezQ1CQuM0"></iframe></li>

                                <li><iframe width="170" src="http://www.youtube.com/embed/imezQ1CQuM0"></iframe></li>-->
                            </ul>
                        </div>

                        <!------------------------------------- END OF THE CONTENT ------------------------------------------------->
                    </div>
                    <div class="clear"></div>

                </div>
            </div>
            <div class="c1"></div>
        </div>
    </div>
    <script type="text/javascript">
    <!--
        //var TabbedPanels6 = new Spry.Widget.TabbedPanels("TabbedPanels6", 0);
    //-->
    </script>