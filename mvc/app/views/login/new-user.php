
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="bg-stone-100 rounded-lg shadow-xl max-w-lg w-full m-10">
        <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-900 pb-5">Registro</h1>
        <form method='post' class="grid gap-2" action=<?php echo '"'. BASE_URL.'/usuarios/create"' ?>>
            <label  >Nombre de usuario</label> <input name="username" type="text" required  placeholder="Correo electronico" class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 p-2 border">
            
            <label  >Contraseña</label> <input name="password" type="password" required  placeholder="Contraseña" class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 p-2 border">
            
            <label  >Nombre</label> <input name="name" type="text" required  placeholder="Nombre" class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 p-2 border">
            
            <label  >Apellido</label> <input name="lastName" type="text" required  placeholder="Apellido" class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 p-2 border">
           
            <label  >Correo electronico</label> <input name="email" type="text" required  placeholder="Correo electronico" class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 p-2 border">
            
            <p>Eres administrador? <input name="isAdmin" type="checkbox"   placeholder="isAdmin" value="1"></p> 
            
            <div class="pt-2 flex items center justify-center gap-2">
                <button type="submit" class="flex-1 text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md"> Registrar</button>
                <a href=<?php echo '"' . BASE_URL . '/login/index"' ?>php class="text-center flex-1 text-sm bg-stone-600 hover:bg-stone-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md ">Regresar</a>
            </div>
        </form>
    </div>
    </div>
   
   
</body>
</html>