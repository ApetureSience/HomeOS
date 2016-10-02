<?php
    //includes
    require_once("../src/Helper.php");

    class FinancesSystem {
        public function load(){
            $FinSys = new FinancesSystem();
            $H      = new Helper;
            
            $marker = array(
                "bankAcc"  => self::getBankAcc(),
                "bookings" => self::loadBookings($_GET['bankAcc']),
                "acc"      => $_GET['bankAcc']
            );

            return $H->replaceMarkers($marker, $H->openPage("features/Finances/templates/finances.html"));
        }
        
        private function loadBookings($bankAcc){
            /*session_start();

            $Server   = new Server("localhost", "FinSys", "admin", "Kuchen123");
            $db       = $Server->connect();

            $output   = "";

            $bookings = $Server->selectAllByID($bankAcc."-".$_SESSION['userData']['ID'], $db);

            foreach($bookings as $listItem){
                if($listItem['value'] < 0){
                    $output .= '<tr class="warning">';
                } else {
                    $output .= '<tr class="success">';
                }
                foreach($listItem as $key => $value){
                    if(!is_numeric($key)){
                        switch($key){
                            case "date/time":{
                                $output .= '<td>'.$value.'</td>';
                            }break;

                            case "category":
                            case "title":{
                                $output .= '<td>'.$value.'</td>';
                            }break;
                            case "value":{
                                if($value >= 0){
                                    $output .= '<td class="text-right">+'.number_format($value ,2 ,',' ,'.').' €</td>';
                                } else {
                                    $output .= '<td class="text-right">'.number_format($value ,2 ,',' ,'.').' €</td>';
                                }

                            }break;
                        }
                    }
                }
                $output .= '</tr>';
            }

            return $output;*/
        }

        private function getBankAcc(){
            /*session_start();

            $ServerFS = new Server("localhost", "FinSys", "admin", "Kuchen123");
            $dbFS     = $ServerFS->connect();

            $dbAcc    = $ServerFS->selectAllByID("bankAcc", $dbFS);

            $res      = "";

            foreach($dbAcc as $acc){
                if($acc['owner'] == $_SESSION['userData']['ID']){
                    $res .= '<div class="list-group"><a href="http://192.168.1.107/mrfibunacci.de/src/php/?pages=index&sp=finances&bankAcc='.$acc['name'].'" class="list-group-item">'.$acc['name'];
                    if($acc['mainValue'] >= 0){
                        $res .= '<span class="label label-success pull-right">+'.number_format($acc['mainValue'] ,2 ,',', '.').'</span></a></div>';
                    } else {
                        $res .= '<span class="label label-danger pull-right">-'.number_format($acc['mainValue'] ,2 ,',', '.').'</span></a></div>';
                    }
                }
            }

            return $res;*/
        }
    }
?>