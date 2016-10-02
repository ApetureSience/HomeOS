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
    }
?>