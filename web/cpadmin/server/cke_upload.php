<?php
    include("../../system/config/config.inc.php");
    include("../include/include.inc.php");
    include("$appSystemPath/lib/files.inc.1.11.php");

    $_file = new FileManager();    
    
    $is_editor = false;

    

            $_file = new FileManager();
            $_file->field = "upload";
            $_file->path = $appFilesPath_CKEditor;            
            $_file->rename = SYS::FILE_RENAME_SUFFIX;

            $_file->upload();

            if ($_file->error == SYS::FILE_NO_ERROR)
            {                              
               echo "<span style='font-family: Arial; font-size: 12px; font-weight: bold'>The file has been uploaded</span>";
               $is_editor = true;
            }
            else
            {
                echo $_file->error;
            }
                       
    

    if ($is_editor)
    {
?>
<script>
function getUrlParam(paramName)
{
  var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
  var match = window.location.search.match(reParam) ;

  return (match && match.length > 1) ? match[1] : '' ;
}

function select(name)
{
    var funcNum = getUrlParam('CKEditorFuncNum');
    var fileUrl = '<? echo $appFilesUrl_CKEditor ?>/' + name;
    window.parent.CKEDITOR.tools.callFunction(funcNum, fileUrl);
}

select('<? echo $_file->name ?>');
</script>
<? } ?>
 