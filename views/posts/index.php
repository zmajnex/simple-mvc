<!--Flash msg-->
<?php
if(isset($_SESSION['msg'])){
    echo "<div class='alert alert-danger alert-dismissible fade show'>
    <button type='button 'class='close' data-dismiss='alert'>&times;</button>
    $_SESSION[msg]
  </div>";
  unset($_SESSION['msg']);
}
?>
<div class="container-fluid m-2 p-4">
<h1 class="text-center">POSTS PAGE</h1>
<div class="row" class="m-2 p-2">
<a href="create" class="btn btn-primary m-2">Create new post</a>
</div>

<?php
if($data){

foreach ($data as $key){
    echo $key->title.'<br>';
    echo $key->body.'<br>';
    echo '<p><b class="text-primary">'.$key->author.'</b></p>';
    echo '<div class="row" class="m-2 p-2">
    
    <form action="showedit" method="POST">
    <input type ="hidden" name="id" value='.$key->id.'>
    <button   type= "submit" class="btn btn-success m-2">Edit</button>
    </form>

    <form action="destroy" method="POST">
    <input type ="hidden" name="id" value='.$key->id.'>
    <button   type= "submit" class="btn btn-danger m-2">Delete</button>
    </form>
    </div>';
    
}
}else {
echo 'No posts yet!';
}?>
</div>