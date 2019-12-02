<?php
 include('database connector.php');
 include ('candidatepost.php');
?>
<?php
$dept = '12';
session_start();


if( ($_SESSION['logged']=='') || !isset($_GET['matric']) || !isset($_GET['type'])) {			// if this file is accessed without first going through index.php redirect
	
		
}
elseif (isset($_GET['type']) ){
	$dept = 12;
	echo 'did';
}
else{
$ID = $_GET['matric'];

$sql = "SELECT *
FROM `reg_student`
WHERE `MATRIC_N0` = '$ID' "; 
$query = mysql_query($sql,$dbconnect);	
if (!$query){
die(mysql_query());	
}
while ($row = mysql_fetch_assoc($query)){
$matric = $row['MATRIC_N0'];
$faculty = $row['FACULTY_ID'];
$dept = $row['DEPT_ID'];
}

}
$query1 = "SELECT *
FROM `options`
WHERE `optionname` LIKE 'endtime'
ORDER BY `options`.`optionname` ASC
LIMIT 0 , 30";
$query2 = mysql_query($query1, $dbconnect);
if (!$query2)
{   die(mysql_error());
}
while($rowed = mysql_fetch_array($query2))
{ 
 $res = $rowed['showToggle'];
}

?>


<?php


function count_vote($post_id, $cand_name){
$dbconnect=mysql_connect("localhost","root","");
if(!$dbconnect)
{
die("unable to connect");
}

$selected=mysql_select_db("laspotech_e_election",$dbconnect);


$sql = "SELECT count('cand_id') FROM `demo_vote` WHERE `post_id` ='$post_id' AND `cand_name` = '$cand_name'";
$query = mysql_query($sql, $dbconnect);
while($row = mysql_fetch_array($query))
{ 
$num = $row[0];

return $num;
}
}


function count_tot($post_id){
$dbconnect=mysql_connect("localhost","root","");
if(!$dbconnect)
{
die("unable to connect");
}

$selected=mysql_select_db("laspotech_e_election",$dbconnect);
$sql = "SELECT count('post_id') FROM `demo_vote` WHERE `post_id` ='$post_id'";	
$query = mysql_query($sql, $dbconnect);
while($row = mysql_fetch_array($query))
{ 
$tot = $row[0];

return $tot;

}
}
/*$tot = 180;
$perctot = 100;
$percnum = ($perctot * $num)/$tot;
echo $percnum.'%'; */
?>
<?php
$sql = "SELECT *
FROM `demo_post`"; 
$query = mysql_query($sql,$dbconnect);	
if (!$query){
die(mysql_query());	
}
while ($row = mysql_fetch_assoc($query)){
$post_ids[] = $row['id'];
$titles[] = $row['Title'];

}
?> 
<!DOCTYPE html ><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css" >
#faceb {
	position: absolute;
	left: 871px;
	top: 694px;
	padding-bottom:0px;
}
#completetext{
	font:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:60px;
	padding-left:10px;
	text-shadow: 2px 2px 2px #006600;
	marquee-direction:reverse;
	marquee-style:slide;
	
}
.bar{
	border-radius:5px;
	-webkit-border-radius:5px;}
</style>
</head>

<body>
<div id="big_div" align="center">
  <div class="body_div" align="center"></div>
  <div id="completed"><?php 
  if ($res == 'ON'){
	  for($z=0; $z<count($post_ids); $z++)
	  {
	  echo '<div style="font:15px; font-weight:bolder;">'.$titles[$z].'</div>
	   <table border="0" cellspacing="3" cellpadding="1">';
        for ($i=0; $i<=1; $i++){
			$tot = count_tot($post_ids[$z]);
			$fetched = cand_selector($dept,$titles[$z]);

$perctot = 100;
$widthtot = 200;
/*$percnum = ($perctot * $num)/$tot;
echo $percnum.'%'; */
for ($i=0; $i<count($fetched); $i++)

for ($j=0; $j<count($fetched[$i]); $j++)
{{
          echo '<tr>
            <td style="font-size:13px;">'.$fetched[$i][$j].'</td>';
		if ( count_vote($post_ids[$z],$fetched[$i][$j]) == 0) {
				$width = 0;
			} else {
$width = ($widthtot * count_vote($post_ids[$z],$fetched[$i][$j]))/$tot;  }
           echo' <td><img src="img/blue'.$z.'.gif" height="15" width="'.$width.'" alt="" border="0" class="bar"></td>
            <td>&nbsp;&nbsp;&nbsp;';  if ( count_vote($post_ids[$z],$fetched[$i][$j]) == 0) {
				$vote = 0; } else { $vote = ($perctot * count_vote($post_ids[$z],$fetched[$i][$j]))/$tot; } echo count_vote($post_ids[$z],$fetched[$i][$j]).'votes</td>
            <td>&nbsp;&nbsp;&nbsp;'.$vote.'%</td>
          </tr>';
		}
}}
     
     echo  '</table>';
	  }
          /*<tr>
            <td>Windows</td>
            <td><img src="img/blue.gif" height="15" width="200" alt="" border="0"></td>

            <td>&nbsp;&nbsp;&nbsp;4</td>
            <td>&nbsp;&nbsp;&nbsp;28.57 %</td>
          </tr>
        
          <tr>
            <td>Unix</td>
            <td><img src="img/blue.gif" height="15" width="150" alt="" border="0"></td>
            <td>&nbsp;&nbsp;&nbsp;3</td>

            <td>&nbsp;&nbsp;&nbsp;21.43 %</td>
          </tr>
        
          <tr>
            <td>Macintosh</td>
            <td><img src="img/blue.gif" height="15" width="100" alt="" border="0"></td>
            <td>&nbsp;&nbsp;&nbsp;2</td>
            <td>&nbsp;&nbsp;&nbsp;14.29 %</td>

          </tr>
        
          <tr>
            <td>OS/2</td>
            <td><img src="img/blue.gif" height="15" width="50" alt="" border="0"></td>
            <td>&nbsp;&nbsp;&nbsp;1</td>
            <td>&nbsp;&nbsp;&nbsp;7.14 %</td>
          </tr>*/
		     
	
  }
  else{
  echo'<span id="completetext"> voting completed</span><br><code>the vote result will be displayed shortly</code>'; 
  } ?>
  </div>
  <div  id="textlogo"> </div>
  <div class="image_div" ></div>
  <div class="footer"></div><a href="http://facebook.com/horllaysco"><img src="img/fb.gif"alt="twitter page" width="50" height="45" id="faceb" longdesc="http://twitter.com/horllaysco" /></a></div>

</body>
</html>