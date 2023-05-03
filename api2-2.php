<?php
if (isset($_POST['isim']) && $_POST['soyisim'] && $_POST['yas'] && $_POST['cinsiyet']){
    try {
        $db = new PDO("mysql:host=localhost;dbname=test", "root", "");
    } catch ( PDOException $e ){
        print $e->getMessage();
    }


    $isim = htmlspecialchars($_POST['isim']);
    $soyisim = htmlspecialchars($_POST['soyisim']);
    $yas = htmlspecialchars($_POST['yas']);
    $cinsiyet = htmlspecialchars($_POST['cinsiyet']);

    $veriekle = $db->prepare("INSERT INTO uyeler SET name = ?, surname = ?, age = ?, gender = ?");
    $Eklendi = $veriekle->execute([
        $isim,
        $soyisim,
        $yas,
        $cinsiyet
    ]);
}else{
    echo "<script>alert('Tüm Bilgileri Doldurunuz')</script>";
}