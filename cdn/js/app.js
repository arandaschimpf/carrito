$(function() {
	var list, limit = 10, init=0;
	var compilada = _.template($('#templateLista').html());
	var imprimir = function() {
		var vista = list.slice(init, init+limit);
		$('#app').html(compilada({lista: vista, user: logged, size: list.length, index: init}));		
	};

	var cargar = function() {
		$.getJSON('/pedidos', function(lista, textStatus) {
			list = lista;
			imprimir();
		});		
	};
	cargar();
	$('#app').on('click', '.pag', function(event) {
		event.preventDefault();
		init = (parseInt($(this).text())-1)*10;
		imprimir();
	});

	$('#app').on('click', '.recargar', function(event) {
		event.preventDefault();
		$('#app').html('<h2>Cargando datos...</h2>');
		cargar();
	});

	$('#app').on('click', '.eliminarCompletados', function(event) {
		event.preventDefault();
		list = _(list).filter( function(value) {
		  return !value.listo;
		});
		init = 0;
		imprimir();
	});

	$('#app').on('click','.eliminar',function(ev) {
		var fila = $(this).parents('tr');
		var id = parseInt(fila.data('id'));
		$.post('/pedido/eliminar', {id: id}, function(data, textStatus, xhr) {
			var pos = _(list).findIndex( function(value) {
				  return value.id == id;
				});
			list.splice(pos, 1);
			if(init > list.length-1){
				init-= 10;
			}
			imprimir();
		});
	});

	var agregar = function(ev){
		//var input = $(this).parents('.input-group').find('input');
		ev.preventDefault();
		var input = $(this).find('input');
		var nombre = input.val();
		input.val('');
		$.post('/pedidos', {request: {name: nombre}}, function(data, textStatus, xhr) {
			var nuevo = JSON.parse(data);
			var index = _(list).sortedIndex(nuevo, 'name');
			list.splice(index, 0, nuevo);
			imprimir();
			$('#inputName').focus();
		});
	};

	var comprar = function(ev) {
		ev.preventDefault();
		var self = $(this);
		var fila = self.parents('tr');
		var id = parseInt(fila.data('id'));
		$.post('/pedido/comprar', {id: id}, function(data, textStatus, xhr) {
			var res = JSON.parse(data);
			if(res.exito){
				_(list).find( function(value) {
				  return value.id == id;
				}).listo = true;
				imprimir();
			}
		});
	};

	$('#app').on('submit', 'form.agregar', agregar);
	$('#app').on('click', '.comprar', comprar);
});