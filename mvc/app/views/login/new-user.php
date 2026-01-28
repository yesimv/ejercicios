
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="bg-white rounded-lg shadow-xl max-w-lg w-full m-10">
        <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-900">Registro</h1>
        <form method='post' action=<?php echo '"'. BASE_URL.'/usuarios/create"' ?>>
            <label  >Nombre de usuario</label> <input name="username" type="text" required  placeholder="Correo electronico" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border">
            <br>
            <label  >Contraseña</label> <input name="password" type="password" required  placeholder="Contraseña" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border">
            <br>
            <label  >Nombre</label> <input name="name" type="text" required  placeholder="Nombre" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border">
            <br>
            <label  >Apellido</label> <input name="lastName" type="text" required  placeholder="Apellido" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border">
            <br>
            <label  >Correo electronico</label> <input name="email" type="text" required  placeholder="Correo electronico" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border">
            <br>
            <p>Eres administrador? <input name="isAdmin" type="checkbox"   placeholder="isAdmin" value="1"></p> 
            <br>
            
            <button type="submit" class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md"> Registrar</button>
            

        </form>
    </div>
    </div>
   
    <a href=<?php echo '"'.BASE_URL.'"' ?>php class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md m-10">Regresar</a>
</body>
</html>