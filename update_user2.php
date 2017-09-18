<?php
// to pano meros kai to menou
include ("up.php");
include ("menu.php");
echo "<div id=main>";

// an exei patisei gia na prosthesei katigoria dinoume add
if (isset($_POST['save_user']))
{
  $sqlcmd="update users
  set email='$_POST[email]',
  password='$_POST[password]',
  onoma='$_POST[onoma]',
  phone='$_POST[phone]' ,
  user_type='$_POST[user_type]'
  where email='$_SESSION[email]' 
 ";
 $_SESSION['email']=$_POST['email'];
  if (mysql_query($sqlcmd)) echo "Τα στοιχεία αποθηκεύτηκαν";	
  else
  {
	  
	  echo "Το νέο email που δώσατε υπάρχει στην βάση ήδη. Αλλάξτε το email παρακαλώ.";
	  $sqlcmd="select * from users where email='$_POST[oldemail]'";
	$tbl=mysql_query($sqlcmd);
	$row=mysql_fetch_array($tbl);
	echo "<table>";



	echo "
	<form action='' method='post'>
	<input type=hidden name=oldemail value='$row[email]'>
	<tr><td>email</td><td><input type=email required name=email value='$row[email]'></td></tr>
	<tr><td>password</td><td><input type=password required name=password value='$row[password]'></td></tr>
	<tr><td>Όνομα</td><td><input type=text  name=onoma value='$row[onoma]'></td></tr>
	<tr><td>Τηλέφωνο</td><td><input type=text  name=phone value='$row[phone]'></td></tr>";
	
	if ($row['user_type']=="user")
	echo "
	<tr><td>User_type</td><td><select name=user_type><option>user</option><option>admin</option></select></tr>";
	
	if ($row['user_type']=="admin")
	echo "
	<tr><td>User_type</td><td><select name=user_type><option>admin</option><option>user</option></select></tr>";
	
	echo "
	<tr><td colspan=2><input type=submit value='Αποθήκευση Αλλαγών' name=save_user></tr>
	
	</form>
	</td></tr>";

	echo "</table>";
	  
	  
	  
  }
}
else
{


// to simio leitourgias twn katigoriwn

$sqlcmd="select * from users where email='$_SESSION[email]'";
$tbl=mysql_query($sqlcmd);
$row=mysql_fetch_array($tbl);
echo "<table>";



	echo "
	<form action='' method='post'>
	<input type=hidden name=oldemail value='$row[email]'>
	<tr><td>email</td><td><input type=email required name=email value='$row[email]'></td></tr>
	<tr><td>password</td><td><input type=password required name=password value='$row[password]'></td></tr>
	<tr><td>Όνομα</td><td><input type=text  name=onoma value='$row[onoma]'></td></tr>
	<tr><td>Τηλέφωνο</td><td><input type=text  name=phone value='$row[phone]'></td></tr>";
	
	if ($row['user_type']=="user")
	echo "
	<tr><td>User_type</td><td><select name=user_type><option>user</option><option>admin</option></select></tr>";
	
	if ($row['user_type']=="admin")
	echo "
	<tr><td>User_type</td><td><select name=user_type><option>admin</option><option>user</option></select></tr>";
	
	echo "
	<tr><td colspan=2><input type=submit value='Αποθήκευση Αλλαγών' name=save_user></tr>
	
	</form>
	</td></tr>";

echo "</table>";
}
// to katw meros
echo "</div>";
include ("down.php");
?>

