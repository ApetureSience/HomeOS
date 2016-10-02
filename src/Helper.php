<?php 
    class Helper {
        public function getPage($pagename)
        {
            $path = "$pagename.html";

            if(file_exists($path)){
                return $this->openPage($path);
            } else {
                return $this->openPage("error.html");
            }
        }

        public function openPage($pageurl)
        {
            $fh = fopen($pageurl , "r");
            $fc = fread($fh, filesize($pageurl));

            fclose($fh);

            return $fc;
        }
        
        public function replaceMarkers($markers, $origContent)
        {
            $content = $origContent;

            foreach ($markers as $key => $value) {
                $content = str_replace('###'.$key.'###', $value, $content);
            }

            return $content;
        }
        
        //Angepasst für FinSys
        public function insertOnTop($link, $sql){
            $table = explode("`", $sql);

            $oldData = self::selectAllByID($table[1], $link);
            
            foreach($oldData as $key => $entity){
                $newData[$key+1] = $entity;
            }
            
            mysqli_query($link, "TRUNCATE news");
            mysqli_query($link, $sql);
            
            foreach($newData as $key => $value){
                //mysqli_query($link, "INSERT INTO `bankAcc` (`date`, `text`) VALUES ('".$value['date']."','".$value['text']."')");
                mysqli_query($link, "INSERT INTO `bankAcc` (`name`, `mainValue`) VALUES ('Main', 140)");
            }
        }
        
        public function selectAllByID($table, $db){
            $i = 1;
            do{
                $content[] = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `".$table."` WHERE `ID`=".$i));
                $i++;
            }while($content[$i-2] != null);
            array_pop($content);

            return $content;
        }
    }
?>