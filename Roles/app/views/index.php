<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Vista general</h1>
    <h3>Todos los usuarios:</h3>
    <p><?php   $this->getNombresUsuario($usuarios); ?></p>
    <h3>Administrador:</h3>
    <?php $this->getAdmin($usuarios); ?>
</body>
</html>
