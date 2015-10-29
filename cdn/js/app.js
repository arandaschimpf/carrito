$(function() {
	var list, limit = 10, init=0;
	var compilada = _.template($('#templateLista').html());
	var tmpP =  _.template($('#templatePedido').html());
	window.scope = {};
	
	var imprimir = function() {
		var vista = list.slice(init, init+limit);
		$('#app').html(compilada({lista: vista, tmpP: tmpP, user: logged, size: list.length, index: init}));		
	};

	var cargar = function() {
		$.getJSON('/pedidos', function(lista, textStatus) {
			list = lista;
			imprimir();
		});		
	};
	cargar();

	scope.cambiarPag = function(pag) {
		event.preventDefault();
		if(init != parseInt(pag)*10){
			init = parseInt(pag)*10;
			imprimir();			
		}
	};

	scope.recargar = function() {
		event.preventDefault();
		$('#app').html('<h2 class="text-center">Cargando datos...</h2>');
		cargar();
	};

	scope.eliminarCompletados = function() {
		event.preventDefault();
		list = _(list).filter( function(value) {
		  return !value.listo;
		});
		init = 0;
		imprimir();
	};

	scope.eliminar = function(id, index) {
		$.post('/pedido/eliminar', {id: id}, function(data) {
			list.splice(index, 1);
			if(init > list.length-1)
				init -= 10;
			imprimir();
		});
	};

	scope.comprar = function(id, index) {
		$.post('/pedido/comprar', {id: id}, function(data, textStatus, xhr) {
			var res = JSON.parse(data);
			if(res.exito){
				list[index].listo = true;
				imprimir();
			}
		});
	};

	scope.agregar = function() {
		event.preventDefault();
		var nombre = event.target.name.value; 
		event.target.reset();
		$.post('/pedidos', {request: {name: nombre}}, function(data, textStatus, xhr) {
			var nuevo = JSON.parse(data);
			var index = _(list).sortedIndex(nuevo, 'name');
			list.splice(index, 0, nuevo);
			imprimir();
			$('#inputName').focus();
		});
	};

});