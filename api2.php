<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=test", "root", "");
} catch ( PDOException $e ){
    print $e->getMessage();
}


$KullaniciSor = $db->prepare("SELECT * FROM uyeler ORDER BY id DESC LIMIT 5");
$KullaniciSor->execute();
$KullaniciCek = $KullaniciSor->fetchAll(PDO::FETCH_ASSOC);

foreach ($KullaniciCek as $Kullanici){
    echo "<tr>";
    echo "<td>".$Kullanici['id']."</td>";
    echo "<td>".$Kullanici['name']."</td>";
    echo "<td>".$Kullanici['surname']."</td>";
    echo "<td>".$Kullanici['age']."</td>";
    echo "</tr>";
}