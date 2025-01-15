<?php
    /*
        NOTA: 
        En los casos en los que se eliminan imagenes SOLO se borran los registros de la base de datos, pero la imagen
        continuará almacenada en el directorio del servidor.
    */

    include ("conexion.php");
    
    $seccion = $_REQUEST['seccion'];
    $id = $_REQUEST['id'];

    switch ($seccion) {
        //-----------------------ELIMINAR NOTICIAS-----------------------------//
        case 'noticias':

            //BORRAR REGISTRO DE LA BASE DE DATOS
            $query = "DELETE FROM imagenes WHERE id=".$id;
            $envio = $conexion->query($query);
            break;

        //-----------------------ELIMINAR COMBOS-----------------------------//
        case 'combos':
            $query = "DELETE FROM combos WHERE id=".$id;
            $envio = $conexion->query($query);
            break;

        //-----------------------ELIMINAR VARIEDADES-----------------------------//
        case 'variedades':
            $query = "DELETE FROM variedades WHERE id=".$id;
            $envio = $conexion->query($query);
            break;

        //-----------------------ELIMINAR VARIEDADES EXTRA-----------------------------//
        case 'variedadesextra':
            $query = "DELETE FROM variedadesextra WHERE id=".$id;
            $envio = $conexion->query($query);
            break;
        
        //-----------------------ELIMINAR ENTRADAS-----------------------------//
        case 'entradas':
            $query = "DELETE FROM entradas WHERE id=".$id;
            $envio = $conexion->query($query);
            break;
        
        //-----------------------ELIMINAR ENTRADAS ESPECIALES-----------------------------//
        case 'entradasespeciales':
            $query = "DELETE FROM entradasespeciales WHERE id=".$id;
            $envio = $conexion->query($query);
            break;
        
        //-----------------------ELIMINAR IMAGENES NUESTRAS DELICIAS-----------------------------//
        case 'imagen_nuestrasdelicias':
            $query = "DELETE FROM imagenes WHERE id=".$id;
            $envio = $conexion->query($query);
            break;
        
        //-----------------------ELIMINAR IMAGENES GALERIA-----------------------------//
        case 'imagenes':
            $query = "DELETE FROM imagenes WHERE id=".$id;
            $envio = $conexion->query($query);
            break;
    }
?>

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

    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Libre+Baskerville">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playball">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Serif+Pro">

</head>

<body style="background: url(&quot;/img/GENERAL/backgroundbody.jpg&quot;);background-size: auto;">

    <div style="display:flex;justify-content:center;">
        <div class="caja-mensaje">
            <h1 class="titulo-admin">Se eliminó el registro correctamente</h1>
            <br><br>
            <a href='administracion.php#<?php echo $seccion ?>'>Volver</a>
        </div>
    </div>

</body>