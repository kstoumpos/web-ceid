<?php
mysql_connect("localhost","root","");
mysql_select_db("citybase");
mysql_query("set names 'utf8'");

 $sq="select count(*) as a1 from anafores";
   $table=mysql_query($sq);
   $row=mysql_fetch_array($table);
   
   echo "Σύνολο Αναφορών:".$row['a1']."<br>";
   
   $sq="select count(*) as a1 from anafores where lythike=1";
   $table=mysql_query($sq);
   $row=mysql_fetch_array($table);
   echo "Επιλυμένες Αναφορές:".$row['a1']."<br>";
   
   $sq="select count(*) as a1 from anafores where lythike=0";
   $table=mysql_query($sq);
   $row=mysql_fetch_array($table);
   echo "Ανοικτές Αναφορές:".$row['a1']."<br>";

    
   $sq="select avg(hmer_lysi-hmer_katag) as a1 from anafores where lythike=1";
   $table=mysql_query($sq);
   $row=mysql_fetch_array($table);
   echo "Μέσος Χρόνος Επίλυσης(μέρες):".$row['a1']."<br>";

   
?>