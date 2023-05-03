<form id="form">
    <h4>Kullanıcı Ekle</h4>
    <div class="form-group">
        <label for="">İsim</label>
        <input type="text" id="isim" class="form-control form-control-sm">
    </div>
    <div class="form-group">
        <label for="">Soyisim</label>
        <input type="text" id="soyisim" class="form-control form-control-sm">
    </div>
    <div class="form-group">
        <label for="">Yaş</label>
        <input type="text" id="yas" class="form-control form-control-sm">
    </div>
    <div class="form-group">
        <label for="">Cinsiyet</label>
        <input type="text" id="cinsiyet" class="form-control form-control-sm">
    </div>
    <button id="formVeriEkle" class="btn btn-sm btn-success mt-3">+ Ekle + </button>
    <button id="formKapat" class="btn btn-sm btn-danger mt-3">Kapat </button>

</form>
<script>
    $('#formekle').hide();
    $('#formKapat').on('click', function (e){
        e.preventDefault();
        $('#formekle').show();
        $('#form').hide();
    });
    $('#formVeriEkle').on('click', function (e){
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url : 'api2-2.php',
            data:{
                'isim' : $('#isim').val(),
                'soyisim' :  $('#soyisim').val(),
                'yas' :  $('#yas').val(),
                'cinsiyet' :  $('#cinsiyet').val()
            },
            success : function (response){
                $('tbody').append(response).addClass("basarili");
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
                alert(msg);
            }
        });
    });
</script>