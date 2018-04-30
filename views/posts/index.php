<div class="container-fluid m-2 p-4">
<h1>POSTS PAGE</h1>
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