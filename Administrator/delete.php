<?Php  
include_once('delete.class.php');
?>
<?Php
if (isset($_GET['stud_delete'])){
	$id = $_GET['id'];
	$delete = new delete;
	$link = $delete->table('evotingdb');
	$query = "DELETE FROM `laspotech_e_election`.`demo_eligible` WHERE `demo_eligible`.`id` = $id";
	$delete->execute($query);
	if(mysql_affected_rows()>0)
	{
	header('location:index.php?page=eligible&msg=successfull');
	}
	else {
		echo 'failed';
	}
}
?>

<?Php
if (isset($_GET['aspirant_delete'])){
	$id = $_GET['id'];
	$delete = new delete;
	$link = $delete->table('evotingdb');
	$query = "DELETE FROM `evotingdb`.`demo_cand` WHERE `demo_cand`.`cand_id` = $id";
	$delete->execute($query);
	if(mysql_affected_rows()>0)
	{
	header('location:index.php?page=aspirant&msg=successfull');
	}
	else {
		echo 'failed';
	}
}
?>

<?Php
if (isset($_GET['post_delete'])){
	$id = $_GET['id'];
	$delete = new delete;
	$link = $delete->table('evotingdb');
	$query = "DELETE FROM `evotingdb`.`demo_post` WHERE `demo_post`.`id` = $id";
	$delete->execute($query);
	if(mysql_affected_rows()>0)
	{
	header('location:index.php?page=post&msg=successfull');
	}
	else {
		echo 'failed';
	}
}
?>