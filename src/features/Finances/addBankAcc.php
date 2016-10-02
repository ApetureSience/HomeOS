<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 29.09.2016
 * Time: 11:12
 */
    require_once("../Server.php");


    /*
     * weil ich zu blöd bin
     * require_once("../BuildContent.php");
     * zum laufen zu bringen. Hier die replaceMarker funktion
     */
    function replaceMarkers($markers, $origContent)
    {
        $content = $origContent;

        foreach ($markers as $key => $value) {
            $content = str_replace('###'.$key.'###', $value, $content);
        }

        return $content;
    }

    $Server = new Server("localhost", "FinSys", "admin", "Kuchen123");
    $db     = $Server->connect();

    $path = "addBankAcc.sql";
    $sql = fread(fopen($path, "r"), filesize($path));
    fclose($path, "r");

    session_start();
    $m['NAME'] = $_POST['name']."-".$_SESSION['userData']['ID'];
    $sql = replaceMarkers($m, $sql);

    //mysqli_query($db, $sql);

    if(isset($_POST['value'])){
        mysqli_query($db, "");   // Finnish it!
    }
//2. if not -> create table & add to "bankAcc" table
//3. if "value" isset insert into table
?>