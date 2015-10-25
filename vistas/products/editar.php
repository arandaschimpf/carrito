
<form action="/admin/productos/<?= $product->id ?>" method="POST" role="form">
	<legend>Editar producto <?= $product->name ?></legend>

	<div class="form-group">
		<label for="name">Nombre: </label>
		<input type="text" class="form-control" name="product[name]" id="name" value="<?= $product->name; ?>">
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="/admin/productos" class="btn btn-primary">Volver</a>
	</div>
</form>
