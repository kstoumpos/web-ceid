<?php
// to pano meros kai to menou
include ("up.php");
include ("menu.php");

if (isset($_POST['add_kat']))
{
  $sqlcmd="insert into katigories values('$_POST[newkat]')";
  mysql_query($sqlcmd);	
}

if (isset($_POST['delete_kat']))
{
  $sqlcmd="delete from katigories where onoma_kat='$_POST[old_kat]'";
  mysql_query($sqlcmd);	
}


// to simio leitourgias twn katigoriwn
echo "<div id=main>";
$sqlcmd="select * from katigories";
$tbl=mysql_query($sqlcmd);
echo "<table>";
	echo("<tr>
	<form action='' method='post'>
	<td><input type=text name=newkat></td>
	<td><input type=submit value='Προσθήκη' name=add_kat>
	
	</form>
	</td></tr>");
while($row=mysql_fetch_array($tbl))
{
	// paroiusiazoume tin lista twn katigoriwn mazi me tin dynatotita diagrafis
	echo("<tr>
	<form action='' method='post'>
	<td>$row[onoma_kat]</td>
	<td><input type=submit value='Διαγραφή' name=delete_kat>
	<input type=hidden value='$row[onoma_kat]' name=old_kat>
	</form>
	</td></tr>");
	
}
echo "</table>";

// to katw meros
echo "</div>";
include ("down.php");
?>

