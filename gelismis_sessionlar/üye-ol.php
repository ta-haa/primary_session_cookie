<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $username = $_POST["username"];
   //$password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Parolayı güvenli bir şekilde hash'le
   $password =$_POST["password"];

    include("baglan.php");

    // Kullanıcıyı veritabanına ekle
    $sql = "INSERT INTO dene (ad, soyad) VALUES ('$username', '$password')";
    if ($con->query($sql) === TRUE) {
        echo "Kayıt başarılı!";
    } else {
        echo "Hata: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Ol</title>
</head>
<body>
    <h2>Üye Ol</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Kullanıcı Adı:</label>
        <input type="text" name="username" required><br>
        <label>Şifre:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Kayıt Ol">
    </form>
</body>
</html>
