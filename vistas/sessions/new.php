<form action="/entrar" method="POST" role="form">
	<legend>Autenticarse</legend>

	<div class="form-group">
		<label for="user[name]">Nombre: </label>
		<input type="text" class="form-control" name="user[name]" id="name">
	</div>
	<div class="form-group">
		<label for="user[password]">Contraseña: </label>
		<input type="password" class="form-control" name="user[password]" id="password">
	</div>
	

	<button type="submit" class="btn btn-primary">Entrar</button>
</form>