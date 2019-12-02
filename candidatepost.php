<?php
require_once('database connector.php');

?>


<?php
function fetch_post($deptid,$post_title )
{
$dbconnect=mysql_connect("localhost","root","");
if(!$dbconnect)
{
die("unable to connect");
}
$selected=mysql_select_db("laspotech_e_election",$dbconnect);
$sql = "SELECT `department_post`.`post_title`, `department_post_candidate`.`candidate`, `department_post_candidate`.`DEPT_ID`\n"
    . "FROM department_post, department_post_candidate\n"
    . "WHERE ((`department_post`.`post_id` = `department_post_candidate`.`post_id`)AND(`department_post_candidate`.`DEPT_ID` ='$deptid')AND(`department_post`.`post_title` = '$post_title' ))\n"
    . " LIMIT 0, 30 ";
$query = mysql_query($sql,$dbconnect);

$num_rows = mysql_num_rows($query);
if ($num_rows>0)
{


while($row = mysql_fetch_assoc($query))
{
$fetch[] = array($row['candidate']);	
	
}
return $fetch;
}
else {
	echo "for this section not available yet";
}
}
?>

<?php


/*$fetched = fetch_post(10,'Nacoss General Secetary');

for ($i=0; $i<count($fetched); $i++)

for ($j=0; $j<count($fetched[$i]); $j++)
{{
print_r($fetched[$i][$j]);
?>

</br>
<input name="vote" type="radio" value="<?php print_r($fetched[$i][$j]); ?>" />
</br>
<?php
}}
*/?>
<?php
function post_count()
{
$connect = mysql_connect("localhost", "root", "");
$db = mysql_select_db("laspotech_e_election", $connect);
if(!$connect)
{
die("unable to connect");
}
$sql = "SELECT count(*) FROM `department_post` ";
$query = mysql_query($sql, $connect);
$num_rows = mysql_num_rows($query);
if ($num_rows>0)
{
while($row = mysql_fetch_array($query))
{
$num = $row[0];
return $num;


}
mysql_close();
}

}
















?>

<?php 
function cand_selector($deptid, $post_title){
$connect = mysql_connect("localhost", "root", "");
$db = mysql_select_db("laspotech_e_election", $connect);
if(!$connect)
{
die("unable to connect");
}
$dbquery = "SELECT `demo_cand`.`cand_name`, `demo_post`.`Title`, `demo_cand`.`blob`
FROM demo_cand, demo_post
WHERE ((`demo_cand`.`post_id` =`demo_post`.`id`) AND (`demo_cand`.`DEPT_ID` ='$deptid') AND (`demo_post`.`Title` ='$post_title')) ";

$query = mysql_query($dbquery, $connect);
$num_rows = mysql_num_rows($query);
if ($num_rows>0)
{
while($row = mysql_fetch_array($query))
{
$candname[] = array($row['cand_name']);
$title[] = array($row['Title']);
$blob[] = array($row['blob']);

}
return $candname;

}
else{
echo "Its not yet time for election"."<br><cite>check back later</cite><br>";	
}
}