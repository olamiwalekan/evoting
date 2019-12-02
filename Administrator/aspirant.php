<?php

include('delete.class.php');
$db = new delete;
$db->table('evotingdb');
$sql = "SELECT * FROM `demo_post` LIMIT 0, 30 ";
$db->execute($sql);
$res = '';
$id = '';
$class='';
while($db->valid())
{
$me = $db->current();

$id[] = $me['id'];
$title[] = $me['Title'];
$db->next();
}
if($id != ''){
for($i=0; $i<count($id); $i++){
	$res .='<option value='.$id[$i].'>'.$title[$i].'<option/>';
}

}

?>
<?php

$sql = "SELECT * FROM `demo_cand` LIMIT 0, 30 ";
$db->execute($sql);
$res1 = '';
$post_id = '';
$class='';
while($db->valid())
{
$me = $db->current();
$cand_id[] = $me['cand_id'];
$post_id[] = $me['post_id'];
$cand_name[] = $me['cand_name'];
$blob[] = $me['blob'];
$db->next();
}
if($post_id != ''){
for($i=0; $i<count($post_id); $i++){
	$res1 .='<tr><td><a href="delete.php?aspirant_delete&id='.$cand_id[$i].'" style="color:rgba(255,0,0,1); font-weight:bolder;">X</a></td><td>'.$post_id[$i].'</td><td>'.$cand_name[$i].'</td><td>'.$blob[$i].'</td></tr>';
}
$class= 'hide';


}
?>
<style>
.hide{
	visibility:hidden;
}
</style>
<div><div class="new">
<div id="span"><span>ADD A New Aspirant Post</span></div>
<div id="field"><form method="post" action="operation.php" name="new_aspirant"><fieldset><label>Aspirant Name : </label><input type="text" name="aspirant_name"></fieldset><fieldset><label>Aspirant BLOB : </label><input type="text" name="aspirant_blob"></fieldset><fieldset>Contesting post : <select name="aspirant_post"><option value="">--select a post---</option><?php echo $res; ?></select></fieldset><input type="hidden" value="new_aspirant" name="type"/><input type="submit" value="ADD  An Aspirant"></form>
</div>
</div>
<div class="current"><div id="span"><span> ALL Current Available Aspirants</span></div>
<div class="list">
<div class="tab_wrapper" style=" height:400px; overflow:auto;">
<table id="rounded-corner" summary="post and number of aspirants">
    <thead>
    	<tr>
        	<th scope="col"></th>
        	<th scope="col" class="rounded-company">post id</th>
            <th scope="col" class="rounded-q1">Aspirant Name</th>
          	<th scope="col" class="rounded-q1">Aspirant Blob</th>
        </tr>
    </thead>
        
<tbody>
<span class="<?php echo $class; ?>" style="color:rgba(0,153,0,1);">NO DATA YET</span>
<?php  	echo $res1;		?>
</tbody>
</table>
</div></div>
 </div></div>