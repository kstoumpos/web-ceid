<?php
if ($_SESSION['type']=='guest')
{
echo"
<div id=menu>
<ul>
<li><a href='index.php'>Αρχική</a></li>
</ul>
</div>";
}

if ($_SESSION['type']=='admin')
{
echo"
<div id=menu>
<ul>
<li><a href='index.php'>Αρχική</a></li>
<li><a href='user.php'>Χρήστες</a></li>
<li><a href='katigories.php'>Κατηγορίες</a></li>
<li><a href='anafores.php'>Αναφορές</a></li>
<li><a href='logout.php'>Αποσύνδεση</a></li>
</ul>
</div>";
}

if ($_SESSION['type']=='user')
{
echo"
<div id=menu>
<ul>
<li><a href='index.php'>Αρχική</a></li>
<li><a href='anafores.php'>Αναφορές</a></li>
<li><a href='update_user2.php'>Προφίλ</a></li>

<li><a href='logout.php'>Αποσύνδεση</a></li>
</ul>
</div>";
}





?>