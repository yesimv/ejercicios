 
  <div class="mx-auto max-w-7xl px-2 pb-5 sm:px-6 lg:px-8">
     <h2 class="text-3xl font-bold text-gray-900 m-10"><?php echo $userSesion['name']." ".$userSesion['lastName']; ?></h2>
 <?php
    if(isset($_SESSION['tareas'])){
                ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 m-10">

            <?php 
                foreach  ($listaTareas as $index => $elemento){
                    if($elemento['userId']== $userSesion['id']){
                if($elemento['isPending']){
                    $isEnd = '<form method="post" action="'.BASE_URL.'/tareas/changeStatus/'.$elemento["id"].'">
                                <button  type="submit" class="text-center flex-1 text-sm bg-red-600/80 hover:bg-red-700/80 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">PENDIENTE</button>
                            </form>';
                }else{
                    $isEnd = '<form method="post" action="'.BASE_URL.'/tareas/changeStatus/'.$elemento["id"].'">
                                <button  type="submit" class="text-center flex-1 text-sm bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">TERMINADA</button>
                            </form>';
                }
                ?>
                
                    <div class="profile-card bg-stone-100 rounded-lg shadow-md overflow-hidden transition duration-300 flex flex-col">
                    
                        <div class="p-4 flex-grow flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-start mb-1">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800"><?php 
                                            echo $elemento['title'];
                                            ?></h3>
                                        </br>
                                            <?php 
                                            echo $isEnd;
                                        
                                        ?>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="mt-4 flex gap-2">
                                <?php 
                                if($userSesion['isAdmin']==true){

                                echo '
                                <a href="'.BASE_URL.'/tareas/deleteById/'. $elemento['id'].'" class="flex-1 text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md text-center"> Eliminar</a>';
                                } ?>
                                

                                <a href=<?php echo '"'.BASE_URL.'/tareas/viewTarea/'. $elemento['id'].'"' ?> class="text-center flex-1 text-sm border border-red-600 text-red-600 hover:bg-red-50 px-3 py-2 rounded-md transition"> Ver</a>

                                
                            </div>
                        </div>
                    </div>
                <?php } }}
                
                else{echo "<p class='m-10'>Todavia no hay tareas guardadas.</p>";
                }
            ?>
            </div>

            <br>
            <a href=<?php echo '"' . BASE_URL . '/tareas/newTarea"' ?> class="flex-1 text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md ml-10">Nueva tarea</a>
            <?php if($userSesion['isAdmin']==true){
            ?>

            <?php
    } ?>
    
    <?php 
        if($userSesion['isAdmin']==true){
            echo '<button onclick="abrirModal()" type="button" data-toggle="modal" data-target="#verTodo" class="flex-1 text-sm bg-red-600/80 hover:bg-red-700/80 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md ">Ver Todo</button>';
        }
    
    ?> 

    
    <div id="verTodo" aria-hidden="true" tabindex="-1" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-stone-100 rounded-lg p-6 max-w-6xl w-full m-10">
        <button onclick="cerrarModal()" class="mb-4 text-red-600">Cerrar</button>
        <div  class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 m-10">
            <?php
                foreach  ($listaTareas as $index => $elemento){
                        if($elemento['isPending']){
            $isEnd = '<form method="post" action="'.BASE_URL.'/tareas/changeStatus/'.$elemento["id"].'">
                           <button  type="submit" class="text-center flex-1 text-sm bg-red-600/80 hover:bg-red-700/80 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">PENDIENTE</button>
                    </form>';
        }else{
            $isEnd = '<form method="post" action="?action=cambiarE&id='.$elemento["id"].'">
                           <button  type="submit" class="text-center flex-1 text-sm bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">TERMINADA</button>
                    </form>';
        }
                        ?>

                            <div class="profile-card bg-stone-100 rounded-lg shadow-md overflow-hidden transition duration-300 flex flex-col">

                                <div class="p-4 flex-grow flex flex-col justify-between">
                                    <div>
                                        <div class="flex justify-between items-start mb-1">
                                             <div>
                                                <h3 class="text-lg font-semibold text-gray-800"><?php 
                                                    echo $elemento['title'];
                                                     ?></h3>
                                                 </br>
                                                     <?php 
                                                     echo $isEnd;

                                                  ?>
                                             </div>

                                        </div>

                                    </div>
                                    <div class="mt-4 flex gap-2">
                                        <a href=<?php echo '"'.BASE_URL.'/tareas/deleteById/'. $elemento['id'].'"' ?> class="flex-1 text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md text-center"> Eliminar</a>


                                        <a href=<?php echo '"'.BASE_URL.'/tareas/viewTarea/'. $elemento['id'].'"' ?> class="text-center flex-1 text-sm border border-red-600 text-red-600 hover:bg-red-50 px-3 py-2 rounded-md transition"> Ver</a>

                                    </div>
                                </div>
                            </div>
                           <?php } ?>
        </div>  
        </div>             
    </div>    
  </div>
<script src="<?php echo BASE_URL; ?> /assets/js/modal.js"></script>



