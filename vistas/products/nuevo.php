<form action="/admin/productos" method="POST" role="form" enctype="multipart/form-data">
	<legend>Nuevo producto</legend>

	<div class="form-group">
		<label for="product[name]">Nombre: </label>
		<input type="text" class="form-control" name="product[name]" id="name">
	</div>
	<div class="form-group">
		<label for="imagen">Imagen: <span class="label label-default">Se aceptan archivos .jpg y .png</span></label>
		<input type="file" class="form-control" name="imagen" accept="image/*">
	</div>

	

	<button type="submit" class="btn btn-success">Crear</button>
	<a href="/admin/productos" class="btn btn-primary">Volver</a>
</form>