$(function() {
	$("#form").submit(function(e) {
		var form_data = $(this).serialize(); 
		$.ajax({
			type: "post",
			url: "php/render.php",
			data: form_data,
			success: function(html) { 
				$('#result').html(html);
			}
		});	
		return false;		 
   	});
});
