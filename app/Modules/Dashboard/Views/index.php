<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('contenido') ?>
<?php foreach ($usuarios as $key): ?>

    <div class="card bg-light mt-4">
        <div class="card-header">
            <p><?= $key->username ?></p>
        </div>
        <div class="card-body">
            ...
        </div>
        <div class="card-footer">
            <a href="#" class="btn btn-primary"> Grupos y permisos</a>
        </div>
    </div>

<?php endforeach ?>
<?= $this->endSection() ?>