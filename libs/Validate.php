<?php 
namespace App;
class Validate {
    private $_passed = false;
    private $_errors = array();
    private $_db = null;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

public function check($source,$items=array()){
    //$items je username, password,...
    //items=>$rules min, max required... 
    //$rule_value 2, 20, true...
    foreach($items as $item=>$rules){
        foreach($rules as $rule=>$rule_value){

    //echo "{$item} {$rule} must be {$rule_value}<br>  ";
    //$source je $_POST ili $_GET
    //$value je vrednost iz inputa
    //trim da izgubimo tzv whitespace
             $value = trim($source[$item]);
             //echo $value;
             if($rule==='required' && empty($value)){
             $this->addError("{$item} is required!");

             }
             else if(!empty($value)) {
             switch($rule){
                 case 'min' :
                   if(strlen($value) < $rule_value){
                           $this->addError("{$item} must be at minimum {$rule_value} charachters");
                   }
                 break;
                 case 'max' :
                 if(strlen($value) > $rule_value){
                    $this->addError("{$item} must be at maximum {$rule_value} charachters");
            }
                 break;
                 case 'matches' :
                 if($value !=$source[$rule_value]){
                    $this->addError("{$rule_value} must match {$item}");
                 }
                 break;
                 //ovde proveravamo sa bazom podataka
                 case 'unique' :
                 //$item je username iz tabele users  $value nasa vrednost;
                 $check=$this->_db->get($rule_value,array($item,'=',$value ));
                 if($check->count()){
                  $this->addError("{$item} already exists try another!");
                 }
                 break;
                 default;
             }
             }
        }
    }
    //Kada smo završili sa looping proveravamo da li je nas niz sa geškama prazan
    if(empty($this->_errors)){
        $this->_passed=true;
    }
    return $this;
}

private function addError($error){
$this->_errors[]=$error;
}
public function errors(){
    return $this->_errors;
}
public function passed(){
    return $this->_passed;
}
}