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
}
}else {
echo 'No posts yet!';
}?>
</div>