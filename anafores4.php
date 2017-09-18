<?php
include ("up.php");
include ("menu.php");
echo "<div id=main>";
$txt="select * from anafores where lythike=0 ";
$table=mysql_query($txt);
$nm=mysql_num_rows($table);

$apo=0;
$mexri=20;

if (isset($_GET['apo']))
{

$apo=$_GET['apo'];
$mexri=$_GET['mexri'];
if($apo<0) {$apo=0;$mexri=20;}
if($apo>$nm) {$apo=0 ; $mexri=20;}

}
echo "<h2>Ανοικτές Αναφορές</h2>";
echo "<table border=1 cellspacing=0>";
$txt="select * from anafores where lythike=0 limit $apo,$mexri";
$table=mysql_query($txt);
 echo "<tr><th></th><th>Ημερομηνία</th><th>Χρήστης</th><th>Περιγραφή</th></tr>";
  
while ($row=mysql_fetch_array($table))
{
  echo "<tr><td><a href='anafores10.php?id=$row[id]' class=mybutton>Στοιχεία</a></td><td>$row[hmer_katag]</td><td>$row[email_user]</td><td>$row[perigrafi]</td>";
  

}



echo "</table><br><br>";

echo "<a href='anafores4.php?apo=".($apo-20)."&mexri=".($mexri-20)."' class=mybutton>Προηγούμενες</a>";
echo "<a href='anafores4.php?apo=".($apo+20)."&mexri=".($mexri+20)."' class=mybutton>Επόμενες</a>";
echo "</div>";
include ("down.php");
?>