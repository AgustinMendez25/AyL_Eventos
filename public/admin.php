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
    
    <!--------------------VERIFICACION POR SI YA INICIO SESION---------------------->    

    <?php
        if (!empty($_SESSION['contraseña_admin'])){
    ?>
    
    <div style="display:flex;justify-content:center;">
        <div class="caja-mensaje">
            <h1 class="titulo-admin">Ya has iniciado sesion</h1>
            <a href='index.php'>Volver al sitio</a>
            <br><br>
            <a href='cerrar_sesion.php'>Cerrar Sesion de Administrador</a>
        </div>
    </div>

    <?php
        }
        else{
    ?>
    
    <!--------------------------INICIO ADMIN-------------------------->

    <div class="row d-flex justify-content-center" style="margin-right: 0;margin-left: 0;">
        <div class="col-sm-10 col-md-9 col-lg-6">
            <form method="post" class="caja-inicio-sesion" action="procesar_login.php">
                <h2 class="text-center">Administración</h2>
                <div class="form-group" style="margin: 30px 0px;">
                    <label>
                        Ingrese la contraseña de administración para acceder a la configuración de la página
                    </label>
                    <input class="form-control" type="password" name="contraseña_admin" placeholder="Contraseña" required="">
                </div>
                <div class="form-group text-center">
                    <button class="btn" type="submit">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
    
    <!--------------------------Scripts JS-------------------------->

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    
</body>

<?php
    }
?>