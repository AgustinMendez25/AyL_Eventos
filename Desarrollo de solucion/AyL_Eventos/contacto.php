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
        <div class="col img-principal-col" style="padding-right: 0;padding-left: 0;">
            <div class="d-flex justify-content-center align-items-center imagen">
                <h1 class="text-center texto-principal">Pizza Party<br>Servicios de Catering para Eventos</h1>
            </div>
        </div>
    </div>

    <!--------------------------CONTENIDO DE LA SECCION-------------------------->

    <div class="row" style="margin-left: 0px;margin-right: 0px;">
        <div class="col" style="padding-right: 0;padding-left: 0;">
            <div class="text-center">
                <h1 class="d-inline-block titulo">Contacto</h1>
            </div>
            <div class="bloque-info datos-contacto">
                <h5>Datos de Contacto</h5>
                <p class="text-break">
                    Teléfono Fijo: 2104-2116
                    <br><br>
                    Celular: 11 5967-1739 (Rodrigo)
                    <br><br>
                    Mail: agusro_mendez@hotmail.com
                </p>
            </div>
            
            <div class="text-center">
                <iframe allowfullscreen="" frameborder="0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDQZji8IVjV4Ac_xLkdONNouJjo6apL5yw&amp;q=Caseros%2C+Buenos+Aires&amp;zoom=12"
                    width="100%" height="400" style="margin: 20px;width: 75%;">
                </iframe>
            </div>
            
            <div class="bloque-info formulario-contacto" id="form-contacto">
                <form method="post" style="margin-right: 3%;margin-left: 3%;">
                    <h5 class="text-center">Formulario de Consultas</h5>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="nombre" placeholder="Ingrese su nombre" required="">
                    </div>
                    <div class="form-group">
                        <label>Celular</label>
                        <input class="form-control" type="tel" name="celular" placeholder="Ingrese su número de teléfono" required="">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" placeholder="Ingrese su email" name="email" required="">
                    </div>
                    <div class="form-group">
                        <label>Fecha</label>
                        <input class="form-control" type="date" name="fecha_evento" min="2021-08-01" max="2023-01-01" required="">
                    </div>
                    <div class="form-group">
                        <label>Localidad</label>
                        <input class="form-control" type="text" name="localidad" placeholder="Ingrese la localidad del evento" required="">
                    </div>
                    <div class="form-group">
                        <label>Cantidad de Personas Aproximada</label>
                        <small class="form-text" style="color: rgb(72,73,74);margin-top: 0;">Recuerde que el mínimo son 25 adultos</small>
                        <input class="form-control" type="text" name="cant_personas" placeholder="Ingrese la cantidad de personas" required="">
                    </div>
                    <div class="form-group">
                        <label>Comentarios</label>
                        <textarea class="form-control" name="comentario" placeholder="Comentarios" rows="14" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark" type="submit" name="enviar">Enviar</button>
                    </div>
                </form>
                <div class="text-center d-flex justify-content-center">
                    <?php include("enviar_correo.php"); ?>
                </div>
            </div>
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