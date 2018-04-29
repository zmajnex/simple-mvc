<?php
namespace App;
use App\Controller;
use App\CrudController;
use App\DB;

class FormHandler extends Controller {
    
    protected function check(){
        
        //Get data from users table
        //$crud = new CrudController();
        $res = CrudController::get('users');
        
        $data = array();
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        $password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);       
        $c = count($res);                  
          for($i=0;$i<$c;$i++){
              if($res[$i]->email==$email && $res[$i]->password==$password){
                  return $data=array($email,$password);
              }
          }
           return 'error';  
   

                
        }       
    

    public function index(){
        
        if($this->check()=='error'){
            $data = 'All fields are required!';
            return $this->view->render('login/index',$data);  
        } else {
            $data=$this->check();
            $this->view->render('login/success',$data);
        }
         
    }
}