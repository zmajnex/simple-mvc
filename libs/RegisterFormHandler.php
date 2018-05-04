<?php
namespace App;
use App\Controller;
use App\CrudController;
use App\DB;
use PDO;
use Asgard\DB as DatabaseValidation;
use App\Input;
use App\Validate;
use App\Token;
use App\Session;
class RegisterFormHandler extends Controller {
  
       

//From validate and input
    public function checkform(){
        if((Input::exists())){
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                //rules for validation
                'email'=>array(
                    'required'=>true,
                    //'min'=>2,
                    //'max'=>10,
                    'unique'=>'users'
                ),
                'password'=>array(
                 'required'=>true,
                 'min'=> 6,
                 
                )
            ));
            $msg_error=array();
            if($validation->passed()){

                return $this->set();
            }else {
                // Output errors
            foreach($validation->errors() as $error){
 
              // $msg_error[]=$error;
              // $countErrorMsgs=count($msg_error);
               $msg=$error;
               
               return $this->view->render("register/index",$msg);
            }
                                             
         }


    }
}
    public function set(){
        $db= new DB();
        $email = $_POST['email'];
        $password= $_POST['password'];        
        $sql =("INSERT INTO `users` (`email`,`password`)  VALUES ( :email , :password)");         
          $stmt = $db->connect()->prepare($sql);          
      
          $stmt->execute(['email'=>$email,'password'=>$password]);
        
          $data= "Inserted successfully you are ready for loggin";
          //Minor problem with paths (paths da se vrati na login url)
          return $this->view->render('login/index',$data); 
    }
        
       

    public function index(){
        
    // ovde prenesi Token 
    
       
     return $this->view->render('login/index');   
    }
}