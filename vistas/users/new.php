
<form action="/usuarios" method="POST" role="form">
	<legend>Nuevo usuario</legend>

	<div class="form-group">
		<label for="name">Nombre: </label>
		<input type="text" class="form-control" name="user[name]" id="name">
	</div>
	<div class="form-group">
		<label for="password">Contraseña: </label>
		<input type="password" class="form-control" name="user[password]" id="password">
	</div>

	<button type="submit" class="btn btn-success">Crear</button>
	<a href="/usuarios" class="btn btn-primary">Volver</a>
</form>
