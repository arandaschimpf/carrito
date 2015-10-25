<div class="row">
	<div class="col-xs-6">
		<h3>Usuarios</h3>		
	</div>
	<div class="col-xs-6 text-right">
		<a href="/admin/usuarios/nuevo" class="btn btn-primary btn-lg" type="submit">Crear nuevo</a>	
	</div>
</div>
<table class="table table-hover table-striped table-condensed">
	<thead>
		<tr>
			<th>Nombre</th>
			<th class="text-right">Opciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $key => $user) { ?>
			<tr>
				<td><?= $user->name ?></td>
				<td class="text-right">
					<?php if($user->rol != 1){ ?>
						<a href="/admin/usuarios/<?= $user->id ?>/promover" class="btn btn-success promover postButton" title="Subir a admin"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a>
					<?php }elseif ($logged->id != $user->id) {?>
						<a href="/admin/usuarios/<?= $user->id ?>/degradar" class="btn btn-primary degradar postButton" title="Quitar privilegios de admin"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a>
					<?php }else{ ?>
						<a class="btn btn-default" title="Eres admin"><span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span></a>
					<?php } ?>
					<a href="/admin/usuarios/<?= $user->id ?>/editar" class="btn btn-warning btn-sm" type="submit" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="/admin/usuarios/<?= $user->id ?>/eliminar" class="btn btn-danger btn-sm eliminar" title="Eliminar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				</td>
			</tr>			
		<?php } ?>
	</tbody>
</table>