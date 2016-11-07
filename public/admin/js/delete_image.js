$(document).ready(function() {
    $('.input-file').hide();
});

$(document).ready(function() {
	$('.delete-img').click(function(event) {
		var url = $(this).parent().find("img[name='img-detail']").attr('url');
		var id = $(this).parent().find("img[name='img-detail']").attr('id');
		var token = $("form[name='frmEdit']").find("input[name='_token']").val();
		var id_dt = $("form[name='frmEdit']").find("input[name='id_dt']").val();
		
		var id_button = "bt" + id;
		var id_input = "ip" +id;
		//alert(id_bt);
		$.ajax({
			url: "http://localhost/myproject/admin/dien-thoai/update/delete-img/"+id,
			type: 'GET',
			cache: true,
			data: {"id": id, "_token": token, "url": url},
			success: function(data){
				if(data){
					//location.href = "http://localhost/myproject/admin/dien-thoai/update/"+id_dt;
					$("#"+id_button).remove();
					$("#"+id).remove();
					$("#"+id_input).show();
					//location.reload(true);
					alert(data);
				}
			}
		})
		
	});
});