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
    //Kada pozovem metod set() parametri će mu biti vrednosti forme, ako nece ovako probati sa session
    public function set($title,$body,$author,$created_at){
        $db = new DB();
        $sql = 'INSERT INTO posts(title,body,author,created_at) VALUES (:title,:body,:author,:created_at)';

// 
     $stmt = $db->connect()->prepare($sql);        
     $stmt->execute(['title'=>$title, 'body'=>$body, 'author'=>$author, 'created_at'=>$created_at]);    
     
        
        return true;
    }
    public function update($id){
        
    }
    public function delete($id){
        
    }
}