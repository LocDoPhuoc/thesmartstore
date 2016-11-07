$(document).ready(function() {
			if ($("li a.bgview").is(':visible')) {
				$("li figure").hide();
				
			}	
		}); // Kiem tra show/hide


		
		

		$(document).ready(function(){
		    $("li a.bgview").mouseenter(function(event) {
		    	var id = $(this).attr('id');
			    $(this).hide();
			    var s = "fi" + id;
		    	$("#"+s+"").show();

		    	$("#"+s+"").mouseleave(function(event) {
			    	$("#"+s+"").hide();
			    	$("#"+id+"").show();
			    });
			    
		    });
		    
		});


		// $(document).ready(function() {
		// 	$(window).resize(function() {
  //       		var h = $.parseInt($(window).height());
  //       		if (h < 750)  {
  //       			$("div .rightbanner").hide();
  //       			alert("medium");
  //       		}
  //       		else{
  //       			$("div .rightbanner").show();
  //       			alert("large");
  //       		}
        		
  //       	});	


		// });

		// $(document).ready(function() {
		// 	$("li.style-hover").mouseenter(function() {
		// 		var id = $(this).attr('id');
		// 		var a = "a-" + id;
		// 		var u = "u-" + id;
		// 		var lb= "lb-" + id;
		// 		$("#"+lb+"").css('border-bottom-style', 'groove');
		// 		if($("#"+u+"" ).is(':visible')){
		// 			$("#"+a+"").css('background-color', 'white');
		// 			$("#"+lb+"").css('border-bottom-style', 'groove');
		// 		}
		// 		else{
		// 			$("#"+a+"").css('background-color', 'white');
		// 		}

		// 		$(this).mouseleave(function(){
		// 			$("#"+a+"").css('background-color', 'white');
		// 			$("#"+lb+"").css('border-bottom-style', 'none');
		// 		});
		// 	});
			
		// });


		$(document).ready(function(){
			$("#full-info").hide();
		    $("#show-info").click(function(event) {
		    	$("#full-info").show();
		    });
		    $("#hide-info").click(function(event) {
		    	$("#full-info").hide();
		    });
		});

		