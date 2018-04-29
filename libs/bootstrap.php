<?php

namespace App;
use App\Index;
use App\MY_Error;
session_start();
class Bootstrap {
    public function __construct(){
       $url= $this->parseUrl();
    }
    public function parseUrl(){
    //Skupljamo vrednosti iz url ono sto ukucamo
     $url =isset( $_GET ['url']) ? $_GET['url']: null;
     $url =explode('/',$url);
     //print_r($url);
     //Ako ne ukucamo nista tada pozovi automatski Index controller i metodu index
     if(empty($url[0])){
         require 'controllers/index.php';
         $controller = new Index();
         $controller ->index();
         //da bi se kod prekinuo 
       return false;
     }
     //Controller moramo fizički da pozovemo
     $file = 'controllers/'.$url[0].'.php'; 
     //Da li ovaj fajl postoji, ako postoji uključi ga fizički 
     if(file_exists($file))  {
         require $file;
     } else {
        // echo 'Ovaj fajl ne postoji';
        $this->error();
        return false;
     }
     $controller = new $url[0]();
    //Proveravamo da li postoji metoda i parametar
    //Ako je postavljen parametar proveri da li ima metode i postavi metodu sa parametrom
    if(isset($url[2])){
        if(method_exists($controller,$url[1])){
            $controller -> {$url[1]}($url[2]);
            
        }else {
            //echo 'Ova stranica ne postoji';
            $this->error();
        }
    } else{
      //Ako nije postavljen parametar proveravamo da li je postavljena metoda
        if(isset($url[1])){
            //Proveravamo da li metoda postoji u okviru naseg controllera
            if(method_exists($controller,$url[1])){
                $controller->{$url[1]}();
            }else {
               // echo 'Ova stranica ne postoji';
             $this->error();
            }
        }else {
         //Ukoliko ne postoji ni metoda pozivati defaul metodu a to je index
          $controller->index();  
        }
    }
    }

    private function error(){
       //include 'libs/MY_Error.php';
        $controller = new MY_Error() ;
        $controller->index();
    }
}
