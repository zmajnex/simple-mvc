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
    

    //Create posts view
    public function create(){
   
      
        $this->view->render('posts/create');
    }
    //Store posts to db
    //Sada podatke iz store treba prebaciti u model a model u db
    public function store(){
          
          $title =$_POST['title'];
          $body =$_POST['body'];
          $author =$_POST['author'];
          $created_at=date('Y-d-m H:i:s ');
          
         
    }
    //Delete Posts
}  