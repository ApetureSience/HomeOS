<?php 
    //includes
    require_once("Helper.php");
    include("features/Logistik/Logistik.php");
    include("features/Finances/FinSys.php");

    class BuildCont {
        public function content(){
            switch($_GET['p']){
                //add cases for every page
                case "finances":{
                    $H      = new Helper;
                    $FinSys = new FinancesSystem;
                    $out = $FinSys->load();
                    //$out = $H->openPage("features/Finances/templates/finances.html");
                }break;
                    
                case "logistik":{
                    $Logistik = new Logistik;
                    $out = $Logistik->management($_GET['q']);
                }break;
            }
            
            return $out;
        }
    }
?>