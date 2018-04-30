<?php
namespace App;
use App\Controller;
use App\CrudController;
use App\DB;
use PDO;

class RegisterFormHandler extends Controller {
   
    public function set(){
        $db= new DB();
        $email = $_POST['email'];
        $password= $_POST['password'];        
        $sql =("INSERT INTO `users` (`email`,`password`)  VALUES ( :email , :password)");         
          $stmt = $db->connect()->prepare($sql);          
      
          $stmt->execute(['email'=>$email,'password'=>$password]);
        
          echo "Inserted successfully";
    
    }
        
       

    public function index(){
        
    
     return $this->view->render('login/index');   
    }
}