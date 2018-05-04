<?php 
namespace App;
class Session {
    /**
     * Put method allows us to create sesion
     */
    public static function put($name, $value){
        return $_SESSION[$name] = $value;
    }
}