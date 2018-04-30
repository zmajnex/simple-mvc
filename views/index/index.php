<div class="container-fluid m-2 p-4">
<h1> Home page </h1>
<p>MY-MVC v1.0.</p>
<p><i> zmajnex@yahoo.com</p>
<?php

//print_r($data)
//U kontroleru nam je data u stvari res
foreach($data as $key){
    echo $key->title.'<br>';
    echo $key->body.'<br>';
    echo '<p><b class="text-primary">'.$key->author.'</b></p>';
 }
?>
</div>