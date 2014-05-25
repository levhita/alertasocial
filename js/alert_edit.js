$( document ).ready(function() {
	
	$('#saveAlertButton').bind('click', function(){
		$.ajax({
			type: "POST",
			url: "/alert/save",
			data: {
				alert_id: $("#alert_id").val(),
				title: $("#title").val(),
				content: $("#content").val(),
				action_link: $("#action_link").val()
			}
		}).done( function(data) {
			window.location.replace("/alert/view/"+data.alert.alert_id);
		});
	});
});