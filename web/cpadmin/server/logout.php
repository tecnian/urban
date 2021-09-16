<?php
    include("../../system/config/config.inc.php");
    //include("$appSystemPath/config/def.inc.php");
    include("$appSystemPath/lib/sess.inc.1.0.php");
    include("$appSystemPath/lib/auth.inc.2.1.php");

    $auth = New Auth();
    
    $_SESSION['USER_ID'] = NULL;
    
    session_destroy();

    header("Location: $appAdmUrl/index.php?logout=true");

?>