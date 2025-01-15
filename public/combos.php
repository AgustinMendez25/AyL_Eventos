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
    
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/ionicons.min.css">
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

    <div class="row" style="margin-right: 0px;margin-left: 0px;">
        <div class="col" style="padding-right: 0;padding-left: 0;">
            <div class="text-center">
                <h1 class="text-center d-inline-block titulo">Combos</h1>
            </div>

            <!-------COMBOS-------->
            
            <div class="d-flex justify-content-around flex-wrap" style="margin: 8px;">
                <?php //PHP COMBOS
                    $query = "SELECT * FROM combos";
                    $envio = $conexion->query($query);
                    while($row=$envio->fetch_assoc()){
                    
                ?>
                <div class="combo">
                    <h4 class="text-center">Combo <?php echo $row['id']; ?></h4>
                    <ul>
                          <li>Variedades de Pizza: <?php echo $row['cantVariedades']; ?></li>
                        <?php if ($row['cantEntradas'] > 0){  ?>
                          <li>Entradas: <?php echo $row['cantEntradas']; ?></li>
                        <?php } else{ echo '<br>'; }
                        if ($row['cantEntradasEspeciales']){ ?>
                          <li>Entradas Especiales: <?php echo $row['cantEntradasEspeciales']; ?></li>
                        <?php } else{ echo '<br>'; } ?>
                    </ul>
                    <a href="contacto.php#form-contacto">
                        <h5 class="text-center">Consultar Precio</h5>
                    </a>
                </div>
                <?php } ?>
            </div>
            <?php
                //Modificador admin
                if (!empty($_SESSION['contraseña_admin'])){
            ?>
                <div class="espacio-admin">
                    <a href="administracion.php#combos" class="modificador-admin">Modificar Combos</a>
                </div>
            <?php
                }
            ?>
            <div class="d-flex justify-content-center">
                <div class="text-center d-flex justify-content-center flex-wrap cartel-combos">
                    <p>¿No te convence ninguno de nuestros combos?<br>Armá el tuyo y consulta el precio!!<br></p>
                    <a href="contacto.php#form-contacto" style="width: 60%;">
                        <h5 class="text-center">Consultar Precio</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="row text-center d-flex justify-content-center tarjeta-info-row tarjetas-combos">
            
            <!-------VARIEDADES-------->

            <div class="col-10 tarjeta-info-col">
                <div class="row" style="margin: 0;">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center">
                        <h4 class="text-center d-inline-block">Variedades</h4>
                        <ul class="list-unstyled">
                            <?php //PHP VARIEDADES
                                    $query = "SELECT variedad FROM variedades";
                                    $envio = $conexion->query($query);
                                    while($row=$envio->fetch_assoc()){
                        
                            ?>
                            <li><?php echo $row['variedad']; } ?><br></li>
                        </ul>
                        <h5 class="variedades-extra">Variedades extra<br>
                            <small class="form-text text-muted">Costo adicional</small>
                        </h5>
                        <ul class="list-unstyled">
                            <?php //PHP VARIEDADES EXTRAS
                                    $query = "SELECT variedadextra FROM variedadesextra";
                                    $envio = $conexion->query($query);
                                    while($row=$envio->fetch_assoc()){
                        
                            ?>
                            <li><?php echo $row['variedadextra']; } ?><br></li>
                        </ul>
                    </div>
                    <div class="col" style="padding: 20px;">
                        <div class="row" style="margin: 0;">
                            <div class="col-6 item">
                                <a data-lightbox="photos" href="/img/GENERAL/SeccionCombo/Variedad1.jpg">
                                    <img class="img-fluid" src="/img/GENERAL/SeccionCombo/Variedad1.jpg">
                                </a>
                            </div>
                            <div class="col-6 item">
                                <a data-lightbox="photos" href="/img/GENERAL/SeccionCombo/Variedad2.jpg">
                                    <img class="img-fluid" src="/img/GENERAL/SeccionCombo/Variedad2.jpg">
                                </a>
                            </div>
                            <div class="col-6 item">
                                <a data-lightbox="photos" href="/img/GENERAL/SeccionCombo/Variedad3.jpg">
                                    <img class="img-fluid" src="/img/GENERAL/SeccionCombo/Variedad3.jpg">
                                </a>
                            </div>
                            <div class="col-6 item">
                                <a data-lightbox="photos" href="/img/GENERAL/SeccionCombo/Variedad4.jpg">
                                    <img class="img-fluid" src="/img/GENERAL/SeccionCombo/Variedad4.jpg">
                                </a>
                            </div>
                        </div>
                        <a href="nuestras_delicias.php">
                            <h5>Más imágenes...</h5>
                        </a>
                    </div>
                </div>
                <?php
                    //Modificador admin
                    if (!empty($_SESSION['contraseña_admin'])){
                ?>
                    <a href="administracion.php#variedades" class="modificador-admin">Modificar Variedades/Entradas</a>
                <?php
                    }
                ?>
            </div>

            <!-------ENTRADAS-------->

            <div class="col-10 tarjeta-info-col">
                <div class="row" style="margin: 0;">
                    <div class="col" style="padding: 20px;">
                        <div class="row" style="margin: 0;">
                            <div class="col-6 item">
                                <a data-lightbox="photos" href="/img/GENERAL/SeccionCombo/Entrada1.jpg">
                                    <img class="img-fluid" src="/img/GENERAL/SeccionCombo/Entrada1.jpg">
                                </a>
                            </div>
                            <div class="col-6 item">
                                <a data-lightbox="photos" href="/img/GENERAL/SeccionCombo/Entrada2.jpg">
                                    <img class="img-fluid" src="/img/GENERAL/SeccionCombo/Entrada2.jpg">
                                </a>
                            </div>
                            <div class="col-6 item">
                                <a data-lightbox="photos" href="/img/GENERAL/SeccionCombo/Entrada3.jpg">
                                    <img class="img-fluid" src="/img/GENERAL/SeccionCombo/Entrada3.jpg">
                                </a>
                            </div>
                            <div class="col-6 item">
                                <a data-lightbox="photos" href="/img/GENERAL/SeccionCombo/Entrada4.jpg">
                                    <img class="img-fluid" src="/img/GENERAL/SeccionCombo/Entrada4.jpg">
                                </a>
                            </div>
                        </div>
                        <a href="nuestras_delicias.php">
                            <h5>Más imágenes...</h5>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center">
                        <h4 class="text-center d-inline-block">Entradas</h4>
                        <ul class="list-unstyled">
                            <?php //PHP ENTRADAS
                                    $query = "SELECT entrada FROM entradas";
                                    $envio = $conexion->query($query);
                                    while($row=$envio->fetch_assoc()){
                        
                            ?>
                            <li><?php echo $row['entrada']; } ?><br></li>
                        </ul>
                    </div>
                </div>
                <?php
                    //Modificador admin
                    if (!empty($_SESSION['contraseña_admin'])){
                ?>
                    <a href="administracion.php#entradas" class="modificador-admin">Modificar Variedades/Entradas</a>
                <?php
                    }
                ?>
            </div>

            <!-------ENTRADAS ESPECIALES-------->
            
            <div class="col-10 tarjeta-info-col">
                <div class="row" style="margin: 0;">
                    <div class="col text-center">
                        <h4 class="text-center d-inline-block">Entradas Especiales</h4>
                        <ul class="list-unstyled">
                            <?php //PHP ENTRADAS ESPECIALES
                                    $query = "SELECT entradaespecial FROM entradasespeciales";
                                    $envio = $conexion->query($query);
                                    while($row=$envio->fetch_assoc()){
                        
                            ?>
                            <li><?php echo $row['entradaespecial']; } ?><br></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="padding: 20px;">
                        <div class="row" style="margin: 0;">
                            <div class="col-6 item">
                                <a data-lightbox="photos" href="/img/GENERAL/SeccionCombo/EntradaEspecial1.jpg">
                                    <img class="img-fluid" src="/img/GENERAL/SeccionCombo/EntradaEspecial1.jpg">
                                </a>
                            </div>
                            <div class="col-6 item">
                                <a data-lightbox="photos" href="/img/GENERAL/SeccionCombo/EntradaEspecial2.jpg">
                                    <img class="img-fluid" src="/img/GENERAL/SeccionCombo/EntradaEspecial2.jpg">
                                </a>
                            </div>
                            <div class="col-6 item">
                                <a data-lightbox="photos" href="/img/GENERAL/SeccionCombo/EntradaEspecial3.jpg">
                                    <img class="img-fluid" src="/img/GENERAL/SeccionCombo/EntradaEspecial3.jpg">
                                </a>
                            </div>
                            <div class="col-6 item">
                                <a data-lightbox="photos" href="/img/GENERAL/SeccionCombo/EntradaEspecial4.jpg">
                                    <img class="img-fluid" src="/img/GENERAL/SeccionCombo/EntradaEspecial4.jpg">
                                </a>
                            </div>
                        </div>
                        <a href="nuestras_delicias.php">
                            <h5>Más imágenes...</h5>
                        </a>
                    </div>
                </div>
                <?php
                    //Modificador admin
                    if (!empty($_SESSION['contraseña_admin'])){
                ?>
                    <a href="administracion.php#entradasespeciales" class="modificador-admin">Modificar Variedades/Entradas</a>
                <?php
                    }
                ?>
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
                <a href="https://fiesta.mercadolibre.com.ar/MLA-866455332-pizza-party-prepizzas-servicio-de-lunch-_JM" target="_blank">
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