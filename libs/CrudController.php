<?php
//Controller
namespace App;
use App\DB;
use App\Controller;
class CrudController extends Controller {
    public function get($tablename=null){
       $db=new DB();
        //$tablename= getenv('DB_TABLE_NAME');
        $sql ="SELECT * FROM $tablename";
        $stmt = $db->connect()->prepare($sql);
        $stmt->execute([$sql]);
        $results = $stmt->fetchAll();
        return $results;
    
    }
    public function set(){
        echo 'Im method for  adding to database';
    }
    public function update(){
        echo 'Im method for updating database';
    }
    public function delete(){
        echo 'Im method for deleting records from database';
    }
}