<?php

    function sanitizer($evilstring){
        $goodstring = strip_tags($evilstring);
        $goodstring = htmlspecialchars($goodstring);
        $goodstring = addslashes($goodstring);
        $goodstring = trim($goodstring);
        $goodstring = htmlentities($goodstring);
        return $goodstring;

    }


?>