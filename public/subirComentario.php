<?php
    //Conexión con la base de datos
    include ("conexion.php");
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>A&L Eventos</title>

    <!--------------------------VINCULACION CSS-------------------------->
    
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/img-principal.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/admin.css">
    
    <!--------------------------FUENTES DE TEXTO-------------------------->

    <link rel="stylesheet" href="/css/ionicons.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Libre+Baskerville">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playball">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Serif+Pro">

</head>

<body style="background: url(&quot;/img/GENERAL/backgroundbody.jpg&quot;);background-size: auto;">
    
<!--------------------------PROCESO SUBIR COMENTARIO A LA BDD-------------------------->

    <?php

    include ("conexion.php");

    if (isset($_POST["nombre"]) and isset($_POST["comentario"]) and isset($_POST["fecha"]) and isset($_POST["titulo"])) {
        
        $query = "INSERT INTO comentarios (titulo, comentario, nombre, fecha) VALUES ('".$_POST['titulo']."', '".$_POST['comentario']."', '".$_POST['nombre']."', '".$_POST['fecha']."')";
        $envio = $conexion->query($query);

        $query2 = "SELECT count(*) as 'total' FROM comentarios";
        $envio2 = $conexion->query($query2);
        $totalRegistros = $envio2->fetch_assoc()['total'];

        if ($totalRegistros > 200){
            $query3 = "SELECT min(id) as 'id' FROM comentarios";
            $envio3 = $conexion->query($query3);
            $idBorrar = $envio3->fetch_assoc()['id'] ;

            $query4 = "DELETE FROM comentarios WHERE id = ".$idBorrar;
            $envio4 = $conexion->query($query4);
        }
    ?>

    <!--------------------------MENSAJE COMENTARIO CARGADO-------------------------->

    <center>
        <div class="caja-mensaje">
            <h1 class="titulo-admin">Su comentario se ha cargado con éxito <br> ¡Muchas gracias por participar!</h1>
            <a href='index.php'>Volver</a>
        </div>
    </center>
    <?php
        }
    ?>
</body>

</html>
