<?php 
    //includes
    include("features/Logistik/Logistik.php");

    class BuildCont {
        public function content(){
            switch($_GET['p']){
                //add cases for every page
                    
                case "logistik":{
                    $Logistik = new Logistik;
                    $out = $Logistik->management($_GET['q']);
                }break;
            }
            
            return $out;
        }
    }
?>