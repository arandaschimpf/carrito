$(function () {
	$('.filtrado').on('keyup', function () {
		var pat = new RegExp($(this).val(), 'i');
		$('tbody > tr').show().each(function(index, el) {
			var $el = $(el);
			var text = $el.find('td').first().text();
			if(!pat.test(text)){
				$el.hide();
			}
		});
	});
});