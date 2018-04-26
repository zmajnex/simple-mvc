<?php
namespace App;
use App\Controller;
   class MY_Error extends Controller {
       function __construct(){
           parent:: __construct();
       }
       public function index(){
           $this->view->poruka = 'Ova stranica ne postoji!';
           $this->view->render('error/index');
       }
 }