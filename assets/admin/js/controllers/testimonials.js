var Testimonials = function() {
    this.mceIconsBasePath = '';
    this.setMceIconsPath = function(path){
        this.mceIconsBasePath = path;
        console.log(path);
    }
    this.bindMceToEl = function(elemId){
        if($('#' + elemId).length){
            new nicEditor({fullPanel : true, iconsPath : this.mceIconsBasePath + 'images/nicEditorIcons.gif'}).panelInstance(elemId);
        }
    }
};