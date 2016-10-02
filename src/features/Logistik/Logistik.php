<?php
    //includes
    require_once("../src/Helper.php");

    class Logistik {
        
        public function management($querySite){
            switch($querySite){
                case "inv":{
                    $fOut = self::showInvetory();
                }break;
            }
            
            return $fOut;
        }
        
        private function showInvetory(){
            $H = new Helper;
            return $H->openPage("features/Logistik/templates/inventory.html");
        }
        
        private function showGroups(){
            $H = new Helper;
            return $H->openPage("features/Logistik/templates/groups.html");
        }
    }
?>