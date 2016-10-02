<?php
    include_once("Helper.php");
    include_once("BuildCont.php");

    $H    = new Helper;
    $BC   = new BuildCont;

    $pc   = $H->getPage("main");
    
    $m = array(
        'content' => $BC->content()
    );

    echo $H->replaceMarkers($m, $pc);
?>