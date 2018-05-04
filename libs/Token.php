<?php 
namespace App;
use App\Session;
class Token {
    public static  function generate($name){
        return Session::put($name,md5(uniqid()));
    }
}
