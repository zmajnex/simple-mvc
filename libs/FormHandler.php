<?php
namespace App;
use App\Controller;
use App\CrudController;
use App\DB;
class FormHandler extends Controller {
    
    protected function check(){
        
        //Sanitaze form inputs !
        $crud = new CrudController();
       
        $res = $crud->get('users');
       
        $data = array();
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        $password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($email)||empty($password)){       
           return 'error';
        }else {
        foreach($res as $key){
            
            if($email!=$key->email|| $password !=$key->password) {
                return 'error';
             } 
            };
        }
       
        //else {
            //$data= password_hash($password,PASSWORD_BCRYPT);
            $data=[$password,$email,$res];
           
        return $data;
        //}               
    }

    public function index(){
        
        if($this->check()=='error'){
            $data = 'All fields are required!';
            return $this->view->render('login/index',$data);  
        } else {
            $data=$this->check();
            $this->view->render('posts/index',$data);
        }
         
    }
}