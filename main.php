<div id=main>
<?php
if ($_SESSION['login']==0)
{

// an den eimaste syndemenoi emfanizetai i parakatw forma
?>
<br><br>


Αν είστε εγγεγγραμένος χρήστης συμπληρώστε παρακάτω:
<form action='index.php' method=post>
<br>
email:<input type=email required name=email size=10> password: <input type=password name=password required size=10>
<input type=submit name=lgbutton value='Σύνδεση'>
<br><br>
</form>
Διαφορετικά κάντε εγγραφή πατώντας <a href=eggrafi.php>εδώ</a>
<br><br>
<script>
google.maps.event.addDomListener(window, 'load', initialize1);
</script>
<div id="ajax_div"></div>
 <div id="map-canvas"></div>




<?php

$sqlcmd="select * from anafores limit 0,20";
$tbl=mysql_query($sqlcmd);

echo "<script>";
echo "function addmarkers() {";
while($row=mysql_fetch_array($tbl))
{

	echo "addMarker3($row[y],$row[x],'$row[perigrafi]');";
	
	
}


echo "}

setInterval(function(){ajax();}, 1000);
</script>";
echo"
<a href=rss.php target=_blank>RSS Feed</a>
";

}
else
{
echo "Καλως ήρθατε στην ιστοσελίδα Επικοινωνίας με τον πολίτη";

}

?>
</div>