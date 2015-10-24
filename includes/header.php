<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Carrito</title>
        <link rel="stylesheet" href="<?= $BASEURL ?>/cdn/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
        <?php if(isset($flash)){ ?>
            <div class="alert alert-info">
                <?= $flash; ?>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        <?php } ?>
