<?php
use App\Controller;
use App\CrudController;
use App\DB;
class Login extends Controller {
    function __construct(){
        parent :: __construct();
    }
    public function index(){
       
            return $this->view->render('login/index');  
    
        }



}



