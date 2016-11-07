$(document).ready(function($) {
	$(".update-cart").click(function(event) {
		var rowId = $(this).attr('id');
		var qty = $(this).parent().parent().find(".qty").val();
		var token = $("input[name='_token']").val();
		var name = $(this).parent().parent().find(".name-product").text();
		//alert(name);
		$.ajax({
			url:"http://localhost/myproject/home/update/"+rowId+"/"+qty,
			type:'GET',
			cache:true,
			data:{"_token":token, "id":rowId, "name":name, "qty":qty},
			success:function(data){
				if(data){
					location.href = "http://localhost/myproject/home/shopping";
					//location.reload(true);
					alert(data);
					
				}
			}
		});


	});
});