<?php 
namespace App;
use PDO;
use Dotenv;
/**
 * Class DB used for database connection
 * Dotenv class for storing sensitive credentials to .env file
 */
class DB {

public function __construct(){

  $path = $_SERVER['DOCUMENT_ROOT'].'/';  
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