<?php
    class General{
        public static function sanitize(string $evil_string):string{
            $safe_string = addslashes($evil_string);
            $safe_string = strip_tags($safe_string);
            $safe_string = htmlentities($safe_string);
            $safe_string = trim($safe_string);
            return $safe_string;
        }
    }


?>