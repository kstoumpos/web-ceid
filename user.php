<?php
// to pano meros kai to menou
include ("up.php");
include ("menu.php");

// an exei patisei gia na prosthesei katigoria dinoume add
if (isset($_POST['add_user']))
{
  $sqlcmd="insert into users(email,password,onoma,phone,user_type) 
  values('$_POST[email]','$_POST[password]','$_POST[onoma]','$_POST[phone]','$_POST[user_type]')";
  mysql_query($sqlcmd);	
}

// an exei diagrafei katigoria dinoume delete
if (isset($_POST['delete_user']))
{
  $sqlcmd="delete from users where email='$_POST[email]'";
  mysql_query($sqlcmd);	
}


// to simio leitourgias twn katigoriwn
echo "<div id=main>";
$sqlcmd="select * from users";
$tbl=mysql_query($sqlcmd);
echo "<table width=100%>";
echo "<tr>
<td>email</td><td>password</td><td>Όνομα</td><td>Τηλέφωνο</td><td>Τύπος Χρήστη</td>
	<td><td>Λειτουργίες </td>
	";
	echo("<tr>
	<form action='' method='post'>
	<td><input type=email required name=email></td>
	<td><input type=password required name=password></td>
	<td><input type=text  name=onoma></td>
	<td><input type=text  name=phone></td>
	<td><select name=user_type><option>user</option><option>admin</option></select>
	<td><input type=submit value='Προσθήκη' name=add_user>
	
	</form>
	</td></tr>");
while($row=mysql_fetch_array($tbl))
{
	// paroiusiazoume tin lista twn katigoriwn mazi me tin dynatotita diagrafis
	echo("<tr>
	
	<td>$row[email]</td>
	<td></td>
	<td>$row[onoma]</td>
	<td>$row[phone]</td>
	<td>$row[user_type]</td>
	<td>
	<form action='update_user.php' method='post' style=\"float:left;\">
	<input type=submit value='Επεξεργασία' name=update_user>
	<input type=hidden value='$row[email]' name=email>
	</form>
	
	<form action='' method='post' style=\"display:inline;\">
	<input type=submit value='Διαγραφή' name=delete_user>
	<input type=hidden value='$row[email]' name=email>
	</form>
	
	</td></tr>");
	
}
echo "</table>";

// to katw meros
echo "</div>";
include ("down.php");
?>

