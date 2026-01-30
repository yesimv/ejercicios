
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 flex justify-center">
    <div class="bg-stone-100 rounded-lg shadow-xl max-w-lg w-full m-10">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Datos del Usuario </h3>

            </div>
            <?php echo '<form method="post" action="'.BASE_URL.'/usuarios/editById/'.$datosUsuario['id'].'" class="space-y-4 ">'; ?>
                <div>
                    
                    <label >Nombre</label> 
                    <input  type="text" name="name" id="message-subject" class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 p-2 border" value="<?php echo $datosUsuario['name']; ?>">
                </div>
                <div>
                    <label>Apellido</label> 
                    <input  type="text" name="lastName" id="message-subject" class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 p-2 border" value="<?php echo $datosUsuario['lastName']; ?>">
                </div>
                <div>
                    <label>username</label> 
                    <input type="text" name="username" id="message-subject" class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 p-2 border" value="<?php echo $datosUsuario['username']; ?>">
                </div>
                <div>
                    <label>Contraseña</label> 
                    <input type="text" name="password" id="message-subject" class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 p-2 border" value="<?php echo $datosUsuario['password']; ?>">
                </div>
                <div>
                    <label>Correo electronico</label> 
                    <input type="text" name="email" id="message-subject" class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 p-2 border" value="<?php echo $datosUsuario['email']; ?>">
                </div>
                <div>
                    <label>Permisos de Administrador</label> 
                    <input name="isAdmin" type="checkbox"   placeholder="isAdmin" value="1" <?php echo ($datosUsuario['isAdmin']) ? 'checked' : ''; ?>></p>
                    
                </div>
                 
                <div class="pt-2 flex items center justify-center gap-2">
                    <button type="submit" class="text-center flex-1 text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md ">Editar</button>
                    
                    <a href=<?php echo '"'.BASE_URL.'/usuarios/index"' ?> class="text-center flex-1 text-sm bg-stone-600 hover:bg-stone-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md ">Regresar</a>
                </div>
            </form>
        </div>
    </div>



  </div>
