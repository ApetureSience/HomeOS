<?php
    $db    = mysqli_connect("localhost", "admin", "Kuchen123");
            
    $database = mysqli_select_db($db, "HomeOS");

    if(!$database){
        echo "Kann die Datenbank nicht benutzen : " . mysqli_connect_error();
        mysqli_close($db);
        exit;
    }

    session_start();

    mysqli_query($db, "INSERT INTO `bankAcc".$_POST['table']."` (`date/time`, `category`, `title`, `value`)
                                              VALUES ('".$_POST['date']."','".$_POST['category']."','".$_POST['title']."', '".$_POST['value']."')");

    $mainVal = mysqli_fetch_array(mysqli_query($db, "SELECT `mainValue` FROM `bankAcc` WHERE `name`='".$_POST['table']."'"));
    $newMainVal = floatval($mainVal[0])+floatval($_POST['value']);

    mysqli_query($db, "UPDATE `bankAcc` SET `mainValue`='".$newMainVal."' WHERE `name`='".$_POST['table']."'");

    header("Location: http://192.168.1.107/HomeOS/src/?p=finances&bankAcc=".$_POST['table']);
?>