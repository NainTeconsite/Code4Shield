<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg mb-3">
        <div class="container-fluid">
            <a class="navbar-brand">Shield</a>
            <!-- <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?= base_url()?>/dashboard/categoria" class="nav-link">Categoria</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url()?>/dashboard/pelicula" class="nav-link">Peliculas</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url()?>/dashboard/etiqueta" class="nav-link">Etiquetas</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= route_to('user.logout')?>" class="nav-link btn btn-danger">Logout</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <?= $this->renderSection('header') ?>
            </div>
            <div class="card-body">
                <?= $this->renderSection('contenido') ?>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>