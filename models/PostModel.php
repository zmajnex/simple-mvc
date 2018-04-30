<?php
namespace Model;
use App\DB;
use PDO;
/**
 * Post Model for basic CRUD functionality
 */
class PostModel extends DB {

    public function get(){
     $db = new DB();
     $sql=('SELECT * FROM posts');
     $stmt = $db->connect()->prepare($sql);
        $stmt->execute([$sql]);
         
         $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        return $results;
    }
    public function set(){
        
    }
    public function update($id){
        
    }
    public function delete($id){
        
    }
}