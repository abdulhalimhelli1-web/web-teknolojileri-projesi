<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sonucu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Gönderilen Form Bilgileri</h2>
                </div>
                <div class="card-body fs-5">
                    
                    <?php
                    // Eğer sayfa POST metodu ile (form doldurularak) açıldıysa çalıştır:
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
                        // Formdan gelen verileri güvenlikten (htmlspecialchars) geçirerek değişkenlere alıyoruz
                        $isim = htmlspecialchars($_POST['fullname'] ?? 'Belirtilmedi');
                        $email = htmlspecialchars($_POST['email'] ?? 'Belirtilmedi');
                        $telefon = htmlspecialchars($_POST['phone'] ?? 'Belirtilmedi');
                        $konu = htmlspecialchars($_POST['subject'] ?? 'Belirtilmedi');
                        $cinsiyet = htmlspecialchars($_POST['gender'] ?? 'Belirtilmedi');
                        $mesaj = htmlspecialchars($_POST['message'] ?? 'Mesaj yok');
                        
                        // Checkbox işaretlenmiş mi diye kontrol ediyoruz
                        $onay = isset($_POST['terms']) ? 'Kabul Edildi' : 'Kabul Edilmedi';

                        // Ekrana düzenli (tablo veya liste şeklinde) yazdırma (PDF kuralı)
                        echo "<ul class='list-group list-group-flush'>";
                        echo "<li class='list-group-item'><strong>Ad Soyad:</strong> " . $isim . "</li>";
                        echo "<li class='list-group-item'><strong>E-mail:</strong> " . $email . "</li>";
                        echo "<li class='list-group-item'><strong>Telefon:</strong> " . $telefon . "</li>";
                        echo "<li class='list-group-item'><strong>Konu:</strong> " . $konu . "</li>";
                        echo "<li class='list-group-item'><strong>Cinsiyet:</strong> " . $cinsiyet . "</li>";
                        echo "<li class='list-group-item'><strong>Mesaj:</strong> " . $mesaj . "</li>";
                        echo "<li class='list-group-item text-success'><strong>Veri İşleme Onayı:</strong> " . $onay . "</li>";
                        echo "</ul>";

                    } else {
                        // Biri bu PHP sayfasına form doldurmadan, direkt linki yazarak girmeye çalışırsa:
                        echo "<div class='alert alert-danger'>HATA: Bu sayfaya doğrudan erişemezsiniz. Lütfen önce iletişim formunu doldurun.</div>";
                    }
                    ?>

                </div>
                <div class="card-footer text-center">
                    <a href="contact.html" class="btn btn-secondary">İletişim Sayfasına Geri Dön</a>
                    <a href="index.html" class="btn btn-primary">Ana Sayfaya Git</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>