<?php
echo $cambio;
echo json_encode($listaUsuarios);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="bg-white rounded-lg shadow-xl max-w-lg w-full m-10">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-900">Inicio de sesion</h1>
        <form method='post' action=<?php echo '"'.BASE_URL.'login/setSesion' ?> >
            <label  >Usuario</label> <input name="username" type="text"   placeholder="username" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border">
            <br>
            <label  >Contraseña</label> <input name="password" type="password"   placeholder="password" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border">
            <br>
            <button type="submit" class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md mt-5"> Login</button>
        </form>
    </div>
    </div>
    <a href=<?php echo '"'. BASE_URL.'/usuarios/newUser"' ?> class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md m-10">Crear cuenta</a>
    

</body>
</html>