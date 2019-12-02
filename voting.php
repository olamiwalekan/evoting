<?php
define('connector',include ('database connector.php'));
require_once('candidatepost.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
<title>Voting page</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/examples.css">
<link rel="stylesheet" href="css/radios-to-slider.css">
<link rel="stylesheet" type="text/css" href="css/logstyle.css" />

<link rel="stylesheet" type="text/css" href="multiform/examples/css/ui-lightness/jquery-ui-1.8.2.custom.css" /> <script src="html5.js"> </script>
<style>
body{
	margin:auto;
color:#090;	
	
	
}
.fbreg{
	height: 39px;
	width: 41px;
	position: absolute;
	left: 865px;
	top: 13px;
	overflow: auto;
	-webkit-border-radius: 8px 8px 8px 8px;
	-moz-border-radius: 8px 8px 8px 8px;
	border-radius: 8px 8px 8px 8px;
}
.twitterreg{
	height: 39px;
	width: 39px;
	position: absolute;
	overflow: auto;
	-webkit-border-radius: 8px 8px 8px 8px;
	-moz-border-radius: 8px 8px 8px 8px;
	border-radius: 8px 8px 8px 8px;
	left: 820px;
	top: 13px;
}
#unav{
	
	font-family:"Lucida Console", Monaco, monospace;	
}
#pic{
	background-color:#CCC;
	height:250px;
	width:800px;
	margin-left:55px;
	margin-right:55px;
	margin-top:366px;
	border-radius:5px;
	-webkit-border-radius:5px;
}
.post{
	font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-size:25px;
	color:#060;
}
</style>
</head>

<body>
<strong><?php
session_start();

if( ($_SESSION['logged']=='') || !isset($_GET['matric']) ) {			// if this file is accessed without first going through index.php redirect
	header('location:voter_registration.php');
	exit;
} 
else{
if (isset($_GET['matric']))	{
$ID = $_GET['matric'];
}
}

$_SESSION['voters_id'] = $ID;
?>

<?php
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
?>
<?php
$sql = "SELECT *
FROM `demo_post`"; 
$query = mysql_query($sql,$dbconnect);	
if (!$query){
die(mysql_query());	
}
while ($row = mysql_fetch_assoc($query)){
$post_id[] = $row['id'];
$title[] = $row['Title'];

}
?>

<div id="big_div" align="center">
<div id="content">

<div id="demoWrapper">
	
			<hr />
			<h5 id="status"></h5>
			<form id="demoForm" method="post" action="vote_processor.php" class="bbq">
			  <div id="fieldWrapper">
               <?php
			  for($l=0; $l<count($post_id); $l++)
			  {
				  $m =$l +1;
			  ?>
				<div class="step" id="<?php echo $m; ?>">
					<span class="font_normal_07em_black post" style="text-transform:lowercase;">Candidate For <?php echo $title[$l]; ?></span><br />
					<div id="radios<?php echo $m; ?>">  
<?php
$fetched = cand_selector($dept,$title[$l]);

for ($i=0; $i<count($fetched); $i++)

for ($j=0; $j<count($fetched[$i]); $j++)
{{

?>


<fieldset><label for="<?php echo "option".$i; ?>" style="font-size:14px ;"> <?php print_r($fetched[$i][$j]); ?> </label>
<input id=<?php echo "option".$i; ?> name="post<?php echo $l; ?>" type="radio" value="<?php print_r($fetched[$i][$j]); ?>" /></fieldset>
    


<?php
}}
?>
</div>
				</div>
                <?php
			  }
				?>
				
				
                
         
                     
                
            <?php /*?><input type="hidden" name="voters_id" value=<?php echo $matric; ?>   > <?php */?>   
                
				</div>
				<div id=" "> 							
					<input class="navigation_button" id="back" value="Back" type="reset" />
					<input class="navigation_button" id="next" value="Next" type="submit" />
				</div>
			</form>
			<hr />
			
			<p id="data"></p>
            
            
            
            

	</div>

    
    
  


<div class="nav">
<input type="button" name="back" value="previous" onClick="return goBack()" class="nav icon-bell"/>
</div>

</div>

  <div class="body_div" align="center"></div>
  <div  id="textlogo"> </div>
  <div class="image_div" ></div>
  <div class="footer" data-role="footer"><strong><a href="http://facebook.com/horllaysco"><img src="img/fb.gif"alt="twitter page" width="40" height="42" class="fbreg" longdesc="http://twitter.com/horllaysco" /></a></strong><strong><a href="http://twitter.com/horllaysco"><img src="img/twitterl.gif"alt="twitter page" width="50" height="42" class="twitterreg" longdesc="http://twitter.com/horllaysco" /></a></strong></div>
</div></strong>
  
  
  
  
  
  
  
</div>

 
<script type="text/javascript" src="multiform/js/jquery-1.4.2.min.js"></script>		
<script type="text/javascript" src="multiform/js/jquery.validate.js"></script>
<script type="text/javascript" src="multiform/js/jquery.form.js"></script>
<script type="text/javascript" src="multiform/js/bbq.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/jquery.radios-to-slider.js"></script> 
<script src="js/index.js"></script>
<script type="text/javascript" src="multiform/js/jquery-ui-1.8.5.custom.min.js"></script>
<script type="text/javascript" src="multiform/js/jquery.form.wizard.js"></script>

<script type="text/javascript">
			$(function(){
				$("#demoForm").formwizard({ 
				 	validationEnabled: false,
				 	focusFirstInput : true,
				 }
				);
  		});
    </script> 
    <script>
	function goBack()
	{
	var page;
	page = document.referrer
	self.location = page;
	}
	</script>
   
</body>
</html>