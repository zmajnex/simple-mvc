<?php 
namespace Asgard;
use PDO;
use Dotenv;

class DB {
    //Instanciramo klasu da bi je mogli koristiti u index...
    /**
     * Private znači da se može pristupiti samo u okviru ove klase
     * static pozivamo je koristeći self::
     * static postoji i kada se neka metoda završi
     */
 private static $_instance = null;
    /** 
    *Donja crta samo je notacija znaci da su private i da se mogu koristiti samo u ovoj klasi
    *pdo koristimo za povezivanje sa db obj 
    *query poslednji upit koji ce se izvrsiti (executed) obj
    *error var
    *results array
    *count var int
    */
     
   
    private 
   
    $_pdo,
    $_query,
    $_error=false,
    $_results,
    $_count=0;
    private function __construct(){
        $path = $_SERVER['DOCUMENT_ROOT'].'/'; 
        
        $dotenv = new Dotenv\Dotenv($path);
        $dotenv->load();
        $host= getenv('DB_HOST');
        $dbname= getenv('DB_NAME');
        $user= getenv('DB_USER');
        $password= getenv('DB_PASSWORD');
      
        $dsn = 'mysql:host='.$host.';dbname='.$dbname;
        //$pdo = new PDO($dsn,$user,$password);

       try{
$this->_pdo=new PDO($dsn,$user,$password);
        
}
        catch(PDOException $e){
         die($e->getMessage());
        }
    }
    public function getInstance(){
        if(!isset(self::$_instance)){
           
//Ako _instance nije setovan a nije po defaultu onda ga setujemo i mozemo da koristimo sve iz nase klase tj obj            
            self::$_instance = new DB();
        }
//Ako dva puta pozovemo klasu ništa se neće dogoditi jer je instance setovan
        return self::$_instance;
    }
    /**
     * query izvršava SQL statement i vraća rezultat kao obj ili array...
     * $sql string
     * $params array
     * query i action su samo dve metode za metod get
     * $error uvek vraćamo na default da ne bi povukao grešku iz prethodnog querija
     */
    //---------------------------------------------------------------------------------------------
          //----------------------CORE METHODS QUERY AND ACTION---------------------------//
    //----------------------------------------------------------------------------------------------
    public function query($sql,$params =array(NULL)){
        $this->_error= false;
        //Proveravamo da li je query pravilno pripremljen da bi mogli da vežemo parametre
        if($this->_query= $this->_pdo->prepare($sql)){
            $x=1;
            if(count($params)){
                foreach($params as $param){
                    //Prvom ? u SQL dodeljujemo vrednost niza u nasem slučaju admin
                    //$param = admin
                    $this->_query->bindValue($x,$param);
                    $x++;
                }
            }
            if($this->_query->execute()){
               $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
               $this->_count = $this->_query->rowCount();
            }else {
                $this->_error=true;
            }
        }
        return $this;
    }
//ACTION-------------------------------------------------------    
    public function action($action,$table,$where=array(NULL)){
    if(count($where)===3){
        $operators =array('=','>','<','>=','<=');
        $field =$where[0];
        $operator =$where[1];
        $value =$where[2];
        if(in_array($operator,$operators)){
            //Za ? vezujemo vrednost bindValue()
          $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?" ; 
          if(!$this->query($sql,array($value))->error()){
              //Ne vraćamo nikakav rezultat samo izvršavamo metodu tj metode
             return $this;
          }
        }
    }
    //Prekidamo metod i skripta se ne izvršava
    //return false;
    //AKO NEMAMO WHERE
    $sql = "{$action} FROM {$table} " ; 
          if(!$this->query($sql,array(NULL))->error()){
              //Ne vraćamo nikakav rezultat samo izvršavamo metodu tj metode
             return $this;}
    }
//GET----------------------------------------------------------------------------------------------------    
    public function get($table,$where){
   return $this->action('SELECT *',$table,$where);
    }
//GET ALL-----------------------------------------------------------------------------------------------    
public function getAll($table){
    return $this->action('SELECT *',$table);
     }
//DELETE----------------------------------------------------------------------------------------------    
    public function delete($table,$where){
        return $this->action('DELETE',$table,$where);
    }
//INSERT---------------------------------------------------------------------------------------------    
    public function insert($table,$fields=array()){
        if(count($fields)){
            $keys = array_keys($fields);
            $values ='';
            $x=1;
           
            
            //uzima niz pravi ga u string i sve razdvaja `email`,`password`
            //Genijalno implod funkcijom dobijemo upit
            //INSERT INTO users (`email`,`password`)
            //.= Concatenation assignment $a .= $b	Appends $b to $ta
            foreach ($fields as $field){
                $values .='?';
                if($x<count($fields)){
                    //Ako nismo na kraju niza dodajemo ,
                  $values.=', ';
                }
                $x++;
            }
            $sql ="INSERT INTO $table (`". implode('`,`',$keys) ."`) VALUES ({$values})";
            if(!$this->query($sql,$fields)->error()){
             return true;
            }
        }
        return false;
    }
//UPDATE---------------------------------------------------------------------------------------------
public function update($table,$id,$fields=array()){
    $set ='';
    $x=1;
    
    foreach($fields as $key=>$value){
      $set.="{$key}=? ";
      if($x<count($fields)){
        $set.=', ';               
      }
      $x++;
    }
    $sql ="UPDATE {$table} SET {$set}WHERE id = {$id} ";
    //echo $sql;
    if(!$this->query($sql,$fields)->error()){
        return  true;

    }
    return false;
}


//Helpers methods
    public function results(){
        return $this->_results;
    }
    //Kada hoćemo da izaberemo samo jednog usera sa $where
    public function first(){
        return $this->results()[0];
    }
    public function error(){
        return $this->_error;
    }
    public function count(){
        return $this->_count;
    }
}