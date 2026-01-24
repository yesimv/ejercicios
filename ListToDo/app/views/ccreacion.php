<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion de eliminacion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h2 class="text-3xl font-bold text-gray-900 m-10">Tarea Creada</h2>
    <hr>
    
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 m-10">
       
        <?php foreach  ($creacion as $index => $elemento){
        if($elemento['estaFinalizada']){
            $isEnd = '<button  class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">FINALIZADA</button>
                         ';
        }else{
            $isEnd = '<button  class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">PENDIENTE</button>
                         ';
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
                        <?php if($_SESSION['isAdmin']== true){

                           echo '
                           <form method="post" action="?action=delete&id=';echo $elemento["id"];
                           echo '">
                           <button  type="submit" class="text-center flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">Eliminar</button>
                            </form>';
                        } ?>
                         
                         <a href="?action=details&id=<?php echo $elemento['id'] ?>" class="text-center flex-1 text-sm border border-pink-600 text-pink-600 hover:bg-pink-50 px-3 py-2 rounded-md transition"> Ver</a>
                         
                    </div>
                </div>
            </div>
           <?php } ?>

    </div>
    <a href="?action=index" class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">REGRESAR</a>

</body>

</html>