<?php
	session_start();

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
    
    <!--------------------------VERIFICACION ADMIN-------------------------->

    <?php
        if (!empty($_SESSION['contraseña_admin'])){   
    ?>
        <div class="header-admin">
            <h1 class="titulo-admin">Modo Administrador</h1>
            <a href='cerrar_sesion.php'>Cerrar Sesion de Administrador</a>
        </div>
    <?php
        }
    ?>


    <!--------------------------NAVBAR-------------------------->

    <nav class="navbar navbar-light navbar-expand-md float-none navigation-clean" style="background: rgba(0,0,0,0.66);padding: 0;">
        <div class="container-fluid">
            <a href="index.php"><img src="assets/img/GENERAL/Logo.png" class = "logo"></a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                <i class="icon ion-android-menu" style="color: rgb(55,54,54);font-size: 35px;"></i>
                <span class="sr-only" style="opacity: 1;">Toggle navigation</span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto" style="text-align: center;">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="combos.php">Combos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nuestras_delicias.php">Nuestras Delicias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="galeria.php">Galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--------------------------IMAGEN PRINCIPAL-------------------------->

    <div class="row" style="margin-right: 0px;margin-left: 0px;">
        <div class="col" style="padding-right: 0;padding-left: 0;">
            <div class="d-flex justify-content-center align-items-center imagen">
                <h1 class="text-center texto-principal">Pizza Party<br>Servicios de Catering para Eventos</h1>
            </div>
        </div>
    </div>

    <?php
        //Modificador admin
        if (!empty($_SESSION['contraseña_admin'])){
    ?>
        <div class="espacio-admin" style="margin-top:80px;margin-bottom:20px;">
            <a href="administracion.php#imagenes" class="modificador-admin">Modificar Imagenes</a>
        </div>
    <?php
        }
    ?>

    <!--------------------------CONTENIDO DE LA SECCION-------------------------->
    
    <div class="row" style="margin-left: 0px;margin-right: 0px;">
        <div class="col text-center" style="padding-right: 0;padding-left: 0;">
            <h1 class="text-center d-inline-block titulo">Galería</h1>
            <section id="galeria" class="columnas4">
                <?php //PHP IMAGENES
                    $query = "SELECT * FROM imagenes where seccion_imagen = 'Famosos' or seccion_imagen = 'Produccion' or seccion_imagen = 'Eventos' order by seccion_imagen";
                    $envio = $conexion->query($query);
                    while($row=$envio->fetch_assoc()){
                ?>
                <article>
                    <a target="_blank" data-lightbox="photos" href="<?php echo $row['URL_imagen'];?>">
                        <img src="<?php echo $row['URL_imagen'];?>" />
                    </a>
                </article>
                <?php } ?>
            </section>
        </div>
    </div>
    
    <!--------------------------FOOTER-------------------------->

    <footer class="row" style="margin-right: 0px;margin-left: 0px;">
        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 d-flex justify-content-center align-items-center flex-column">
            <div class="d-flex justify-content-center align-items-center flex-wrap titulo-footer">
                <img src="assets/img/GENERAL/Logo.png" class="logo">
                <h3>A&L Eventos</h3>
            </div>    
            <div class="redes">
                <a href="https://www.instagram.com/ayl_eventospizzaparty/?hl=es" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://www.facebook.com/tortasmesadulce.dulcestilo" target="_blank"><i class="fa fa-facebook-square"></i></a>
                <a href="https://fiesta.mercadolibre.com.ar/MLA-866455332-pizza-party-prepizzas-servicio-de-lunch-_JM" target="_blank">
                    <img src="assets/img/GENERAL/logomercadolibre.png">
                </a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 d-flex justify-content-center align-items-center flex-column">
            <div class="texto-footer">
                <h5>Contacto</h5>
                <p>A&L Eventos Pizza Party</p>
            </div>
            <div class="datos-footer">
                <h6>Teléfono Fijo: 2104-2116</h6>
                <h6>Celular: 11 5967-1739 (Rodrigo)</h6>
                <h6>Mail: agusro_mendez@hotmail.com</h6>
            </div>
            <ul>
                <li><i class="fa fa-chevron-right"></i><a href="index.php">Inicio</a></li>
                <li><i class="fa fa-chevron-right"></i><a href="combos.php">Combos</a></li>
                <li><i class="fa fa-chevron-right"></i><a href="nuestras_delicias.php">Nuestras Delicias</a></li>
                <li><i class="fa fa-chevron-right"></i><a href="galeria.php">Galeria</a></li>
                <li><i class="fa fa-chevron-right"></i><a href="contacto.php">Contacto</a></li>
            </ul>
        </div>
    </footer>
    
    <!--------------------------Scripts JS-------------------------->
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

</body>

</html>

