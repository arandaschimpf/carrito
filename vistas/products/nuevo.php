<form action="/admin/productos" method="POST" role="form">
	<legend>Nuevo producto</legend>

	<div class="form-group">
		<label for="product[name]">Nombre: </label>
		<input type="text" class="form-control" name="product[name]" id="name">
	</div>

	

	<button type="submit" class="btn btn-success">Crear</button>
	<a href="/admin/productos" class="btn btn-primary">Volver</a>
</form>