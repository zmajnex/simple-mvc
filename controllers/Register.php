<?php
use App\Controller;
class Register extends Controller {
    public function index(){
        return $this->view->render('register/index');
    }
    
}