<?php
class connection {
private $query;
public $result;
public $table;
public $connect;
private $database;
private $valid;
private $key=0;
public $counter;

public function  __construct(){
	$this->connect = mysql_connect('localhost','root','');
}
public function table($db){
	$this->database = mysql_select_db($db,$this->connect);	
}
public function execute($query){
	$this->result = mysql_query($query, $this->connect);	
	if (mysql_num_rows($this->result )> 0){
		$this->next();
	}
}
public function countResult(){
	/* if (mysql_num_rows($this->result >= 0)){
	$this->counter = mysql_num_rows($this->result);	
	return $this->counter;
	$this->next(); 
}*/
}
public function rewind() {} 
public function current() { 
	return $this->data; 
}  
		   
public function key() {    return $this->key;  
} 
 
public function next() {   
	if ($this->data = mysql_fetch_array($this->result))   
	{      $this->valid = true;      
		$this->key+=1;    
}   
	else     $this->valid = false;  
}  
public function valid() {   
	return $this->valid; 
} 

   function __destruct(){

	}

}



?>
<?php

?>
