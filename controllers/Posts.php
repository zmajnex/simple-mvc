<?php  
use App\Controller;
use Model\PostModel;
use App\DB;
use Asgard\Redirect;
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
    /**
     * store() method collect data from create form and forwards them to set() method
     * Models/PostModel/set 
     */
    public function store(){
          
          $title =$_POST['title'];
          $body =$_POST['body'];
          $author =$_POST['author'];
          $created_at=date('Y-d-m H:i:s ');
          
          PostModel::set($title,$body,$author,$created_at);
          //redirect
         Redirect::redirect('index');
    }
    //Delete Posts
}  