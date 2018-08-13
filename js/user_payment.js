$(function(){
	$('#username_form').on('submit', function (event){
		event.preventDefault();
		
		var $form = $(this),
		username_input = $form.find("input[name='username']").val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, {username: username_input});
		
		posting.done(function(data) {
    		var content = $( data ).find('#username_response');
    		$('#current_balance').empty().append(content);
 		});
	});
});

$(function(){
	$('#payment_form').on('submit', function (event){
		event.preventDefault();
		
		var $form = $(this),
		username_input = $form.find("input[name='username']").val(),
		payment_input = $form.find("input[name='payment']").val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, {username: username_input, payment: payment_input});
		
		posting.done(function(data) {
    		var content = $( data ).find('#payment_response');
    		$('#payment_response').empty().append(content);
 		});		
	});
});