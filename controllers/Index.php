<?php
//Controller
namespace App;
use App\Controller;
use App\CrudController;
class Index extends Controller {
    function __construct(){
      parent :: __construct();
    }
    public function index(){
        $db = new CrudController();
        $res=$db->get();
        $data = $res;
        //$data za prebacivanje obj na view u ovom slucaju view/index/index.php
        $this->view->render('index/index',$data);
        // echo $db->set();
    }
  
  
}