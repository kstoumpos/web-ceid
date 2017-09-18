<?php
include ("up.php");
include ("menu.php");
echo "<div id=main>";


if(isset($_POST['apantidibtn']))
{
$txt="update anafores set 
	lysi='$_POST[apantisi]',	
	email_admin='$_SESSION[email]', 
	lythike=1 , 
	hmer_lysi=now()
	where id=$_GET[id]";
mysql_query($txt);
}

if ($_SESSION['login']==1)
{
$txt="select * from anafores where id=$_GET[id]";
$table=mysql_query($txt);
$row=mysql_fetch_array($table);

echo "

  <script>
var map1;
 var marker1;
function initialize4() {
var pos=new google.maps.LatLng($row[y],$row[x]);
  var mapOptions = {
    zoom: 14,
	center: pos
	
  };
  
 
  map1 = new google.maps.Map(document.getElementById('map2'), mapOptions);
  marker1 = new google.maps.Marker({
        map: map1,
        position: pos
      });
}

google.maps.event.addDomListener(window, 'load', initialize4);

    </script>
 
 
   
   <br>
   <div id=map2 style='width:200px; height:200px;'>erter</div>
   
   Γεωγραφικό Μήκος :<br><input type=text readonly name=mikos id=mikos value='$row[x]'><br>
   Γεωγραφικό Πλάτος:<br><input type=text readonly name=platos id=platos  value='$row[y]'><br>
   
   Περιγραφή:<br>
   <textarea name=perigrafi required cols=40 rows=5>$row[perigrafi]</textarea><br>
   
   Κατηγορία:<br> 
   
   <input type=text readonly value='$row[onoma_kat]'>
   <br>";
   if ($row['lythike']==0 && $_SESSION['type']=='admin')
   {
    echo "Περιγραφή Λυσης:<br>
	<form action='' method=post>
   <textarea name=apantisi required cols=40 rows=5></textarea><br>
   <input type=submit name=apantidibtn value='Αποθήκευση Λύσης'>
   </form>";
   }
   
    if ($row['lythike']==1 )
   {
    echo "Απάντηση και περιγραφή Επίλυσης:<br>
   <textarea name=apantisi readonly cols=40 rows=5>$row[lysi]</textarea><br>
   email Διαχειριστή Επίλυσης: <b>$row[email_admin]</b>
   ";
   }
   
   
   echo "<br>
   <br>
   Φωτογραφίες<br>";
   $sqltxt="select * from photografies where id_anaforas=$row[id]";
   $rrr=mysql_query($sqltxt);
   while($row2=mysql_fetch_array($rrr)){
   echo "<img src='photos/$row2[onoma_arxeiou]' width=200px'><br><br>";
   }
 
} 
echo "</div>";   
include ("down.php");
?>