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
	$res .='<tr><td><a href="delete.php?post_delete&id='.$id[$i].'" style="color:rgba(255,0,0,1); font-weight:bolder;">X</a></td><td>'.$id[$i].'</td><td>'.$title[$i].'</td></tr>';
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
<div id="field"><form method="post" action="operation.php" name="new_post"><fieldset><label>Post Name : </label><input type="text" name="post_title"></fieldset><input type="hidden" value="new_post" name="type"/><input type="submit" value="ADD  POST"></form>
</div>
</div>
<div class="current"><div id="span"><span> ALL Current Available Post</span></div>
<div class="list">
<div class="tab_wrapper" style=" height:400px; overflow:auto;">
<table id="rounded-corner" summary="post and number of aspirants">
    <thead>
    	<tr>
        	<th scope="col"></th>
        	<th scope="col" class="rounded-company">post id</th>
            <th scope="col" class="rounded-q1">Post title</th>
          
        </tr>
    </thead>
        
<tbody>
<span class="<?php echo $class; ?>" style="color:rgba(0,153,0,1);">NO DATA YET</span>
<?php
echo $res;
?>
</tbody>
</table>
</div></div>
 </div></div>