<?php
    //includes
    require_once("../src/Helper.php");

    class Logistik {
        
        public function showGroups(){
            $H = new Helper;
            return $H->openPage("features/Logistik/templates/groups.html");
        }
    }
?>