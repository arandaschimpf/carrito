$(function(){
	var ocultarAlertas = function() {
		var alerta = $('.alert');
		alerta.slideDown('slow');
		setTimeout(function(){
			alerta.slideUp('slow', function() {
				$(this).remove();
			});
		}, 2000);		
	};
	ocultarAlertas();
	$('.eliminarUsuario').click(function (evento) {
		evento.preventDefault();
		var elem = $(this);
		if(confirm("¿Seguro que desea eliminar este usuario?")){
			$.ajax({
				url: $(this).attr('href'),
				type: 'POST',
			})
			.done(function() {
				elem.parents('tr').remove();
				$('#alert').append('<div class="alert alert-info" style="display: none;">Usuario eliminado exitosamente<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				ocultarAlertas();
			})
			.fail(function() {
				console.log("error");
			});			
		}
	});


});