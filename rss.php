<?php
 header("Content-Type: application/xml; charset=ISO-8859-1");
mysql_connect("localhost","root","");
mysql_select_db("citybase");

// orismos oti tha xrisimopoiisoume utf8 synolo xaraktirwn stin epikoinwnia me tin vasi
mysql_query("SET NAMES 'utf8'");

echo"<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<rss version=\"2.0\">

<channel>
  <title>RSS CityBAse</title>
  <link>http://localhost</link>
  <description>Citybase Report</description>


";
$sq="select * from anafores";
$table=mysql_query($sq);
while($row=mysql_fetch_array($table))
{
echo"	<item>
    <title>$row[id]</title>
	<user>$row[email_user]</user>
    <pubDate>$row[hmer_katag]</pubDate>
    <description>$row[perigrafi]</description>
  </item>";

}
    
echo "</channel></rss>";

?>