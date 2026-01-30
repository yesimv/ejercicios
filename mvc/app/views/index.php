<?php

//echo $ruta;
//echo json_encode($_SESSION['sesion']['isAdmin']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesion abierta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://masterfuel.mx/assets/img/faviconGota.png" rel="icon">
</head>

<body>
    <?php if(isset($_SESSION['sesion'])){

     ?>
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
    <nav class="relative bg-stone-950/50 after:pointer-events-none after:absolute after:inset-x-0 after:bottom-0 after:h-px after:bg-stone-100/10">
        
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            
            <div class="relative flex h-16 items-center justify-between">
                
                <div class="absolute inset-y-0 left-0 flex items-center hidden">
                    <!-- Mobile menu button-->
                     <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-stone-100/5 hover:text-white focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                
                <div class="flex flex-1 items-center  sm:justify-start">

                    <div class="flex shrink-0 items-center mx-5 sm:mx-0">
                        <img src="https://masterfuel.mx/assets/img/faviconGota.png" alt="Your Company" class="h-8 w-auto" />
                    </div>
                    
                    <div class=" sm:ml-6 ">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-stone-950/50 text-white", Default: "text-gray-300 hover:bg-stone-100/5 hover:text-white"
                            <a href="#" aria-current="page" class="rounded-md bg-stone-950/50 px-3 py-2 text-sm font-medium text-white">Inicio</a> -->
                            <a href=<?php echo '"' . BASE_URL . '/tareas/index"' ?>php  class="rounded-md px-3 py-2 text-md text-white font-medium  hover:bg-stone-100/5 hover:text-white">Tareas</a>
                            <?php if ($userSesion['isAdmin'] == true) { ?>
                                <a href=<?php echo '"' . BASE_URL . '/usuarios/index"' ?>php class="rounded-md px-3 py-2 text-md text-white font-medium hover:bg-stone-100/5 hover:text-white">Usuarios</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <p class="text-md text-white font-medium hidden sm:block"><?php echo "Hola ". $userSesion['name'] . " " . $userSesion['lastName']; ?></p>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <a href=<?php echo '"' . BASE_URL . '/login/logOut"' ?>php class="text-center flex-1 text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md ">Cerrar sesion</a>
                </div>
            </div>
        </div>

        <el-disclosure id="mobile-menu" hidden class="">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <!-- Current: "bg-stone-950/50 text-white", Default: "text-gray-300 hover:bg-stone-100/5 hover:text-white" -->
                <!-- <a href="#" aria-current="page" class="block rounded-md bg-stone-950/50 px-3 py-2 text-base font-medium text-white">Dashboard</a> -->
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-stone-100/5 hover:text-white">Tareas</a>
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-stone-100/5 hover:text-white">Usuarios</a>
             <!--    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-stone-100/5 hover:text-white">Calendar</a> -->
            </div>
        </el-disclosure>
    </nav>
    <?php } ?>
      <!-- CONTENEDOR DINÁMICO -->
    <main class="container">
        <?php
            if (isset($vista)) {
                include $vista;
            }
        ?>
    </main>



</body>

</html>