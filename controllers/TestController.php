<?php

use App\Controller;
use Jenssegers\Blade\Blade;
class TestController extends Controller  {
    function __construct(){
        parent :: __construct();
      }

  
    public function test(){
        
        //echo "Hello im test Controller<br> ";
        $blade = new Blade('views', 'cache');
        echo $blade->make('test/index');

    }
}