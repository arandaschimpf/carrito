
<form action="/usuarios/<?= $user->id ?>" method="POST" role="form">
	<legend>Editar usuario</legend>

	<div class="form-group">
		<label for="name">Nombre: </label>
		<input type="text" class="form-control" name="user[name]" id="name" value="<?= $user->name; ?>">
	</div>
	<div class="form-group">
		<label for="password">Contraseña: </label>
		<input type="password" class="form-control" name="user[password]" id="password">
	</div>

	<button type="submit" class="btn btn-success">Guardar</button>
	<a href="/usuarios" class="btn btn-primary">Volver</a>
</form>
