<?php
namespace Asgard;
class Redirect {
  
        function redirect($url, $permanent = false) {
            if($permanent) {
                header('HTTP/1.1 301 Moved Permanently');
            }
            header('Location: '.$url);
            exit();
        }
    }
