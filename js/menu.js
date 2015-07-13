$(document).ready(function() {
		$(".add").click(function(){
			$("#edit").toggle();
		})
		
		$('#notif').click(function(){
			$(this).hide();
		});
		
		$('.search').click(function(){
			$("#search").toggle();
		});
		
		$('#isi').height($('#vmenu').height());
});

function confirms()
{
	if(confirm("Anda Yakin?")) {
    return "1";
  }
	else return false;
}