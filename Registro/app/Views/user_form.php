<html>

<head>
    <title>Formulario de Usuario</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css');?>">
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

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" value="<?= old('email') ?>">
        <?php if (session()->has('errors')) : ?>
            <div><?= session('errors')['email']; ?></div>
        <?php endif; ?>

        <label for="password">Contraseña:</label>
        <input type="password" name="password">
        <?php if (session()->has('errors')) : ?>
            <div><?= session('errors')['password']; ?></div>
        <?php endif; ?>

        <button type="submit">Guardar</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Password</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['name'];?></td>
                    <td><?= $user['email'];?></td>
                    <td><?= $user['password'];?></td>
                    <td>
                        <a href="<?= site_url('user/delete/' . $user['id']); ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>