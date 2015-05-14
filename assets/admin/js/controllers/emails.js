var Emails = function() {
    this.mceIconsBasePath = '';
    this.setMceIconsPath = function(path){
        this.mceIconsBasePath = path;
    }
    this.bindMceToEl = function(elemId){
        if($('#' + elemId).length){
            new nicEditor({fullPanel : true, iconsPath : this.mceIconsBasePath + 'images/nicEditorIcons.gif'}).panelInstance(elemId);
        }
    }
};