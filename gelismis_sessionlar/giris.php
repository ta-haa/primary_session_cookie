
<?php
// Session başlat
session_start();

// Eğer daha önce giriş yapılmışsa ve "Beni Hatırla" seçeneği işaretlenmişse, kullanıcıyı otomatik olarak giriş yap
if (isset($_COOKIE['beni_hatirla']) && $_COOKIE['beni_hatirla'] == 'evet' && isset($_COOKIE['kullanici_adi']) && isset($_COOKIE['sifre'])) {
    $_SESSION['kullanici_adi'] = $_COOKIE['kullanici_adi'];
    header("Location: deneme1.php"); // Örnek bir ana sayfaya yönlendirme
    exit;
}

include("baglan.php");

// Kullanıcı adı ve şifre kontrolü
$giris_basarili = false; // Giriş başarısız varsayalım
$hata_mesaji = ""; // Hata mesajını saklayacağımız değişken
if(isset($_POST['submit'])) {
    // Kullanıcı adı ve şifre
    $girilen_kullanici_adi = $_POST['kullanici_adi'];
    $girilen_sifre = $_POST['sifre'];
    
    // Veritabanından kullanıcı bilgilerini kontrol et
    $sql = "SELECT * FROM dene WHERE ad = '$girilen_kullanici_adi' AND soyad = '$girilen_sifre'";
    $result = $con->query($sql);
    
    if ($result->num_rows == 1) {
        // Giriş başarılı
        $giris_basarili = true;
        // Session'a kullanıcı adını kaydet
        $_SESSION['kullanici_adi'] = $girilen_kullanici_adi;
        
        // Eğer "Beni Hatırla" seçeneği işaretlenmişse, cookie oluştur
        if(isset($_POST['beni_hatirla']) && $_POST['beni_hatirla'] == 'evet') {
            setcookie('kullanici_adi', $girilen_kullanici_adi, time() + (86400 * 30), "/"); // 30 gün boyunca cookie geçerli
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
        <h1>Hoş Geldiniz, <?php echo $_SESSION['kullanici_adi']; ?></h1>
        <a href="cikis.php">Çıkış Yap</a>
    <?php else: ?>
        
        <h1>Giriş Yap</h1>
        <?php if($hata_mesaji): ?>
            <p><?php echo $hata_mesaji; ?></p>
        <?php endif; ?>


        <form action="" method="post">
            <label for="kullanici_adi">Kullanıcı Adı:</label><br>
            <input type="text" id="kullanici_adi" name="kullanici_adi"><br>
            <label for="sifre">Şifre:</label><br>
            <input type="password" id="sifre" name="sifre"><br><br>
            <input type="checkbox" id="beni_hatirla" name="beni_hatirla" value="evet">
            <label for="beni_hatirla">Beni Hatırla</label><br><br>
            <input type="submit" name="submit" value="Giriş Yap">
        </form>


    <?php endif; ?>


</body>
</html>
