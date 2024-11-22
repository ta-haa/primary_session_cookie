<?php 
session_start();
header("content-type:text/html;charset=utf8");

if(isset($_COOKIE['beni_hatirla']) && $_COOKIE['beni_hatirla'] == 'evet' && isset($_COOKIE['kullanici_adi']) && isset($_COOKIE['sifre']))
{
    echo "Hoşgeldiniz, " . $_SESSION["kullanici_adi"];
    echo "(<a href=\"cikis.php\">çıkış</a>)";
}
else {
    echo "Bu sayfa sadece üyelere özel";
    echo "üye isen <a href=\"giris.php\">buraya tıkla</a>";
}
?>
<br/><br/><br/><br/>
<a href="cikis.php">Çıkış Yap</a>

