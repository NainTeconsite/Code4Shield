<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('contenido') ?>

<div class="card bg-light mt-4">
    <div class="card-header">
        <p><?= $usuario->username ?></p>
    </div>
    <div class="card-body">
        <h3>Grupos</h3>
        <?php foreach ($usuario->getGroups() as $key): ?>
            <?= $key ?>
        <?php endforeach ?>
    </div>
    <div class="card-body">
        <h3>Permisos</h3>
        <?php foreach ($usuario->getPermissions() as $key): ?>
            <?= $key ?>
        <?php endforeach ?>
    </div>
    <div class="card-header">
        <h2>Grupos y permisos disponibles</h2>
    </div>
    <div class="card-body">
        <h3>Grupos</h3>
        <?php foreach ($groups as $key => $value): ?>
            <button class="btn btn-primary btn-sm mr-3 group"> <?= $key ?></button>
        <?php endforeach ?>
        <h3>Permisos</h3>
        <?php $oldGroup = ''; ?>
        <div class="flex-d mb-2 ms-2">
            <?php foreach ($permissions as $key => $value): ?>
                <?php if ($oldGroup != explode('.', $key)[0]): ?>
                    <?php $oldGroup = explode('.', $key)[0]; ?>
                    <h5><?= $oldGroup ?></h5>
                <?php endif; ?>

                <button class="btn btn-success btn-sm mr-3 permission <?php if ($usuario->can($key)): ?>
                    border-5 border-danger
                <?php endif; ?>"> <?= $key ?>     <?php if ($usuario->can($key)): ?>
                        Habilitado
                    <?php endif; ?></button>


            <?php endforeach ?>
        </div>
    </div>

</div>

<script>
    const groupButtons = document.querySelectorAll('.group');
    const permissionButtons = document.querySelectorAll('.permission');

    groupButtons.forEach(button => {
        button.addEventListener('click', () => {

            const groupValue = button.textContent.trim();
            // console.log(groupValue);
            const userId = '<?= $usuario->id ?>';
            const url = `${userId}/${groupValue}`;
            console.log(url)
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Ocurrió un error al realizar la solicitud.');
                    }
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });

    permissionButtons.forEach(button => {
        button.addEventListener('click', () => {
            let permissionValue = button.textContent.trim();

            permissionValue = permissionValue.replace('Habilitado', '').trim();

            console.log(permissionValue)
            const userId = '<?= $usuario->id ?>';
            const url = `${userId}`;

            const formData = new URLSearchParams();
            formData.append('permissionValue', permissionValue);

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Ocurrió un error al realizar la solicitud.');
                    }
                    // window.location.reload();
                    return response.json();
                })
                .then(res => {
                    // console.log(res)

                    if(res == 0){
                        button.classList.remove('border-5')
                        button.classList.remove('border-danger')
                        button.textContent.includes('Habilitado') ? button.textContent = button.textContent.replaceAll(' Habilitado', '') : ''
                    }else{
                        button.classList.add('border-5')
                        button.classList.add('border-danger')
                        button.textContent.includes('Habilitado') ? '' : button.textContent += 'Habilitado'

                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });

</script>

<?= $this->endSection() ?>