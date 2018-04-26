<?php  
use App\Controller;
use App\CrudController;
//Controller with resources
class Posts extends Controller  {
    function __construct(){
        parent :: __construct();
      }
    //Show posts or read posts
    public function index(){
        //$crud = new CrudController();
        $data = CrudController::set().  'Im showing posts from Db';
        $this->view->render('posts/index',$data);
    }
    //Create posts
    //Update posts
    //Delete Posts
}