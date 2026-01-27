<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 m-10">
<?php
foreach  ($mostrarTareas() as $index => $elemento){
        if(!$elemento['estaFinalizada']){
            $isEnd = '<form method="post" action="?action=cambiarE&id='.$elemento["id"].'">
                           <button  type="submit" class="text-center flex-1 text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">PENDIENTE</button>
                    </form>';
        }else{
            $isEnd = '<form method="post" action="?action=cambiarE&id='.$elemento["id"].'">
                           <button  type="submit" class="text-center flex-1 text-sm bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">TERMINADA</button>
                    </form>';
        }
        ?>
        
            <div class="profile-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 flex flex-col">
              
                <div class="p-4 flex-grow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-1">
                             <div>
                                <h3 class="text-lg font-semibold text-gray-800"><?php 
                                    echo $elemento['titulo'];
                                     ?></h3>
                                 </br>
                                     <?php 
                                     echo $isEnd;
                                 
                                  ?>
                             </div>
                             
                        </div>
                        
                    </div>
                    <div class="mt-4 flex gap-2">
                        <a href="?action=delete&id=<?php echo $elemento['id'] ?>" class="text-center flex-1 text-sm border border-pink-600 text-pink-600 hover:bg-pink-50 px-3 py-2 rounded-md transition"> Eliminar</a>
                        
                         
                         <a href="?action=details&id=<?php echo $elemento['id'] ?>" class="text-center flex-1 text-sm border border-pink-600 text-pink-600 hover:bg-pink-50 px-3 py-2 rounded-md transition"> Ver</a>
                         
                    </div>
                </div>
            </div>
           <?php } ?>
</div>