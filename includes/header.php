<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>Carrito</title>
        <link rel="stylesheet" href="<?= $BASEURL ?>/cdn/css/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Carrito de compras</a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php if($ruta != 'GET | /'){ ?>
                        <li><a href="/">Volver al inicio</a></li>
                    <?php } ?>
                    <?php if(isset($logged)){ ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if($logged->rol == 1){ ?><span class="label label-info">Admin</span><?php } ?> <?= $logged->name ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php if($logged->rol == 1){ ?>
                                    <li class="dropdown-header">Administrador</li>
                                    <li><a href="/admin/usuarios"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
                                    <li><a href="/admin/productos"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Productos</a></li>
                                    <li role="separator" class="divider"></li>
                                <?php } ?>
                                <li><a href="/salir"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar sesión</a></li>
                            </ul>
                        </li>
                    <?php }else{ ?>
                        <li><a href="/entrar">Iniciar sesión</a></li>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        <div class="container">
        <div id="alert">
            <?php if(isset($flash)){ ?>
                <div class="alert alert-info" style="display: none;">
                    <?= $flash; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
            <?php } ?>
        </div>
