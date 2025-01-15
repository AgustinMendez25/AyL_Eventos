<?php
    include ("conexion.php");
    
    $seccion = $_REQUEST['seccion'];

    switch ($seccion) {
        //-----------------------MODIFICAR NOTICIAS-----------------------------//
        case 'noticias':
            if (isset($_POST['subir'])){
                $nombre_img = $_FILES['imagen']['name'];
                if ($nombre_img == !NULL){

                    //Obtiene el directorio para cargar la imagen
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/ayl_eventos//img/Noticias/';
                    
                    //Carga la imagen en el servidor
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
                    
                    //Carga la URL en la base de datos
                    $url_imagen = '/img/Noticias/'.$nombre_img;
                    $query = "INSERT INTO imagenes(seccion_imagen, URL_imagen) values('Noticias','".$url_imagen."')";
                    $envio = $conexion->query($query);
                }
            }
            break;

        //-----------------------MODIFICAR COMBOS-----------------------------//
        case 'combos':
            if ( isset($_POST['cantVariedades']) and isset($_POST['cantEntradas']) and isset($_POST['cantEntradasEspeciales']) ){
                $query = "INSERT INTO combos(cantVariedades, cantEntradas, cantEntradasEspeciales) values (".$_POST['cantVariedades'].",".$_POST['cantEntradas'].",".$_POST['cantEntradasEspeciales'].")";
                $envio = $conexion->query($query);
            }
            break;

        //-----------------------MODIFICAR VARIEDADES-----------------------------//
        case 'variedades':
            if ( isset($_POST['variedad']) ){
                $query = "INSERT INTO variedades(variedad) values('".$_POST['variedad']."')";
                $envio = $conexion->query($query);
            }
            break;

        //-----------------------MODIFICAR VARIEDADES EXTRA-----------------------------//
        case 'variedadesextra':
            if ( isset($_POST['variedadextra']) ){
                $query = "INSERT INTO variedadesextra(variedadextra) values('".$_POST['variedadextra']."')";
                $envio = $conexion->query($query);
            }
            break;
        
        //-----------------------MODIFICAR ENTRADAS-----------------------------//
        case 'entradas':
            if ( isset($_POST['entrada']) ){
                $query = "INSERT INTO entradas(entrada) values('".$_POST['entrada']."')";
                $envio = $conexion->query($query);
            }
            break;
        
        //-----------------------MODIFICAR ENTRADAS ESPECIALES-----------------------------//
        case 'entradasespeciales':
            if ( isset($_POST['entradaEspecial']) ){
                $query = "INSERT INTO entradasespeciales(entradaEspecial) values('".$_POST['entradaEspecial']."')";
                $envio = $conexion->query($query);
            }
            break;
        
        //-----------------------MODIFICAR IMAGENES NUESTRAS DELICIAS-----------------------------//
        case 'imagenes_nuestrasdelicias':
            if (isset($_POST['subir'])){
                $nombre_img = $_FILES['imagen']['name'];
                if ($nombre_img == !NULL){

                    //Obtiene el directorio para cargar la imagen
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/ayl_eventos//img/';
                    
                    //Carga la imagen en el servidor
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
                    
                    //Carga la URL en la base de datos
                    $url_imagen = '/img/'.$nombre_img;
                    $query = "INSERT INTO imagenes(id,URL_imagen) values(-1, '".$url_imagen."')";
                    $envio = $conexion->query($query);
                }
            }
            header("Location: modificar.php?seccion=imagen_nuestrasdelicias&id=-1");

            break;
        
        //-----------------------MODIFICAR IMAGENES GALERIA-----------------------------//
        case 'imagenes':
            if (isset($_POST['subir'])){
                $nombre_img = $_FILES['imagen']['name'];
                if ($nombre_img == !NULL){

                    //Obtiene el directorio para cargar la imagen
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/ayl_eventos//img/';
                    
                    //Carga la imagen en el servidor
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
                    
                    //Carga la URL en la base de datos
                    $url_imagen = '/img/'.$nombre_img;
                    $query = "INSERT INTO imagenes(id,URL_imagen) values(-1, '".$url_imagen."')";
                    $envio = $conexion->query($query);
                }
            }
            header("Location: modificar.php?seccion=imagenes&id=-1");
            
            break;
    }
?>

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
            <h1 class="titulo-admin">Se insertó el registro correctamente</h1>
            <br><br>
            <a href='administracion.php#<?php echo $seccion ?>'>Volver</a>
        </div>
    </div>

</body>