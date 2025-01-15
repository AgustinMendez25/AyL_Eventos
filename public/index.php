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
            <a href="index.php"><img src="/img/GENERAL/Logo.png" class = "logo"></a>
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

    <!--------------------------CONTENIDO DE LA SECCION-------------------------->

    <div class="row d-flex justify-content-center" style="margin-right: 0px;margin-left: 0px;">
        <div class="col-12 col-sm-11 col-md-11 col-lg-10 col-xl-10 text-center" style="padding-right: 0;padding-left: 0;">
            <h1 class="d-inline-block titulo">Noticias</h1>
            <div class="carousel slide" data-ride="carousel" data-interval="10000" id="carousel-1" style="box-shadow: 0px 0px;padding: 10px;">
                <div class="carousel-inner noticias-slider">
                    <?php //PHP IMAGENES NOTICIAS
                        $query = "SELECT * FROM imagenes where seccion_imagen = 'Noticias' and id = 1";
                        $envio = $conexion->query($query);
                        while($row=$envio->fetch_assoc()){
                    ?>
                    <div class="carousel-item active">
                        <img class="w-100 d-block" src="<?php echo substr($row['URL_imagen'],6);?>" alt="Slide Image" style="min-height: 200px;">
                        <p><?php echo $row['descripcion'];?></p>
                    </div>
                    <?php } ?>
                    <?php //PHP IMAGENES NOTICIAS
                        $query = "SELECT * FROM imagenes where seccion_imagen = 'Noticias' and id != 1";
                        $envio = $conexion->query($query);
                        while($row=$envio->fetch_assoc()){
                    ?>
                    <div class="carousel-item">
                        <img class="w-100 d-block" src="<?php echo substr($row['URL_imagen'],6);?>" alt="Slide Image" style="min-height: 200px;">
                        <p><?php echo $row['descripcion'];?></p>
                    </div>
                    <?php } ?>
                </div>
                <div>
                    <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span><span class="sr-only">Next</span>
                    </a>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <?php //PHP IMAGENES NOTICIAS ID
                        $query = "SELECT id, URL_imagen FROM imagenes where seccion_imagen = 'Noticias' and id != 1";
                        $envio = $conexion->query($query);
                        while($row=$envio->fetch_assoc()){
                    ?>
                    <li data-target="#carousel-1" data-slide-to="<?php echo $row['id']-1;?>"></li>
                    <?php } ?>
                </ol>
            </div>
            <?php
                //Modificador admin
                if (!empty($_SESSION['contraseña_admin'])){
            ?>
                <a href="administracion.php#noticias" class="modificador-admin">Modificar Imagenes de Noticias</a>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row text-center d-flex justify-content-center tarjeta-info-row">
        <div class="col-12">
            <h1 class="d-inline-block titulo">Nuestro Servicio<br></h1>
        </div>
        <div class="col-10 text-center tarjeta-info-col">
            <div class="row" style="margin: 0;">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center info-central">
                    <h4 class="text-center d-inline-block">Información</h4>
                    <ul>
                        <li>Llegamos 40min antes del horario dispuesto<br></li>
                        <li>Duración hasta 3hs<br></li>
                        <li>Cantidad mínima 25 adultos<br></li>
                        <li>Menores de 10 años abonan el 50%</li>
                        <li>Menores de 3 años sin cargo<br></li>
                        <li>Con la seña del 60% se reserva y congela el precio<br></li>
                        <li>Adicional por traslado dependiendo de la zona<br></li>
                    </ul>
                    <h4 class="text-center d-inline-block" style="font-size: 24px;padding:0;">¿Qué incluye?</h4>
                    <ul>
                        <li>Horno con Garrafa<br></li>
                        <li>Pizzero<br></li>
                        <li>Camareros<br></li>
                        <li>Platitos<br></li>
                        <li>Servilletas<br></li>
                    </ul>
                </div>
                <div class="col d-flex flex-column justify-content-center" style="padding: 20px;">
                    <img src="/img/GENERAL/Produccion16.jpg" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>

    <!--------------------------FOOTER-------------------------->
    
    <footer class="row" style="margin-right: 0px;margin-left: 0px;">
        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 d-flex justify-content-center align-items-center flex-column">
            <div class="d-flex justify-content-center align-items-center flex-wrap titulo-footer">
                <img src="/img/GENERAL/Logo.png" class="logo">
                <h3>A&L Eventos</h3>
            </div>    
            <div class="redes">
                <a href="https://www.instagram.com/ayl_eventospizzaparty/?hl=es" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://www.facebook.com/tortasmesadulce.dulcestilo" target="_blank"><i class="fa fa-facebook-square"></i></a>
                <a href="https://fiesta.mercadolibre.com.ar/MLA-1449014749-pizza-party-catering-lunch-ayl-eventos-_JM" target="_blank">
                    <img src="/img/GENERAL/logomercadolibre.png">
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

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    
</body>

</html>