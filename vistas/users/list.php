<table class="table table-hover table-striped table-condensed">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $key => $user) { ?>
			<tr>
				<td><?= $user->name ?></td>
				<td>
					<a href="/admin/usuarios/<?= $user->id ?>/editar" class="btn btn-warning btn-sm" type="submit" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="/admin/usuarios/<?= $user->id ?>/eliminar" class="btn btn-danger btn-sm eliminarUsuario" title="Eliminar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				</td>
			</tr>			
		<?php } ?>
	</tbody>
</table>
<div class="text-center">
	<a href="/admin/usuarios/nuevo" class="btn btn-primary btn-lg" type="submit">Crear nuevo</a>
</div>