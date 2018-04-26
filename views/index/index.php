<div class="container-fluid">
<h1>Ovo je home stranica</h1>
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