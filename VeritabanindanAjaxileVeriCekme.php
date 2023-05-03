<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="jquery-3.6.4.min.js"></script>
    <style>
        .basarili{
            background-color: green;
        }
    </style>
    <title>Örnek Uygulama</title>
</head>
<body class="container mt-5">

<div id="formalani" class="mb-3"></div>
<button id="formekle" class="btn btn-sm btn-secondary">Veri Ekle</button>

<hr>
<br>

<table id="tablo" class="table table-hover table-striped table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">İsim</th>
        <th scope="col">Soyisim</th>
        <th scope="col">Yaş</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>
<br>
<hr>
<div id="deneme"></div>


<script>
    $(document).ready(function (){
        $.ajaxLoad = function () {
            $.ajax({
                method:'POST',
                url : 'api2.php',
                success: function (result){
                    $('tbody').empty();
                    $('tbody').append(result);
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Bağlantı Yok.\n İnternetinizi Kontrol Edin';
                    } else if (jqXHR.status == 404) {
                        msg = 'İstek atılan sayfa bulunamadı. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'İç Sunucu Hatası [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'İstenen JSON ayrıştırması başarısız oldu.';
                    } else if (exception === 'timeout') {
                        msg = 'Zaman Aşımı hatası.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax isteği iptal edildi.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    $('#sonuc').html(msg);
                }
            });
        }
       setInterval('$.ajaxLoad()',1000);

        $('#formekle').on('click', function (){

            $.ajax({
                method: 'GET',
                url : 'api2-1.php',
                success : function (response){
                    $('#formalani').html(response);
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Bağlantı Yok.\n İnternetinizi Kontrol Edin';
                    } else if (jqXHR.status == 404) {
                        msg = 'İstek atılan sayfa bulunamadı. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'İç Sunucu Hatası [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'İstenen JSON ayrıştırması başarısız oldu.';
                    } else if (exception === 'timeout') {
                        msg = 'Zaman Aşımı hatası.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax isteği iptal edildi.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    $('#sonuc').html(msg);
                }
            });
        });




    });




</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>