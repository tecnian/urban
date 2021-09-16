<?
    include("../../system/config/config.inc.php");
    include("../include/include.inc.php");
    include("$appSystemPath/lib/files.inc.1.11.php");

    $_file = new FileManager();    
    

    //definimos el path de acceso
    $path = $appFilesPath_CKEditor;

    //instanciamos el objeto
    $dir = dir($path);
    ?>
<html>
	<head>
		<title>browser</title>
		
		<script>
   function changeScreenSize(w,h)
     {
       window.resizeTo( w,h )
     }
</script>
	</head>
	<body  onload="changeScreenSize(750,600)">
    <div id="browse">
    <?
    while ($elemento = $dir->read())
    {
        if ( ($elemento != '.') and ($elemento != '..'))
        {
        ?>
            <div class="item"><a href="javascript:select('<? echo $elemento ?>')"><img class="image" src="<? echo $appFilesUrl_CKEditor ?>/<? echo $elemento ?>"></a></div>
        <?
        }
    }
    ?>
    </div>
    <?

    //Cerramos el directorio
    $dir->close();
?>
<link rel="stylesheet" type="text/css" href="<? echo $appAdmUrl ?>/css/browse.css" />
<!--<script type="text/javascript" src="<? echo $appAdmUrl ?>/js/browse.js"></script>-->
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
    window.opener.CKEDITOR.tools.callFunction(funcNum, fileUrl);
    self.close();
}
</script>
</body>
</html>