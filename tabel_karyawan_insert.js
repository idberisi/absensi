$(document).ready(function() {
    $('#tabel_karyawan_form').submit(function() {
        if(confirms())
				{
					$.ajax({
							type: 'POST',
							url: 'tabel_karyawan_insert.php',
							data: $(this).serialize(),
							success: function(data) {
									$('#notif').fadeIn('slow');
									$('#notif').html(data);
									$('#tbltabel_karyawan').load('tabel_karyawan_refresh.php');
									$('#tabel_karyawan_form').trigger('reset');
									$('#edit').toggle();
									$('#mode').val('1');
									$('#nip').prop('readonly', false);
							}
					})
					return false;
				
				}
    });
		
		$('#bcari').click(function(){
			cari($('#data').val());
		});
});

function edit(pk) {
		$('#mode').val('2');
		$('#nip').val(pk);
		$('#nip').prop('readonly', true);
    $('#edit').toggle();
}

function hapus(pk) {
		if(confirms())
		{
			var id = pk;
			$.ajax({
					type: 'POST',
					url: 'tabel_karyawan_hapus.php',
					data: {
							nip: id
					},
					success: function(data) {
							$('#notif').fadeIn('slow');
							$('#notif').html(data);
							$('#tbltabel_karyawan').load('tabel_karyawan_refresh.php');
							$('#tabel_karyawan').trigger('reset');
					}
			})
			return false;
		}
}

function cari(pk) {
			var id = pk;
			$.ajax({
					type: 'POST',
					url: 'tabel_karyawan_cari.php',
					data: {
							id: id
					},
					success: function(data) {
							$('#tbltabel_karyawan').html(data);
					}
			})
			return false;

}