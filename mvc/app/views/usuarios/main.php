
 <h2 class="text-3xl font-bold text-gray-900 m-10"><?php echo $userSesion['name']." ".$userSesion['lastName']; ?></h2>
 
 
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 m-10">

        <?php 
        foreach  ($listaUsuarios as $index => $elemento){
            if($elemento['isActive']== TRUE){

            
        /* if(!$elemento['isActive']){
            $isEnd = '<form method="post" action="'.BASE_URL.'/usuarios/deleteById/'.$elemento["id"].'">
                           <button  type="submit" class="text-center flex-1 text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">INACTIVO</button>
                    </form>';
        }else{
            $isEnd = '<form method="post" action="'.BASE_URL.'/usuarios/deleteById/'.$elemento["id"].'">
                           <button  type="submit" class="text-center flex-1 text-sm bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">ACTIVO</button>
                    </form>';
        } */
        ?>
        
            <div class="profile-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 flex flex-col">
              
                <div class="p-4 flex-grow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-1">
                             <div>
                                <h3 class="text-lg font-semibold text-gray-800"><?php 
                                    echo $elemento['name'].' '.$elemento['lastName'];
                                     ?></h3>
                                 
                             </div>
                             
                        </div>
                        
                    </div>
                    <div class="mt-4 flex gap-2">
                        
                        
                        <a href=<?php echo '"'.BASE_URL.'/usuarios/deleteById/'. $elemento['id'].'"' ?> class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md text-center"> Eliminar</a>
                        
                         

                         <a href=<?php echo '"'.BASE_URL.'/usuarios/viewUsuario/'. $elemento['id'].'"' ?> class="text-center flex-1 text-sm border border-pink-600 text-pink-600 hover:bg-pink-50 px-3 py-2 rounded-md transition"> Ver</a>

                         
                    </div>
                </div>
            </div>
           <?php } }
           
        
    ?>
    </div>

    <br>
    <a href=<?php echo '"' . BASE_URL . '/usuarios/newUsuario"' ?> class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md ml-10">Nuevo usuario</a>
    <button onclick="abrirModal()" type="button" data-toggle="modal" data-target="#verTodo" class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md ">Ver Todo</button>
    
    
    
    
   <!--  <a href=<?php echo '"' . BASE_URL . '/home/index"' ?>php class="text-center flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md ">Regresar</a>
        
        <a href=<?php echo '"' . BASE_URL . '/login/logOut"' ?>php class="text-center flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md ">Cerrar sesion</a>
 -->
    <div class="grid grid-cols-12 gap-4">
        
        </div>
    
        <div id="verTodo" aria-hidden="true" tabindex="-1" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 max-w-6xl w-full m-10">
            <button onclick="cerrarModal()" class="mb-4 text-red-600">Cerrar</button>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 m-10">

            <?php 
            foreach  ($listaUsuarios as $index => $elemento){
            

                
            if(!$elemento['isActive']){
                $isEnd = '<form method="post" action="'.BASE_URL.'/usuarios/deleteById/'.$elemento["id"].'">
                            <button  type="submit" class="text-center flex-1 text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">INACTIVO</button>
                        </form>';
            }else{
                $isEnd = '<form method="post" action="'.BASE_URL.'/usuarios/deleteById/'.$elemento["id"].'">
                            <button  type="submit" class="text-center flex-1 text-sm bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">ACTIVO</button>
                        </form>';
            } 
            ?>
            
                <div class="profile-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 flex flex-col">
                
                    <div class="p-4 flex-grow flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start mb-1">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800"><?php 
                                        echo $elemento['name'].' '.$elemento['lastName'];
                                        ?></h3>
                                    </br>
                                        <?php 
                                        echo $isEnd;
                                    
                                    ?>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="mt-4 flex gap-2">
                            
                            <?php if($elemento['isActive']){ ?>
                            <a href=<?php echo '"'.BASE_URL.'/usuarios/deleteById/'. $elemento['id'].'"' ?> class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md text-center"> Eliminar</a>
                            <a href=<?php echo '"'.BASE_URL.'/usuarios/viewUsuario/'. $elemento['id'].'"' ?> class="text-center flex-1 text-sm border border-pink-600 text-pink-600 hover:bg-pink-50 px-3 py-2 rounded-md transition"> Ver</a>
                            <?php } ?>
                            

                            

                            
                        </div>
                    </div>
                </div>
            <?php } 
            
            
            ?>
        </div>          
    </div>  


<script>
function abrirModal() {
  document.getElementById('verTodo').classList.remove('hidden');
}

function cerrarModal() {
  document.getElementById('verTodo').classList.add('hidden');
}
</script>
