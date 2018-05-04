<?php 

use Core\DB;
use Core\Input;
use Core\Validate;

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
        //register user
    echo '<p style="color:red">You are succesfuly login<p>';
    }else {
        // Output errors
    foreach($validation->errors() as $error){
        echo"<p style='color:red'> $error,</p>";
       //da bi greške prebacili u view pravimo niz sa greškama
       //ova dva parametra prebacujemo u view, pronaći način da prebacis podatke kao niz 
       $msg_error[]=$error;
       $countErrorMsgs=count($msg_error);
    }
                                     
 }
 //Ovo vrtimo u view i prikazujemo greške
 $x;
 for ($x = 0; $x <$countErrorMsgs ; $x++) {
    echo $msg_error[$x]." <br>";
} 
   
 } 

?>
<?php 
if(($data!=null)){ echo "<div class='container-fluid mt-2'><div class='alert alert-warning text-center'>
<p>$data</p>
</div>
</div>";}; ?>
<div class="container-fluid mt-4 pt-4">
<div class="row justify-content-md-center">

<form action="registerform/set" method="post">
<div class="form-group">
    <h3 class="text-center text-light p-2 bg-success">Register</h3>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter email</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Enter your password</label> 
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-danger mt-2">Register</button>
</form>
</div>
</div>