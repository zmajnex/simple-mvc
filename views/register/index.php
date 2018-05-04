<?php 
//use App\Token;
                                     
 
 //Ovo vrtimo u view i prikazujemo greške
 /*$x;
 for ($x = 0; $x <$countErrorMsgs ; $x++) {
    echo $msg_error[$x]." <br>";
 } */
   
 

?>
<?php 

if(($data!=null)){
   
  echo "<div class='container-fluid mt-2'><div class='alert alert-warning text-center'>
<p>".$data['msg']."</p>
</div>
</div>";} ?>
<div class="container-fluid mt-4 pt-4">
<div class="row justify-content-md-center">

<form action="registerform/checkform" method="post">
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
  <!--Hidden input with value="token"-->
  <input type="hidden" class="form-control" name="token" value="<?php echo $data['token']?>">
  <button type="submit" class="btn btn-danger mt-2">Register</button>
</form>
</div>
</div>
<?php if(isset($data['token']))
{
   echo var_dump($data['token']);
}