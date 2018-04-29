<?php 
use App\Controller;
class Logout extends Controller {
    public function index(){
        unset($_SESSION['user']);
        return $this->view->render('login/index'); 
    }
}