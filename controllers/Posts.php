<?php  
use App\Controller;
use Model\PostModel;
use App\DB;
//Controller with resources
class Posts extends Controller  {
    function __construct(){
        parent :: __construct();
      }
    //Show posts from DB, respectively from PostModel 
    public function index(){
   
        $posts= PostModel::get();
      
        $this->view->render('posts/index',$posts);
    }
    

    //Create posts
    //Update posts
    //Delete Posts
}  