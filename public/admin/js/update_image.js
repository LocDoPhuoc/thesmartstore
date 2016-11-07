function readURL(input) {
    var id = input.getAttribute('id');
    var img = "img" + id;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#"+img+"")
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
                $("#"+img+"").show();
            };

            reader.readAsDataURL(input.files[0]);
     
        }

}
