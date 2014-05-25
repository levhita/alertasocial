$( document ).ready(function() {
	
	$('#saveUserButton').bind('click', function(){
		$.ajax({
			type: "POST",
			url: "/ong/save",
			data: {
				firstname: $("#firstname").val(),
				email: $("#email").val(),
				description: $("#description").val(),
				new_user: $("#new_user").val()
			}
		}).done( function(data) {
			if($("#new_user").val()=='1'){
				window.location.replace("/");
			} else {
				location.reload();
			}
		});
	});
});