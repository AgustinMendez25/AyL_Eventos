<?php
    include ("conexion.php");
    
    $seccion = $_REQUEST['seccion'];
    $id = $_REQUEST['id'];

    switch ($seccion) {
        //-----------------------MODIFICAR NOTICIAS-----------------------------//
        case 'noticias':
            if ( isset($_POST['descripcion']) ){
                $query = "UPDATE imagenes SET descripcion='".$_POST['descripcion']."' WHERE id=".$id;
                $envio = $conexion->query($query);
            }
            break;

        //-----------------------MODIFICAR COMBOS-----------------------------//
        case 'combos':
            if ( isset($_POST['cantVariedades']) and isset($_POST['cantEntradas']) and isset($_POST['cantEntradasEspeciales']) ){
                $query = "UPDATE combos SET cantVariedades=".$_POST['cantVariedades'].", cantEntradas=".$_POST['cantEntradas'].", cantEntradasEspeciales=".$_POST['cantEntradasEspeciales']." WHERE id=".$id;
                $envio = $conexion->query($query);
            }
            break;

        //-----------------------MODIFICAR VARIEDADES-----------------------------//
        case 'variedades':
            if ( isset($_POST['variedad']) ){
                $query = "UPDATE variedades SET variedad='".$_POST['variedad']."' WHERE id=".$id;
                $envio = $conexion->query($query);
            }
            break;

        //-----------------------MODIFICAR VARIEDADES EXTRA-----------------------------//
        case 'variedadesextra':
            if ( isset($_POST['variedadextra']) ){
                $query = "UPDATE variedadesextra SET variedadextra='".$_POST['variedadextra']."' WHERE id=".$id;
                $envio = $conexion->query($query);
            }
            break;
        
        //-----------------------MODIFICAR ENTRADAS-----------------------------//
        case 'entradas':
            if ( isset($_POST['entrada']) ){
                $query = "UPDATE entradas SET entrada='".$_POST['entrada']."' WHERE id=".$id;
                $envio = $conexion->query($query);
            }
            break;
        
        //-----------------------MODIFICAR ENTRADAS ESPECIALES-----------------------------//
        case 'entradasespeciales':
            if ( isset($_POST['entradaEspecial']) ){
                $query = "UPDATE entradasespeciales SET entradaEspecial='".$_POST['entradaEspecial']."' WHERE id=".$id;
                $envio = $conexion->query($query);
            }
            break;

        //-----------------------MODIFICAR IMAGENES NUESTRAS DELICIAS-----------------------------//
        case 'imagen_nuestrasdelicias':
            if ( isset($_POST['nombre_archivo']) ){
                //Obtiene el id de imagen más alto para asignarle ese valor más 1 al id de la nueva imagen
                $query1 = "SELECT max(id) as 'id' FROM imagenes";
                $envio1 = $conexion->query($query1);
                $id_nuevo = $envio1->fetch_assoc()['id'];
                $id_nuevo++;

                //Actualiza el registro y coloca la sección de imagen, el id y la url
                $url = "assets/img/".$_POST['seccion_imagen']."/".$_POST['nombre_archivo'];
                $query2 = "UPDATE imagenes SET seccion_imagen='".$_POST['seccion_imagen']."',URL_imagen='".$url."', id=".$id_nuevo." WHERE id=".$id;
                $envio2 = $conexion->query($query2);

                //Almacena la dirección actual y la nueva
                $dir_actual = $_SERVER['DOCUMENT_ROOT'].'/ayl_eventos/assets/img/'.$_POST['nombre_archivo'];
                $dir_nueva = $_SERVER['DOCUMENT_ROOT'].'/ayl_eventos/'.$url;

                //Mueve el archivo de la direccion actual a la direccion nueva
                rename($dir_actual, $dir_nueva);
            }
            break;
        
        //-----------------------MODIFICAR IMAGENES GALERIA-----------------------------//
        case 'imagenes':
            if ( isset($_POST['nombre_archivo']) ){
                //Obtiene el id de imagen más alto para asignarle ese valor más 1 al id de la nueva imagen
                $query1 = "SELECT max(id) as 'id' FROM imagenes";
                $envio1 = $conexion->query($query1);
                $id_nuevo = $envio1->fetch_assoc()['id'];
                $id_nuevo++;

                //Actualiza el registro y coloca la sección de imagen, el id y la url
                $url = "assets/img/Galeria/".$_POST['nombre_archivo'];
                $query2 = "UPDATE imagenes SET seccion_imagen='".$_POST['seccion_imagen']."',URL_imagen='".$url."', id=".$id_nuevo." WHERE id=".$id;
                $envio2 = $conexion->query($query2);

                //Almacena la dirección actual y la nueva
                $dir_actual = $_SERVER['DOCUMENT_ROOT'].'/ayl_eventos/assets/img/'.$_POST['nombre_archivo'];
                $dir_nueva = $_SERVER['DOCUMENT_ROOT'].'/ayl_eventos/'.$url;

                //Mueve el archivo de la direccion actual a la direccion nueva
                rename($dir_actual, $dir_nueva);
            }
            break;
    }
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>A&L Eventos</title>

    <!--------------------------VINCULACION CSS-------------------------->
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/img-principal.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    
    <!--------------------------FUENTES DE TEXTO-------------------------->

    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Libre+Baskerville">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playball">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Serif+Pro">

</head>

<body style="background: url(&quot;assets/img/GENERAL/backgroundbody.jpg&quot;);background-size: auto;">

    <div style="display:flex;justify-content:center;">
        <div class="caja-mensaje">
            <h1 class="titulo-admin">Se modificó el registro correctamente</h1>
            <br><br>
            <a href='administracion.php#<?php echo $seccion ?>'>Volver</a>
        </div>
    </div>

</body>