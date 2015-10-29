
<form action="/admin/productos/<?= $product->id ?>" method="POST" role="form" enctype="multipart/form-data">
	<legend>Editar producto <?= $product->name ?></legend>
	<div class="row">
		<div class="col-xs-12 col-sm-3">
			<?php if($product->imagen){ ?>
				<a href="#" class="thumbnail">
					<img src="<?= $product->imagen ?>" alt="Producto">
				</a>
			<?php }else{ ?>
				<div class="well text-center">
					<h2>No hay imagen</h2>
				</div>
			<?php } ?>	
		</div>
		<div class="col-xs-12 col-sm-9">
			<div class="form-group">
				<label for="name">Nombre: </label>
				<input type="text" class="form-control" name="product[name]" id="name" value="<?= $product->name; ?>">
			</div>
				<div class="form-group">
					<label for="imagen">Cambiar imagen: <span class="label label-default">Se aceptan archivos .jpg y .png</span></label>
					<input type="file" class="form-control" name="imagen" accept="image/*">
				</div>
			<div class="text-center">
				<button type="submit" class="btn btn-success">Guardar</button>
				<a href="/admin/productos" class="btn btn-primary">Volver</a>
			</div>			
		</div>
	</div>
</form>
