 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title> eVoting portal</title>


	<style type="text/css">

#big_div #form form table {
	font-weight: bold;
	text-align: right;
}
.adm{
	 width:120px;
	 height:30px;
	 float:right;
	 border:1px #CCCCCC;
	 border-radius:5px;
	 background-color:rgba(102,102,102,0.5);
	 list-style:none;
	 margin-top:20px;
	 padding-left:15px;
}

</style>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="WOWSlider-master/sample/styles/style.css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/logstyle.css" />
</head>


<body onload="empty();">

<div align="center" class="all" id="big_div">

<div class="body_div" >
   
</div>

<div id="form">
   
<form action="reg_processor.php" name="form1" method="post" onsubmit="return validate2()">
<table width="469" height="493" border="0">
<tr>
<td width="157"><span class="text">Matric NO</span>:</td>
<td height="47"><div data-role="fieldcontain">
  <input name="matric_no" type="text" class="box" id="matric_no" onchange="MM_validateForm('matric_no','','NinRange100000000:199999999');return document.MM_returnValue" maxlength="12" placeholder=" matric number"/></td>
 <td width="65"></td>
</tr>
<tr>
<td height="40" onchange="MM_validateForm('matric_no','','NinRange11:11');return document.MM_returnValue"><span class="text">First Name:</span></td>
      <td width="233" height="47"><label>
        <input name="f_name" type="text" class="box" id="f_name" placeholder="  first name "/>
        <br />
      </label></td><?php

if (isset($_GET['matric']))
{
$matric1 = 	$_GET['matric'];
echo "<b >INVALID MATRIC   ".$matric1."</b>";
}
elseif (isset($_GET['empty'])){
echo "All fields are important";	
}
?>
    </tr>
    <tr>
      <td height="40" onchange=""><span class="text">Last Name: </span></td>
      <td><input name="l_name" type="text" class="box" id="l_name" placeholder=" last name"/></td>
    </tr>
    <tr>
      <td height="34"><span class="text">password: </span></td>
      <td><input name="pass" type="password" class="box" id="pass" placeholder=" password"/></td>
    </tr>
    
    <tr>
      <td height="34"><span class="text">Sex</span>:</td>
      <td><select name="sex" class="existing_event" id="sex">
         <option selected="selected">Select Your Sex</option>
        <option value="male">male</option>
         <option value="female">female</option>
      </select></td>
    </tr>
    <tr>
      <td height="36"><span class="text">Date Of Birth: </span></td>
      <td><label>
        <select name="YOB" class="existing_event" id="YOB">
          <option value="">year</option>
          <?php for($i=1970; $i<=2002; $i++) echo "<option value=$i >$i</option>"; ?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td height="42">&nbsp;</td>
      <td><label>
        <select name="MOB" class="existing_event" id="MOB" onchange="showfun()">
         <span class="text"> <option selected="selected" value="">month</option>
          <option value="1" >January</option>
          <option value="2" >Febuary</option>
          <option value="3">March</option>
          <option value="4">April</option>
          <option value="5">May</option>
          <option value="6">June</option>
          <option value="7">July</option>
          <option value="8">August</option>
          <option value="9">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option></span>
              </select>
      </label></td>
      
    </tr>
    <tr>
      <td height="24">&nbsp;</td>
      <td><label>
        <select name="DOB" class="existing_event" id="DOB">
          <option value="">Day</option>
          <?php  for($d=1; $d<=31; $d++) echo"<option value=$d>$d</option>"; ?>
        </select>
      </label></td>    </tr>
    
    <input type="hidden" name="faculty" value="2" >
    <input type="hidden" name="autodept" value="12" >
   
   <!--
    <tr>
      <td height="45"><span class="text">Faculty:</span></td>
      <td><label>
      <select name="faculty" class="existing_event" id="faculty"  onchange="return autodeptfill()">
        <option value="">select faculty</option>
        <option value="1" id="text">SCHOOL OF TECHNOOLOGY HND</option>
        <option value="2" id="eng">SCHOOL OF TECHNOOLOGY ND</option>
              </select>
      </label></td>
    </tr>
    <tr>
      <td height="45" class="text">department:</td>
      <td><label for="autodept"></label>
        <div id="show" class="existing_event">
            ]
        </div>
       </td>
       
    </tr>
   
   </div>
    <tr>
      <td height="75">&nbsp;</td>
   -->
   <td><div id="olay"></div><input name="Submit" type="submit" class="box" value="Register" id="sub" /></td>
    </tr>
  </table>
  <?php if(isset($_GET['error']))  
{
	$error_msg = $_GET['error'];
	if ($error_msg == '2')
	{
  print '<bold align="center">ERROR: NOT ELIGIBLE TO REGISTER CONSULT THE ADMIN</bold>';
	}
}
?>
</form>
</div>
<div class="loader" style="position: absolute; left: 416px; width: 21px; height: 26px; top: 492px; visibility:hidden;"> <img src="img/ajax-loader.gif" alt="ajaxloader" /></div>


 
  
  
  
  
  <div  id="textlogo"> </div>
<div class="footer"><li class="adm"><a href="administrator/index.php" style="color:rgba(255,255,255,1);">ADMIN PANEL</a></li></div>
<div id="CollapsiblePanel1" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0"><span class="title">click here to Login</span></div>
  <div class="CollapsiblePanelContent">   <form  action="logverify.php" method="post" name="login" onsubmit="return process()" class="form-1">
					<p class="field">
						<input type="text"  name="logmatric" id="logmatric" onblur="return checkmatric()" placeholder="Your matric">
						<i class="icon-user icon-large"></i>
					</p>
						<p class="field">
							<input type="password" name="logpass" id="logpass" placeholder="Password">
							<i class="icon-lock icon-large"></i>
					</p>
					<p class="submit">
						<button type="submit" name="submit" onclick="process()"><i class="icon-arrow-right icon-large"></i></button> 
					</p>
				</form></div>
</div>



</div>
<div id="error" >
  <?php if(isset($_GET['error']))  
{
	$error_msg = $_GET['error'];
	if ($error_msg == '1')
	{
  print '<em align="center">ERROR: Incorrect Password</em>';
	}
}
?>

</div>



<div id="imgslider"> 

  <!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container">
	<div class="ws_images"><ul>
	<li><a href="#"><img src="img/slider/slide8.jpg" alt="" height="360" id="wows_0" title=""/></a></li>
	<li><a href="#"><img src="img/slider/slide6.jpg" alt="" title="" height="360" id="wows_1"/></a></li>
	<li><a href="#"><img src="img/slider/slide9.jpg" alt="" title="" height="360" id="wows_2"/></a></li>
    <li><a href="#"><img src="img/slider/slide3.jpg" alt="" title="" height="360" id="wows_3"/></a></li>
    <li><a href="#"><img src="img/slider/slide1.jpg" alt="" title="" height="360" id="wows_4"/></a></li>
     <li><a href="#"><img src="img/slider/slide9.jpg" alt="" title="" height="360" id="wows_5"/></a></li>
	</ul></div>
	<div class="ws_bullets"><div>
	
	</div></div>
		<a href="#" class="ws_frame"></a>
		<div class="ws_shadow"></div>
	</div></div>

</body>
</html>

<script>

function validate2(){
var a = document.getElementById('matric_no');
var b = document.getElementById('f_name');
var c = document.getElementById('l_name');
var d = document.getElementById('sex');
var e = document.getElementById('DOB');
var f = document.getElementById('MOB');
var g = document.getElementById('YOB');
var h = document.getElementById('faculty');
var i = document.getElementById('autodept');


if((a.value =="")  ||( b.value =="") || (c.value =="") || (d.value =="") || (e.value =="") || (f.value =="") || (g.value =="") || (h.value =="") || (i.value =="")) {
	alert ("make sure all fields are filled");
	a.focus();
	return(false);
}
else return(true);
}

</script>
<script>
function empty()
{
document.getElementById('l_name').value = '';
document.getElementById('pass').value = '';
}
</script>

<script>
function logverify(){
var lm = document.getElementById('logmatric');
var lp = document.getElementById('logpass');

if((lm.value =="")  ||( lp.value =="")){
alert("fill in your login details");
return(false);
lm.focus()
}
else return(true);
}
</script>
<script type="text/javascript" src="WOWSlider-master/wowslider.js"></script>
<script type="text/javascript" src="WOWSlider-master/sample/script.js"></script>
<script src="autodept.js"></script><script src="SpryAssets/SpryCollapsiblePanel.js"></script>
<script type="text/javascript">
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1", {contentIsOpen:false});
</script>