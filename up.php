<?php
session_start();
?>
<html>
<header>
<?php
// syndesi me tin vasi
mysql_connect("localhost","root","");
mysql_select_db("citybase");

// orismos oti tha xrisimopoiisoume utf8 synolo xaraktirwn stin epikoinwnia me tin vasi
mysql_query("SET NAMES 'utf8'");


// an exei ginei logout tote midenise ta stoixeia tou session pou kratame
// ta stoixeia pou kratame einai to $_SESSION[login] pou einai 0 an den exoume syndethei
// kai 1 an exoume syndethei, to $_SESSION[email] pou einai poios xristis exei syndethei
// to $_SESSION[type] pou einai guest an einai episkeptis, user an einai aplos eggegramenos xristis
// admin an einai diaxeiristis

if(isset($logout))
{
    $_SESSION['login']=0;
	$_SESSION['email']='';
	$_SESSION['type']='guest';

}

// an einai den exei oristei session login (diladi exoume mpei gia proti fora stin selida)
// tote orizoume tis parametroys opos kai sto logout
if (!isset($_SESSION['login']))
{
	$_SESSION['login']=0;
	$_SESSION['email']='';
	$_SESSION['type']='guest';
}

// an o xristis exei symplirwsei tin forma tou login kai exei patisei to pliktro lgbutton (selida main.php)

if (isset($_POST['lgbutton']))
{

// tote trexoume ena erotima me ta stoixeia email kai password gia na doume an yparxei o xristis
$sql="select * from users where email='$_POST[email]' and password='$_POST[password]'";

// ekteloume to erwtima
$res=mysql_query($sql);

// an o xristis yparxei tote
if (mysql_num_rows($res)>0)
{

// pernoume ta stoixeia tou kai kanoume to $_SESSION[login]=1 , kratame to email kai to user_type
$row=mysql_fetch_array($res);
  $_SESSION['login']=1;
  $_SESSION['email']=$_POST['email'];
  $_SESSION['type']=$row['user_type'];
  
}
else
{
	// allios kratame pali ta stoixeia opos sto logout
	$_SESSION['login']=0;
	$_SESSION['email']='';
	$_SESSION['type']='guest';
}
}


// parakatw leme oti i selida einai utf8 kodikopoiisi
// syndeoume me to arxeio css.css pou einai gia tin morfopoiisi tis selidas
// syndeoume me tis vivliothikes tou google maps
// syndeoume me to arxeio myjavascript.js pou afora ta javascript pou xrisimopoioume genika ston kodika mas
// emfanizoume to banner to opoio an patame pano tou mas paei stin arxiki selida

?>
<meta charset="utf-8">
<link href="css.css" rel="stylesheet">
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script src="myjavascript.js"></script>
</header>
<body>
<div id=banner>
<a href='index.php'><img src="logo.jpg" width=100% ></a>
</div>
