    </div>
	
	<?php require 'includes/templates.php'; ?>
    <script src="<?= $BASEURL ?>/cdn/js/jquery.min.js"></script>
    <script src="<?= $BASEURL ?>/cdn/js/underscore-min.js"></script>
    <script src="<?= $BASEURL ?>/cdn/js/bootstrap.min.js"></script>
    <script src="/cdn/js/interfaz.js"></script>
    <?php foreach ($js as $fi) {?>
		<script src="<?= $fi ?>"></script>
    <?php } ?>
    </body>
</html>