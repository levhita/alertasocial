$( document ).ready(function() {
	
	$('.subscribeToCategoryButton').bind('click', function(){
		var category_id = $(this).data('category_id');
		$.ajax({
			type: "POST",
			url: "/category/subscribe",
			data: {category_id: category_id}

		}).done( function(data) {
			var $element = $(".subscribeToCategoryButton[data-category_id='"+category_id+"']");
			if(data.subscribe==true) {
				$element.addClass('btn-primary');
				$element.find('i.fa').removeClass('fa-plus');
				$element.find('i.fa').addClass('fa-minus');	
			} else {
				$element.removeClass('btn-primary');
				$element.find('i.fa').addClass('fa-plus');
				$element.find('i.fa').removeClass('fa-minus');	
			}
		});
	});

	$('#saveUserButton').bind('click', function(){
		$.ajax({
			type: "POST",
			url: "/subscriber/save",
			data: {
				firstname: $("#firstname").val(),
				lastname: $("#lastname").val(),
				email: $("#email").val(),
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