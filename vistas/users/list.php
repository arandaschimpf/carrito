<table class="table table-hover table-striped table-condensed">
	<thead>
		<tr>
			<th>Nombre</th>
			<th colspan="2"></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $key => $user) { ?>
			<tr>
				<td><?= $user->name ?></td>
				<td>
					<a href="/usuarios/<?= $user->id ?>/editar" class="btn btn-warning btn-sm" type="submit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="/usuarios/<?= $user->id ?>/eliminar" class="btn btn-danger btn-sm eliminarUsuario"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				</td>
			</tr>			
		<?php } ?>
	</tbody>
</table>

<a href="/usuarios/nuevo" class="btn btn-primary" type="submit">Crear nuevo</a>