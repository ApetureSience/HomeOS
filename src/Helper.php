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
            
            mysqli_query($link, "TRUNCATE ".$table[1]);
            mysqli_query($link, $sql);
            
            foreach($newData as $key => $value){
                //mysqli_query($link, "INSERT INTO `bankAcc` (`date`, `text`) VALUES ('".$value['date']."','".$value['text']."')");
                mysqli_query($link, "INSERT INTO `".$table[1]."`(`date/time`, `category`, `title`, `value`) VALUES (".$value['date/time'].",".$value['category'].",".$value['title'].",".$value['value'].")");
                echo "INSERT INTO `".$table[1]."`(`date/time`, `category`, `title`, `value`) VALUES ('".$value['date/time']."', '".$value['category']."', '".$value['title']."', '".$value['value']."')";
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
        
        public function parseDate($date){
            if(isset($date)){
                $toParseDate = explode("-", $date);
                $date = null;
                for($i=2; $i > -1; $i--) {
                    $date .= $toParseDate[$i];
                    if($i > 0){
                        $date .= ".";
                    }
                }
                return $date;
            }
        }
    }
?>