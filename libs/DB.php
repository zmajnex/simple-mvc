<?php 
//Model
namespace App;
use PDO;
use Dotenv;
class DB {
// Podatke učitava iz libs/.env 
public function __construct(){
  //$dotenv = new Dotenv\Dotenv(__DIR__);
  
  $path = $_SERVER['DOCUMENT_ROOT'].'/';
  //var_dump($path);
     $dotenv = new Dotenv\Dotenv($path);
     $dotenv->load();
}
public function connect(){ 
    
    $host= getenv('DB_HOST');
    $dbname= getenv('DB_NAME');
    $user= getenv('DB_USER');
    $password= getenv('DB_PASSWORD');
  
    $dsn = 'mysql:host='.$host.';dbname='.$dbname;
    $pdo = new PDO($dsn,$user,$password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    return $pdo;
}

}