<?php
// Session başlat
session_start();

// Eğer oturum varsa, oturumu sonlandır
if (isset($_SESSION['kullanici_adi'])) {
    session_unset(); // Session'daki tüm değişkenleri temizle
    session_destroy(); // Oturumu sonlandır
}

// Eğer "Beni Hatırla" cookie'leri varsa, onları da sil
if(isset($_COOKIE['kullanici_adi']) && isset($_COOKIE['sifre']) && isset($_COOKIE['beni_hatirla'])) {
    setcookie('kullanici_adi', '', time() - 3600, "/"); // Cookie'yi sil
    setcookie('sifre', '', time() - 3600, "/"); // Cookie'yi sil
    setcookie('beni_hatirla', '', time() - 3600, "/"); // Cookie'yi sil
}

// Ana sayfaya yönlendir
header("Location: giris.php"); // Örnek bir giriş sayfasına yönlendirme
exit;
?>



