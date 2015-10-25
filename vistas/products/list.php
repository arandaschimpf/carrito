<div class="row">
	<div class="col-xs-6">
		<h3>Productos</h3>		
	</div>
	<div class="col-xs-6 text-right">
		<a href="/admin/productos/nuevo" class="btn btn-primary btn-lg" type="submit">Crear nuevo</a>		
	</div>
</div>
<div class="table-responsive">
	<input type="text" name="search" id="inputSearch" class="form-control filtrado" placeholder="Buscar">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($product as $key => $product){?>
				<tr>
					<td><?= $product->name ?></td>
					<td class="text-right">
						<a href="/admin/productos/<?= $product->id ?>/editar" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						<a href="/admin/productos/<?= $product->id ?>/eliminar" class="btn btn-danger eliminar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php $js[] = "/cdn/js/filtrado.js"; ?>