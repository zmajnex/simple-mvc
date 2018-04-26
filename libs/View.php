<?php
namespace App;
class View {
    function __construct(){
     
    }
    //$data sluzi da prihvati podatke koje salje kontroler, 
    //null je da može da radi i ako se ne prenesu podaci
    public function render($ime,$data=null){
     require 'views/layouts/header.php';
     require 'views/layouts/navbar.php';
     require 'views/'.$ime.'.php';
     require 'views/layouts/footer.php';
    }
  
}
?>