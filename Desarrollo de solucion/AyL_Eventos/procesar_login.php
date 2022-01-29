<?php
    if (isset($_POST["contraseña_admin"])) {
        $contraseña = $_POST['contraseña_admin'];
        if ($contraseña == "12345"){
            session_start();
            $_SESSION['contraseña_admin'] = "admin";
            header("Location:index.php");
        }
        else{
            
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

<body style="background: url(&quot;assets/img/GENERAL/backgroundbody.jpg&quot;);background-size: auto;display:flex;justify-content:center;">

    <!--------------------------MENSAJE CONTRASEÑA INCORRECTA-------------------------->

    <div class="caja-mensaje">
        <h1 class="titulo-admin">Contraseña Incorrecta</h1>
        <a href='admin.php'>Volver a intentar</a>
    </div>

    <!--------------------------Scripts JS-------------------------->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    
</body>

<?php
        }
    }
?>