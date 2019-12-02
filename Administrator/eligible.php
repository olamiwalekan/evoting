<?php

include('delete.class.php');
$db = new delete;
$db->table('evotingdb');
$sql = "SELECT * FROM `demo_eligible` LIMIT 0, 30 ";
$db->execute($sql);
$res = '';
$id = '';
$class='';
while($db->valid())
{
$me = $db->current();

$id[] = $me['id'];
$matric[] = $me['MATRIC_NO'];
$status[] = $me['status'];
$db->next();
}
if($id != ''){
for($i=0; $i<count($id); $i++){
	$res .='<tr><td><a href="delete.php?stud_delete&id='.$id[$i].'" style="color:rgba(255,0,0,1); font-weight:bolder;">X</a></td><td>'.$id[$i].'</td><td>'.$matric[$i].'</td><td>'.$status[$i].'</td></tr>';
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
<div id="span"><span>ADD Eligble Voters </span></div>
<div id="field"><form method="post" action="operation.php" name="new_post"><fieldset><label>Matric no : </label><input type="text" name="matric_no"></fieldset><input type="hidden" value="new_eligible" name="type"/><input type="submit" value="ADD  matric"></form>
</div>
</div>
<div class="current"><div id="span"><span> Current eligible voters</span></div>
<div class="list">
<div class="tab_wrapper" style="width:400px; height:400px; overflow:auto;">
<table id="rounded-corner" summary="post and number of aspirants" >
    <thead>
    	<tr>
        <th scope="col"></th>
        	<th scope="col" class="rounded-company"> id</th>
            <th scope="col" class="rounded-q1">Matriculation Number</th>
          <th scope="col" class="rounded-q1">Status</th>
        </tr>
    </thead>
        
<tbody>
<span class="<?php echo $class;?>" style="color:rgba(0,153,0,1);">NO DATA YET</span>
<?php
echo $res;
?>



</tbody>
</table>
</div> 
</div>
 </div></div>