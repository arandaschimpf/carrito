
<form action="/admin/usuarios" method="POST" role="form">
	<legend>Nuevo usuario</legend>

	<div class="form-group">
		<label for="rol">Rol: </label>
		<select name="user[rol]" id="rol" class="form-control">
			<option value="0">Usuario</option>
			<option value="1">Administrador</option>
		</select>
	</div>
	<div class="form-group">
		<label for="name">Nombre: </label>
		<input type="text" class="form-control" name="user[name]" id="name">
	</div>
	<div class="form-group">
		<label for="password">Contraseña: </label>
		<input type="password" class="form-control" name="user[password]" id="password">
	</div>
	<div class="form-group">
		<label for="name">Email (opcional): </label>
		<input type="email" class="form-control" name="user[email]" id="name">
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-success">Crear</button>
		<a href="/admin/usuarios" class="btn btn-primary">Volver</a>
	</div>
</form>
