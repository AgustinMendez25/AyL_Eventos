
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
        <div class="caja-mensaje mod-admin">

<?php
    include ("conexion.php");
    
    $seccion = $_REQUEST['seccion'];
    $id = $_REQUEST['id'];

    switch ($seccion) {
        //-----------------------MODIFICAR NOTICIAS-----------------------------//
        case 'noticias':
            $query = "SELECT * FROM combos WHERE id=".$id;
            $envio = $conexion->query($query);
            $row=$envio->fetch_assoc();
            ?>

            <form method="post" action="realizarModificacion.php?seccion=noticias&id=<?php echo $id ?>">
                <h4 class="titulo-admin">Modificar Registro</h4>
                <div class="form-group">
                    <label>Descripcion</label>
                    <textarea class="form-control" name="descripcion" cols="30" rows="10" value="<?php $row['descripcion'] ?>" required=""></textarea>
                </div>
                <div class="form-group boton-admin">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>

            <?php
            break;

        //-----------------------MODIFICAR COMBOS-----------------------------//
        case 'combos':
            $query = "SELECT * FROM combos WHERE id=".$id;
            $envio = $conexion->query($query);
            $row=$envio->fetch_assoc();
            ?>

            <form method="post" action="realizarModificacion.php?seccion=combos&id=<?php echo $id ?>">
                <h4 class="titulo-admin">Modificar Registro</h4>
                <div class="form-group">
                    <label>Cantidad de Variedades</label>
                    <input class="form-control" type="number" name="cantVariedades" placeholder="Ingrese la cantidad de variedades" value="<?php echo $row['cantVariedades'] ?>" required="">
                </div>
                <div class="form-group">
                    <label>Cantidad de Entradas</label>
                    <input class="form-control" type="number" name="cantEntradas" placeholder="Ingrese la cantidad de entradas" value="<?php echo $row['cantEntradas'] ?>" required="">
                </div>
                <div class="form-group">
                    <label>Cantidad de Entradas Especiales</label>
                    <input class="form-control" type="number" name="cantEntradasEspeciales" placeholder="Ingrese la cantidad de entradas especiales" value="<?php echo $row['cantEntradasEspeciales'] ?>" required="">
                </div>
                <div class="form-group boton-admin">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>

            <?php
            break;

        //-----------------------MODIFICAR VARIEDADES-----------------------------//
        case 'variedades':
            $query = "SELECT * FROM variedades WHERE id=".$id;
            $envio = $conexion->query($query);
            $row=$envio->fetch_assoc();
            ?>

            <form method="post" action="realizarModificacion.php?seccion=variedades&id=<?php echo $id ?>">
                <h4 class="titulo-admin">Modificar Registro</h4>
                <div class="form-group">
                    <label>Variedad</label>
                    <input class="form-control" type="text" name="variedad" placeholder="Ingrese la nueva variedad" value="<?php echo $row['variedad'] ?>" required="">
                </div>
                <div class="form-group boton-admin">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>

            <?php
            break;

        //-----------------------MODIFICAR VARIEDADES EXTRA-----------------------------//
        case 'variedadesextra':
            $query = "SELECT * FROM variedadesextra WHERE id=".$id;
            $envio = $conexion->query($query);
            $row=$envio->fetch_assoc();
            ?>

            <form method="post" action="realizarModificacion.php?seccion=variedadesextra&id=<?php echo $id ?>">
                <h4 class="titulo-admin">Modificar Registro</h4>
                <div class="form-group">
                    <label>Variedad</label>
                    <input class="form-control" type="text" name="variedadextra" placeholder="Ingrese la nueva variedad extra" value="<?php echo $row['variedadextra'] ?>" required="">
                </div>
                <div class="form-group boton-admin">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>

            <?php
            break;
        
        //-----------------------MODIFICAR ENTRADAS-----------------------------//
        case 'entradas':
            $query = "SELECT * FROM entradas WHERE id=".$id;
            $envio = $conexion->query($query);
            $row=$envio->fetch_assoc();
            ?>

            <form method="post" action="realizarModificacion.php?seccion=entradas&id=<?php echo $id ?>">
                <h4 class="titulo-admin">Modificar Registro</h4>
                <div class="form-group">
                    <label>Entrada</label>
                    <input class="form-control" type="text" name="entrada" placeholder="Ingrese la nueva entrada" value="<?php echo $row['entrada'] ?>" required="">
                </div>
                <div class="form-group boton-admin">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>

            <?php
            break;
        
        //-----------------------MODIFICAR ENTRADAS ESPECIALES-----------------------------//
        case 'entradasespeciales':
            $query = "SELECT * FROM entradasespeciales WHERE id=".$id;
            $envio = $conexion->query($query);
            $row=$envio->fetch_assoc();
            ?>

            <form method="post" action="realizarModificacion.php?seccion=entradasespeciales&id=<?php echo $id ?>">
                <h4 class="titulo-admin">Modificar Registro</h4>
                <div class="form-group">
                    <label>Entrada</label>
                    <input class="form-control" type="text" name="entradaEspecial" placeholder="Ingrese la nueva entrada especial" value="<?php echo $row['entradaEspecial'] ?>" required="">
                </div>
                <div class="form-group boton-admin">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>

            <?php
            break;

        //-----------------------MODIFICAR IMAGENES NUESTRAS DELICIAS-----------------------------//
        case 'imagen_nuestrasdelicias':
            $query = "SELECT * FROM combos WHERE id=".$id;
            $envio = $conexion->query($query);
            $row=$envio->fetch_assoc();
            ?>

            <form method="post" action="realizarModificacion.php?seccion=imagen_nuestrasdelicias&id=<?php echo $id ?>">
                <h4 class="titulo-admin">Información Registro</h4>
                <div class="alert alert-warning" role="alert">
                    ¡IMPORTANTE! <br> Por favor compruebe que el siguiente campo coincida textualmente <br> con el nombre del archivo (incluya la extensión .jpg/.png/etc.)
                </div>
                <div class="form-group">
                    <label>Nombre del archivo</label>
                    <input class="form-control" type="text" name="nombre_archivo" placeholder="Ingrese el nombre del archivo" required="">
                </div>
                <div class="form-group">
                    <label>Sección imagen</label>
                    <select class="form-control" name="seccion_imagen">
                        <option value="Variedades">Variedades</option>
                        <option value="Entradas">Entradas</option>
                        <option value="EntradasEspeciales">Entradas Especiales</option>
                    </select>
                </div>
                <div class="form-group boton-admin">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>

            <?php
            break;

        //-----------------------MODIFICAR IMAGENES GALERIA-----------------------------//
        case 'imagenes':
            $query = "SELECT * FROM combos WHERE id=".$id;
            $envio = $conexion->query($query);
            $row=$envio->fetch_assoc();
            ?>

            <form method="post" action="realizarModificacion.php?seccion=imagenes&id=<?php echo $id ?>">
                <h4 class="titulo-admin">Información Registro</h4>
                <div class="alert alert-warning" role="alert">
                    ¡IMPORTANTE! <br> Por favor compruebe que el siguiente campo coincida textualmente <br> con el nombre del archivo (incluya la extensión .jpg/.png/etc.)
                </div>
                <div class="form-group">
                    <label>Nombre del archivo</label>
                    <input class="form-control" type="text" name="nombre_archivo" placeholder="Ingrese el nombre del archivo" required="">
                </div>
                <div class="form-group">
                    <label>Sección imagen</label>
                    <select class="form-control" name="seccion_imagen">
                        <option value="Produccion">Produccion</option>
                        <option value="Eventos">Eventos</option>
                        <option value="Famosos">Famosos</option>
                    </select>
                </div>
                <div class="form-group boton-admin">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>

            <?php
            break;
    }
?>

        </div>
    </div>
</body>