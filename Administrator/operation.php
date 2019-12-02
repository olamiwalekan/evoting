<?php include('delete.class.php'); ?>
<?php
if (isset($_POST['type']) && $_POST['type'] == 'new_post'){
	$post_title = $_POST['post_title'];
	$post = new delete;
	$link = $post->table('evotingdb');
	$query = "SELECT count(`id`) FROM `evotingdb`.`demo_post` WHERE `Title` LIKE '$post_title'";
	$post->execute($query);
	while($post->valid())
	{
	$me = $post->current();
	$count = $me[0];
	$post->next();
	}
	if($count >0)
	{
	header('location:index.php?page=post');
	}
	else{
	$sql = "INSERT INTO `evotingdb`.`demo_post` (`id`, `Title`) VALUES (NULL, '$post_title');";
	$post->delete_it($sql);
	if(mysql_affected_rows() > 0)
	{
		echo 'succesfull';
		header('location:index.php?page=post');
	}
	else { 
		echo 'failed'.mysql_error(); }
	}
}
?>
<?php
if (isset($_POST['type']) && $_POST['type'] == 'new_aspirant'){
	if($_POST['aspirant_name'] != '' && $_POST['aspirant_blob'] !='' && $_POST['aspirant_post'] !='' )
	{
	$aspirant_name = $_POST['aspirant_name'];
	$aspirant_blob = $_POST['aspirant_blob'];
	$aspirant_post = $_POST['aspirant_post'];
	$post = new delete;
	$link = $post->table('evotingdb');
	$sql = "INSERT INTO `evotingdb`.`demo_cand` (`cand_id`, `post_id`, `cand_name`, `blob`, `DEPT_ID`) VALUES (NULL, '$aspirant_post', '$aspirant_name', '$aspirant_blob', '12');";
	$post->delete_it($sql);
	if(mysql_affected_rows() > 0)
	{
		echo 'succesfull';
		header('location:index.php?page=aspirant');
	}
	else { 
		echo 'failed'.mysql_error(); }
	}
	else{
		header('location:index.php?page=aspirant');
	}
}
?>
<?php
if (isset($_POST['type']) && $_POST['type'] == 'new_eligible'){
	if($_POST['matric_no'] != ''&& is_numeric($_POST['matric_no']) )
	{
	$matric_no = strip_tags($_POST['matric_no']);
	$sql = "INSERT INTO `evotingdb`.`demo_eligible` (`id`, `MATRIC_NO`, `status`) VALUES (NULL, '$matric_no', 'active');";
	$post = new delete;
	$link = $post->table('evotingdb');
	
	$post->delete_it($sql);
	if(mysql_affected_rows() > 0)
	{
		echo 'succesfull';
		header('location:index.php?page=eligible');
	}
	else { 
		echo 'failed'.mysql_error(); }
	}
	else{
		header('location:index.php?page=eligible');
	}
}
?>