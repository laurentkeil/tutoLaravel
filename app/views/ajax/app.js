(function($){
	$('.btn-danger').on('click', function(e){
		e.preventDefault();
		var $a = $(this);
		var url = $a.attr('href');
		$a.text('Chargement');
		/*$.ajax(url, {
			success : function(){
				$a.parents('article').slideUp();
			},
			error : function (jqxhr) {
				$a.text('Suppression');
				alert(jqxhr.responseText)
			}
		});*/
		$.ajax(url/*, {type : 'DELETE'}*/)
			.done(function(data, text, jqxhr){
				$a.parents('article').fadeOut();
			})
			.fail(function(jqxhr){
				alert(jqxhr.responseText);
			})
			.always(function(){
				$a.text('supprimer');
			});
	});

}) (jQuery);