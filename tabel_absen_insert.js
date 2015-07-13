$(document).ready(function() {
    $('#tabel_absen_form').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#notif').fadeIn('slow');
                $('#notif').html(data);
                $('#tbltabel_absen').load('tabel_absen_refresh.php');
                $('#tabel_absen').trigger('reset');
            }
        })
        return false;
    });
});



function edit(pk) {
    var id = pk;
    var id_lokasi = $('#' + id + 'id_lokasi').val();
    var nip_karyawan = $('#' + id + 'nip_karyawan').val();
    var tanggal = $('#' + id + 'tanggal').val();
    var datang = $('#' + id + 'datang').val();
    var pulang = $('#' + id + 'pulang').val();
    var peraturan = $('#' + id + 'peraturan').val();
    $.ajax({
        type: 'POST',
        url: '#tabel_absen_update.php',
        data: {
            id: id,
            id_lokasi: id_lokasi,
            nip_karyawan: nip_karyawan,
            tanggal: tanggal,
            datang: datang,
            pulang: pulang,
            peraturan: peraturan,
        },
        success: function(data) {
            $('#notif').fadeIn('slow');
            alert(data);
            $('#tbltabel_absen').load('tabel_absen_refresh.php');
            $('#tabel_absen').trigger('reset');
        }
    })
    return false;
}