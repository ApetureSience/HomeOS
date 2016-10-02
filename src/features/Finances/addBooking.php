<?php
    require_once("../Server.php");
    $Server = new Server("localhost", "FinSys", "admin", "Kuchen123");
    $db     = $Server->connect();
    session_start();

    mysqli_query($db, "INSERT INTO `".$_POST['table']."-".$_SESSION['userData']['ID']."` (`date/time`, `category`, `title`, `value`)
                                              VALUES ('".$_POST['date']."','".$_POST['category']."','".$_POST['title']."', '".$_POST['value']."')");

    $mainVal = mysqli_fetch_array(mysqli_query($db, "SELECT `mainValue` FROM `bankAcc` WHERE `name`='".$_POST['table']."'"));
    $newMainVal = floatval($mainVal[0])+floatval($_POST['value']);

    mysqli_query($db, "UPDATE `bankAcc` SET `mainValue`='".$newMainVal."' WHERE `name`='".$_POST['table']."'");

    header("Location: http://192.168.1.107/mrfibunacci.de/src/php/?pages=index&sp=finances&bankAcc=".$_POST['table']);
?>