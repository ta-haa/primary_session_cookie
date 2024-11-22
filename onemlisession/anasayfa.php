<?php 
session_start(); 

if (isset($_SESSION['email'])) {
    echo "<br>";
    echo "(<a href=\"cikis.php\">çıkış</a>)";
    echo "<br>";
    echo "(<a href=\"ilan.php\">İlan</a>)";
}
else {
    echo "<br>";
    echo "üye isen <a href=\"giris.php\">buraya tıkla</a>";
}


?>

<br>


<br><br><br>
