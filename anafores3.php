<?php
include ("up.php");
include ("menu.php");
echo "<div id=main>";


if (isset($_POST['kataxorisi_anaforas']))
{
	$x=rand (0,1000);
	
	$txt="INSERT INTO anafores (
	perigrafi ,x ,y ,lythike,hmer_katag,
	email_user,onoma_kat 
	)
	VALUES (
	 '$_POST[perigrafi]', '$_POST[mikos]', '$_POST[platos]',  0, NOW(),
	 '$_SESSION[email]', '$_POST[katigoria]'
	)";
	
	
	if (mysql_query($txt)) {
	echo "Η αναφορά καταχωρήθηκε";
	$ida=mysql_insert_id();
	
		$f1="";$f2="";$f3="";$f4=""; 
		if ($_FILES['foto1']['name']!="")
		{
		$f1=$ida."_".$x."_".$_FILES['foto1']['name'];
		move_uploaded_file($_FILES['foto1']['tmp_name'],"photos/".$f1);
		
		mysql_query("insert into photografies(onoma_arxeiou,id_anaforas) values('$f1',$ida)");
		}
		if ($_FILES['foto2']['name']!="")
		{
		$f2=$ida."_".$x."_".$_FILES['foto2']['name'];
		move_uploaded_file($_FILES['foto2']['tmp_name'],"photos/".$f2);
		
		mysql_query("insert into photografies(onoma_arxeiou,id_anaforas) values('$f2',$ida)");
		}
		if ($_FILES['foto3']['name']!="")
		{
		$f3=$ida."_".$x."_".$_FILES['foto2']['name'];
		move_uploaded_file($_FILES['foto3']['tmp_name'],"photos/".$f3);
		mysql_query("insert into photografies(onoma_arxeiou,id_anaforas) values('$f3',$ida)");
		}
		if ($_FILES['foto4']['name']!="")
		{
		$f4=$ida."_".$x."_".$_FILES['foto2']['name'];
		move_uploaded_file($_FILES['foto4']['tmp_name'],"photos/".$f4);
		mysql_query("insert into photografies(onoma_arxeiou,id_anaforas) values('$f4',$ida)");
		}
	
	
	
	}
	else echo "Λάθος στην καταχώρηση";

}
else
{



if ($_SESSION['login']==1)
{
echo "
  <script>


google.maps.event.addDomListener(window, 'load', initialize3);

    </script>
 
 
   <form action='' method=post enctype='multipart/form-data'>
   <br>
   <table>
   <tr><td><div id=map2 style='width:300px; height:300px'></div></td></tr>
   <tr><td valign=top>
   Γεωγραφικό Μήκος :<br><input type=text required name=mikos id=mikos onchange='change()'><br>
   Γεωγραφικό Πλάτος:<br><input type=text required name=platos id=platos onchange='change()'>
   </td>
   </tr></table>
   
   Περιγραφή:<br>
   <textarea name=perigrafi required cols=40 rows=5></textarea><br>
   
   Κατηγορία<br>
   <select name=katigoria>
   ";
   
   $txt="select * from katigories";
   $res=mysql_query($txt);
   while($row=mysql_fetch_array($res))
   {
   echo "<option>$row[onoma_kat]</option>";
   }
   
   echo "
   </select><br><br>
   Φωτογραφία1:<br>
   <input type=file name=foto1 accept='image/*' capture='camera'><br>
   Φωτογραφία2:<br>
   <input type=file name=foto2 accept='image/*' capture='camera'><br>
   Φωτογραφία3:<br>
   <input type=file name=foto3  accept='image/*' capture='camera'><br>
   Φωτογραφία4:<br>
   <input type=file name=foto4  accept='image/*' capture='camera'><br>
   <br><br>
   <input type=submit value='Εισαγωγή' name=kataxorisi_anaforas>
   </form>
   ";
   
   
   
   
}
else
{
	echo "Δεν έχετε συνδεθεί.";

} 
}  
echo "</div>";
include ("down.php");
?>