<?php require('./config/dbconex.php'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <div>
                <h1>ToDo List</h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a id="btnIngresar">Nueva Tarea</a></li>
                    <li><a id="btnConsultar">Listado de Tareas</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="panel">
                <h2 id="mensaje-inicial">Por favor seleccione una opción</h2>

                <div id="insertar">
                    <form id="insertarForm" action="" method="post">
                        <div class="column">
                            <h3 class="titulo">Agregar Tarea</h3>
                            <label for="tarea">Descripción</label>
                            <input type="text" name="tarea" id="tarea">
                            <input type="button" onclick="insertar(event)" id="guardar" value="Guardar" class="submit">
                        </div>
                    </form>
                </div>
                <div id="consultar"></div>
            </div>
            <div id="respuestas" class="respuestas"></div>
        </div>
    </main>
    <script src="./assets/js/main.js"></script>
</body>

</html>