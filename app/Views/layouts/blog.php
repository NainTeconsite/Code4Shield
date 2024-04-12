<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Blog</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

    <nav class="navbar navbar-expand-lg mb-3">
        <div class="container-fluid">
            <a class="navbar-brand">Code 4</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Películas</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= route_to('user.logout') ?>" class="nav-link btn btn-danger">Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <?= $this->renderSection('contenido') ?>
    </div>

    <script src="<?= base_url() ?>/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>