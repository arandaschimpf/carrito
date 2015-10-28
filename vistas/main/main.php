<?php if(isset($logged)){?>
	<div id="app">
		<h2>Cargando datos...</h2>
	</div>
	<?php $js[] = "/cdn/js/app.js"; ?>
    <script>
        var logged = <?= json_encode($logged->export()); ?>;
    </script>
	<?php $templates = true; ?>
<?php }else{ ?>
	<h2>Este sitio es privado.</h2>
	<h3>Debe autenticarse para acceder a él.</h3>
	<?php require 'vistas/sessions/new.php'; ?>
<?php } ?>