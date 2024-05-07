<html>

<head>
    <title>Formulario de Usuario</title>
</head>

<body>
    <?php if (session()->has('message')) : ?>
        <div><?= session('message'); ?></div>
    <?php endif; ?>
    <form action="<?= site_url('user/store'); ?>" method="post">
        <?= csrf_field() ?>
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?= old('name') ?>">
        <?php if (session()->has('errors')) : ?>
            <div><?= session('errors')['name']; ?></div>
        <?php endif; ?>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>