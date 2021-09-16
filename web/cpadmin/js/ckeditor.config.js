
CKEDITOR.editorConfig = function( config )
{	
	config.language = 'es';
        config.toolbar = 'Custom';
        config.uiColor = '#E1EEF7';        
        config.height = '400px';
        config.width = '500px';
        config.filebrowserUploadUrl = 'server/cke_upload.php';
        config.filebrowserBrowseUrl = 'server/cke_browse.php';
        config.filebrowserWindowWidth = '750';
        config.filebrowserWindowHeight = '600';
        config.forcePasteAsPlainText = true;
        config.contentsCss = 'assets/css/ckeditor.css';
        config.allowedContent = true;
        config.extraPlugins = 'font';


        config.toolbar_Custom =
        [                                    
            ['PasteFromWord'],
            ['Undo','Redo'],                        
            ['Bold','Italic','Underline'],
            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
            ['NumberedList','BulletedList','Table'],                        
            ['Link','Unlink'],['Image'],
            ['Format','RemoveFormat'],['FontSize'],['Source'],
            ['Maximize']
        ];
        
        

        

};
