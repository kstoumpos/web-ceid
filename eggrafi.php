<?php
include ("up.php");
include ("menu.php");

if (isset($_POST['regbutton']))
{
   $sql="INSERT INTO `citybase`.`users` (`email`, `password`, `onoma`, `phone`, `user_type`) VALUES 
   ('$_POST[email]', '$_POST[password]', '$_POST[onoma]', '$_POST[phone]', 'user');";

   if (mysql_query($sql))
   {
      echo "<br><br>
		<div id=main>H εγγραφή σας έγινε επιτυχώς. Πατήστε για σύνδεση <a href=index.php>εδω</a></div>";
   } 
   else
   {
	echo "
		   <br><br>
		<div id=main>
		<h1>Εγγραφή Χρήστη</h1>
		Προσοχή το email που δώσατε υπάρχει. <br>Παρακαλώ αλλάξτε στα στοιχεία παρακάτω:
		<form action='' method=post>
		<table>
		<tr><td>email</td><td><input type=email required name=email style='color:red;' value='$_POST[email]' size=20></td></tr>
		<tr><td>Password</td><td><input type=password name=password required  value='$_POST[password]' size=20></td></tr>
		<tr><td>Ονοματεπώνυμο</td><td><input type=text required name=onoma value='$_POST[onoma]' size=40></td></tr>
		<tr><td>Τηλέφωνο</td><td><input type=text required name=phone value='$_POST[phone]' size=40></td></tr>
		<tr><td colspan=2><input type=submit name=regbutton value='Εγγραφή'></td></tr>
		</table>
		<br><br>
		</form>

		</div>";

   
   
   };
}
else
{

?>
<br><br>
<div id=main>
<h1>Εγγραφή Χρήστη</h1>
Συμπληρώστε παρακάτω:
<form action='' method=post>
<table>
<tr><td>email</td><td><input type=email required name=email size=20></td></tr>
<tr><td>Password</td><td><input type=password name=password required size=20></td></tr>
<tr><td>Ονοματεπώνυμο</td><td><input type=text required name=onoma size=40></td></tr>
<tr><td>Τηλέφωνο</td><td><input type=text required name=phone size=40></td></tr>
<tr><td colspan=2><input type=submit name=regbutton value='Εγγραφή'></td></tr>
</table>
<br><br>
</form>

</div>

<?php
}
include ("down.php");
?>

