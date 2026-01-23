<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion de edicion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h2 class="text-3xl font-bold text-gray-900">Tarea Actualizada</h2>
    <hr>
    <?php echo json_encode($actualizacion); ?>
    <a href="?action=index" class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">REGRESAR</a>

</body>

</html>