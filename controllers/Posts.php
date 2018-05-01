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
        $_SESSION['msg']='Post successfuly added';
          $title =$_POST['title'];
          $body =$_POST['body'];
          $author =$_POST['author'];
          $created_at=date('Y-d-m H:i:s ');
          
          PostModel::set($title,$body,$author,$created_at);
          //redirect
         Redirect::redirect('index');
    }
      
     //Update Post
     public function showedit(){
        $id = $_POST['id'];
        $post= PostModel::getpost($id);
        $this->view->render('posts/update',$post);
     }
     public function edit(){

          $_SESSION['msg']='Post successfuly edited';
          $id = $_POST['id'];
          $title =$_POST['title'];
          $body =$_POST['body'];
          $author =$_POST['author'];
          $created_at=date('Y-d-m H:i:s ');
          
          PostModel::update($id,$title,$body,$author,$created_at);
          //redirect
         Redirect::redirect('index');
        
     }

    //Delete Posts
    public function destroy(){
        $_SESSION['msg']='Post successfuly deleted';
        $id = $_POST['id'];
        PostModel::delete($id);
       Redirect::redirect('index');
    }
}  