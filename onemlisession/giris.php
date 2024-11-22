
<?php
// Session başlat
session_start();

// Eğer daha önce giriş yapılmışsa ve "Beni Hatırla" seçeneği işaretlenmişse, kullanıcıyı otomatik olarak giriş yap
if (isset($_COOKIE['beni_hatirla']) && $_COOKIE['beni_hatirla'] == 'evet' && isset($_COOKIE['email']) && isset($_COOKIE['sifre'])) {
    $_SESSION['email'] = $_COOKIE['email'];
    header("Location: anasayfa.php"); // Örnek bir ana sayfaya yönlendirme
    exit;
}

include("baglan.php");

// Kullanıcı adı ve şifre kontrolü
$giris_basarili = false; // Giriş başarısız varsayalım



$hata_mesaji = ""; // Hata mesajını saklayacağımız değişken
if(isset($_POST['submit'])) {
    // Kullanıcı adı ve şifre
    $girilen_kullanici_adi = $_POST['email'];
    $girilen_sifre = $_POST['sifre'];
    
    // Veritabanından kullanıcı bilgilerini kontrol et
    $sql = "SELECT * FROM sessionlar WHERE ad = '$girilen_kullanici_adi' AND soyad = '$girilen_sifre'";
    $result = $con->query($sql);
    
    if ($result->num_rows == 1) {
        // Giriş başarılı
        $giris_basarili = true;

        // Session'a kullanıcı adını kaydet
        $_SESSION['email'] = $girilen_kullanici_adi;
        
        // Eğer "Beni Hatırla" seçeneği işaretlenmişse, cookie oluştur
        if(isset($_POST['beni_hatirla']) && $_POST['beni_hatirla'] == 'evet') {
            setcookie('email', $girilen_kullanici_adi, time() + (86400 * 30), "/"); // 30 gün boyunca cookie geçerli
            setcookie('sifre', $girilen_sifre, time() + (86400 * 30), "/"); // 30 gün boyunca cookie geçerli
            setcookie('beni_hatirla', 'evet', time() + (86400 * 30), "/"); // 30 gün boyunca cookie geçerli
        }
    } else {
        // Giriş başarısız, hata mesajını ayarla
        $hata_mesaji = "Geçersiz kullanıcı adı veya şifre";
    }
    session_destroy();
}
?>

<?php if($giris_basarili): ?>
        <h1>Hoş Geldiniz, <?php echo $_SESSION['email']; ?></h1>
        <a href="cikis.php">Çıkış Yap</a>
    <?php else: ?>
        
        <?php if($hata_mesaji): ?>
            <p><?php echo $hata_mesaji; ?></p>
        <?php endif; ?>


        <form action="" method="post">
            <input type="text" name="email"><br>
            <input type="password" name="sifre"><br><br>
            <input type="checkbox" name="beni_hatirla" value="evet">
            <input type="submit" name="submit" value="Giriş Yap">
        </form>


    <?php endif; ?>


</body>
</html>
