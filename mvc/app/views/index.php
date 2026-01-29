<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="grid gap-2 max-w-1/3">
        <a href=<?php echo '"' . BASE_URL . '/tareas/index"' ?>php class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md m-10">Tareas</a>
        <a href=<?php echo '"' . BASE_URL . '/usuarios/index"' ?>php class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md m-10">Usuarios</a>
        <a href=<?php echo '"' . BASE_URL . '/login/logOut"' ?>php class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md m-10">Cerrar sesion</a>

    </div>

</body>

</html>