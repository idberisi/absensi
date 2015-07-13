$(document).ready(function() {
    $('#tabel_lokasi_form').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#notif').fadeIn('slow');
                $('#notif').html(data);
                $('#tbltabel_lokasi').load('tabel_lokasi_refresh.php');
                $('#tabel_lokasi_form').trigger('reset');
            }
        })
        return false;
    });
		
	
		
			$('#bcari').click(function(){
			cari($('#data').val());
		});
});

function hapus(pk) {
		if(confirms())
		{
			var id = pk;
			$.ajax({
					type: 'POST',
					url: 'tabel_lokasi_hapus.php',
					data: {
							id: id
					},
					success: function(data) {
							$('#notif').fadeIn('slow');
							$('#notif').html(data);
							$('#tbltabel_lokasi').load('tabel_lokasi_refresh.php');
					}
			})
			return false;
		}
}

function edit(pk) {
		$('#mode').val('2');
		$('#id').val(pk);
		$('#nama').val($('#'+pk+'nama').text());
		$('#keterangan').val($('#'+pk+'keterangan').text());
    $('#edit').show();
}

function cari(pk) {
			var id = pk;
			$.ajax({
					type: 'POST',
					url: 'tabel_lokasi_cari.php',
					data: {
							id: id
					},
					success: function(data) {
							$('#tbltabel_lokasi').html(data);
					}
			})
			return false;

}