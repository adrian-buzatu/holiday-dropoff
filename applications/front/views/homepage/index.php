
<script type="text/javascript">
    function validation(newsEmail)
    {
        var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (document.frmMail.newsEmail.value.length < 1)
        {
            alert("You cannot leave the Email Field Empty");
            document.getElementById('newsEmail').focus();
            return false;
        }
        if (!regex.test(document.frmMail['newsEmail'].value))
        {
            alert("Invalid email address format");
            document.getElementById('newsEmail').focus();
            return false;
        }
    }
</script>


<div class="bannerbox">
    <script type="text/javascript">

        var mygallery = new fadeSlideShow({
            wrapperid: "fadeshow1", //ID of blank DIV on page to house Slideshow
            dimensions: [671, 229], //width/height of gallery in pixels. Should reflect dimensions of largest image
            imagearray: [
                <?php echo $banners?>, ],
            displaymode: {type: 'auto', pause: 2500, cycles: 0, wraparound: false},
            persist: false, //remember last viewed slide and recall within same session?
            fadeduration: 500, //transition duration (milliseconds)
            descreveal: "ondemand",
            togglerid: ""
        })

    </script>
    <div id="fadeshow1"></div>
</div>
<div class="middlecontant2">
    <div class="welcome"><img src="<?php echo asset_url() ?>images/welcome.png" width="428" height="40" /></div>
    <div class="welcome2">Holiday Boredom solved!</div>
    <div class="icon2"> 
        <?php for($i = 1; $i < 16; $i++):?>
            <img src="<?php echo asset_url() ?>images/holidaystar.png" alt="" />
        <?php endfor;?>    
        
    </div>
    <div class="body-main-content">
        <?php echo $page['content']?>
    </div>
</div>
<div class="middlecontant3">
    <div class="flayer">
        <div class="downloadtext">
            <a href="<?php echo base_url()?>download/get/<?php echo $flyer['file']?>">Download Our HDO E-Flyer</a>              </div>
        <div class="img-effect"><img src="<?php echo asset_url() ?>images/img-effect.png" /></div>
    </div>
</div>
