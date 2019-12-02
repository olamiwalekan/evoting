<?php
include('connection.class.php');
?>
<?php
class delete extends connection{
	public $affected;
	
	public function delete_it($query){
	$this->result = mysql_query($query, $this->connect);	
	}
	public function check_result(){
	$this->affected = mysql_affected_rows($this->result);		
	}
}

?>