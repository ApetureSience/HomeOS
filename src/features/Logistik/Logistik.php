<?php
    //includes
    require_once("../src/Helper.php");

    class Logistik {
        
        public function management($querySite){
            switch($querySite){
                case "inv":{
                    $fOut = "Läuft";
                }break;
            }
            
            return $fOut;
        }
        
        public function showGroups(){
            $H = new Helper;
            return $H->openPage("features/Logistik/templates/groups.html");
        }
    }
?>