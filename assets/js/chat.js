$(document).ready(function() 
{
	$("#divChat").find('.btn')
	.click(function(event) 
	{
		event.preventDefault();
		console.log("click");
		var form=$(this).closest("form");
		// console.log(form.attr("action"));

		$.ajax(
		{
			url:form.attr('action'),
			type:"POST",
			data:form.serialize()+'&csrf_test_name='+token_csrf,
			dataType:"json"
		}).done(function(resultat)
		{
			token_csrf=resultat.csrf;
		});
	});

	setInterval(
		function(){
		$.ajax({
			type:'GET',
			dataType:"json"
		}).done(function(resultat)
		{
			console.log('hello');
			console.log(resultat.message)
			  $("#chatmessage").empty().append(resultat.message);
		})},
	1000);
});