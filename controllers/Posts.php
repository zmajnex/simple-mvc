<?php  
use App\Controller;
use Model\PostModel;
//Controller with resources
class Posts extends Controller  {
    function __construct(){
        parent :: __construct();
      }
    //Show posts from DB, respectively from PostModel 
    public function index(){
        
        
        $this->view->render('posts/index');
    }
    

    //Create posts
    //Update posts
    //Delete Posts
}  