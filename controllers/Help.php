<?php
use App\Controller;
class Help extends Controller {
    function __construct(){
    parent ::__construct();
    }
    function index(){
       // echo 'Ovo je Help Kontroler';
       $this->view->render('help/index');
    }
}
?>