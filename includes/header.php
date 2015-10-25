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
                <form class="navbar-form navbar-left form-inline" role="search">
                    <div class="form-group row">
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name="producto" placeholder="Producto">                            
                        </div>
                        <div class="col-xs-3">
                            <button type="submit" class="btn btn-default">Buscar</button>                            
                        </div>

                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($logged)){ ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if($logged->rol == 1){ ?><span class="label label-info">Admin</span><?php } ?> <?= $logged->name ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php if($logged->rol == 1){ ?>
                                    <li class="dropdown-header">Administrador</li>
                                    <li><a href="/admin/usuarios">Usuarios</a></li>
                                    <li><a href="/admin/productos">Productos</a></li>
                                    <li role="separator" class="divider"></li>
                                <?php } ?>
                                <li><a href="/salir">Cerrar sesión</a></li>
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
