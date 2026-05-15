<?php
$ogrenci_no = "b251210587"; 
$dogru_email = $ogrenci_no . "@sakarya.edu.tr";
$dogru_sifre = $ogrenci_no;

// Eğer sayfa POST metodu ile çalıştırıldıysa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Formdan gelen verileri alıyoruz
    $gelen_email = trim($_POST['email']);
    $gelen_sifre = trim($_POST['password']);

    // PHP tarafında boş alan kontrolü (Eğer JS'i aşıp gelirlerse diye)
    if (empty($gelen_email) || empty($gelen_sifre)) {
        header("Location: login.html?error=empty");
        exit();
    }

    // Bilgilerin doğruluğunu kontrol ediyoruz
    if ($gelen_email === $dogru_email && $gelen_sifre === $dogru_sifre) {
        // BİLGİLER DOĞRUYSA BAŞARI SAYFASINI GÖSTER
        ?>
        <!DOCTYPE html>
        <html lang="tr">
        <head>
            <meta charset="UTF-8">
            <title>Giriş Başarılı</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-success text-white d-flex align-items-center justify-content-center min-vh-100">
            <div class="text-center">
                <h1 class="display-3 fw-bold">Hoşgeldiniz <?php echo $ogrenci_no; ?></h1>
                <p class="lead mt-3">Giriş işleminiz başarıyla tamamlandı.</p>
                <a href="index.html" class="btn btn-light mt-4 fw-bold">Ana Sayfaya Dön</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        // BİLGİLER YANLIŞSA ERROR PARAMETRESİYLE LOGİN SAYFASINA GERİ GÖNDER
        header("Location: login.html?error=wrong");
        exit();
    }
} else {
    // Sayfaya direkt linkten girmeye çalışanları login'e yolla
    header("Location: login.html");
    exit();
}
?>