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
        if (empty($_SESSION['contraseña_admin'])){
    ?>
        <div style="display:flex;justify-content:center;">
            <div class="caja-mensaje">
                <h1 class="titulo-admin">No estas autorizado a ver esta seccion</h1>
                <a href='admin.php'>Iniciar Sesion de Administrador</a>
                <br><br>
                <a href='index.php'>Volver al sitio</a>
            </div>
        </div>
    <?php
        }
        else{
    ?>

    <!--------------------------HEADER-------------------------->

    <div class="header-admin">
        <div>
            <h1 class="titulo-admin">Modo Administrador</h1>
            <h4 class="titulo-admin" >Seccion de Administración</h4>
        </div>
        <a href='index.php'>Volver al sitio</a>
        <a href='cerrar_sesion.php'>Cerrar Sesion de Administrador</a>
    </div>
    
    <!--------------------------CONTENIDO-------------------------->
    
    <div class="row d-flex justify-content-center" style="margin: 0;">

        <!--------------------------NOTICIAS-------------------------->

        <div class="col-9" style="background:rgb(255,255,255); margin-top:30px">
            <h1 style="text-align:center; padding:15px" id="noticias">Noticias</h1>
            
            <!-- Nuevo Registro -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nueva_noticia" style="margin-left:30px;">Nueva Noticia</button>
            <!-- Modal -->
            <div class="modal fade" id="nueva_noticia" role="dialog">
                <div class="modal-dialog">
                    <!-- Contenido Modal -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nueva Noticia</h4>
                        </div>
                        <div class="modal-body">
                            <form action="nuevoRegistro.php?seccion=noticias" method="POST" enctype="multipart/form-data">
                            <div class="alert alert-warning" role="alert">
                                NOTA: La nueva imagen se insertará sin descripción. Para agregarle una descripción deberás darle al botón "Editar"
                            </div>
                                <h5>Subir Imagen</h5>
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input class="form-control" type="file" name="imagen" placeholder="Ingrese la imagen" required="">
                                </div>
                                <!-- Footer Modal -->
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="subir" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            
            <!-- TABLA Registros -->
            <div class="table-responsive table-bordered" style="margin-top: 24px;border:none">
                <table class="table table-bordered" style="width:100%;">
                    <thead style="background: #41b5e7;text-shadow: 1px 1px 1px rgb(142,141,141);font-size: 16px;">
                        <tr>
                            <th>ID</th>
                            <th>URL</th>
                            <th>Descripcion</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody style="background: #cbcbcb;font-size: 14px;">
                        <?php //PHP SELECTS
                            $query = "SELECT * FROM imagenes WHERE seccion_imagen='Noticias'";
                            $envio = $conexion->query($query);
                            while($row=$envio->fetch_assoc()){
                            
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['URL_imagen']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td style="width:1px">
                                <a href="modificar.php?seccion=noticias&id=<?php echo $row['id'] ?>"><button class="btn btn-primary" type="submit">Editar</button></a>
                            </td>
                            <td style="width:1px">
                                <a href="eliminarRegistro.php?seccion=noticias&id=<?php echo $row['id'] ?>">
                                    <i class="fa fa-trash btn" style="color:red; font-size:28px;padding:0px"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!--------------------------COMBOS-------------------------->

        <div class="col-9" style="background:rgb(255,255,255); margin-top:30px">
            <h1 style="text-align:center; padding:15px" id="combos">Combos</h1>
            
            <!-- Nuevo Registro -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevo_combo" style="margin-left:30px;">Nuevo combo</button>
            <!-- Modal -->
            <div class="modal fade" id="nuevo_combo" role="dialog">
                <div class="modal-dialog">
                    <!-- Contenido Modal -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nuevo combo</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="nuevoRegistro.php?seccion=combos">
                                <div class="form-group">
                                    <label>Cantidad de Variedades</label>
                                    <input class="form-control" type="number" name="cantVariedades" placeholder="Ingrese la cantidad de variedades" required="">
                                </div>
                                <div class="form-group">
                                    <label>Cantidad de Entradas</label>
                                    <input class="form-control" type="number" name="cantEntradas" placeholder="Ingrese la cantidad de entradas" required="">
                                </div>
                                <div class="form-group">
                                    <label>Cantidad de Entradas Especiales</label>
                                    <input class="form-control" type="number" name="cantEntradasEspeciales" placeholder="Ingrese la cantidad de entradas especiales" required="">
                                </div>
                                <!-- Footer Modal -->
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            
            <!-- TABLA Registros -->
            <div class="table-responsive table-bordered" style="margin-top: 24px;border:none">
                <table class="table table-bordered" style="width:100%;">
                    <thead style="background: #41b5e7;text-shadow: 1px 1px 1px rgb(142,141,141);font-size: 16px;">
                        <tr>
                            <th>ID</th>
                            <th>Cantidad de Variedades</th>
                            <th>Cantidad de Entradas</th>
                            <th>Cantidad de Entradas Especiales</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody style="background: #cbcbcb;font-size: 14px;">
                        <?php //PHP SELECTS
                            $query = "SELECT * FROM combos";
                            $envio = $conexion->query($query);
                            while($row=$envio->fetch_assoc()){
                            
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['cantVariedades']; ?></td>
                            <td><?php echo $row['cantEntradas']; ?></td>
                            <td><?php echo $row['cantEntradasEspeciales']; ?></td>
                            <td style="width:1px">
                                <a href="modificar.php?seccion=combos&id=<?php echo $row['id'] ?>"><button class="btn btn-primary" type="submit">Editar</button></a>
                            </td>
                            <td style="width:1px">
                                <a href="eliminarRegistro.php?seccion=combos&id=<?php echo $row['id'] ?>">
                                    <i class="fa fa-trash btn" style="color:red; font-size:28px;padding:0px"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--------------------------VARIEDADES-------------------------->

        <div class="col-9" style="background:rgb(255,255,255); margin-top:30px">
            <h1 style="text-align:center; padding:15px" id="variedades">Variedades</h1>
            
            <!-- Nuevo Registro -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nueva_variedad" style="margin-left:30px;">Nueva variedad</button>
            <!-- Modal -->
            <div class="modal fade" id="nueva_variedad" role="dialog">
                <div class="modal-dialog">
                    <!-- Contenido Modal -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nueva variedad</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="nuevoRegistro.php?seccion=variedades">
                                <div class="form-group">
                                    <label>Variedad</label>
                                    <input class="form-control" type="text" name="variedad" placeholder="Ingrese la nueva variedad" required="">
                                </div>
                                <!-- Footer Modal -->
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            
            <div class="table-responsive table-bordered" style="margin-top: 24px;border:none">
                <table class="table table-bordered" style="width:100%;">
                    <thead style="background: #41b5e7;text-shadow: 1px 1px 1px rgb(142,141,141);font-size: 16px;">
                        <tr>
                            <th>ID</th>
                            <th>Variedad</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody style="background: #cbcbcb;font-size: 14px;">
                        <?php //PHP SELECTS
                            $query = "SELECT * FROM variedades";
                            $envio = $conexion->query($query);
                            while($row=$envio->fetch_assoc()){
                            
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['variedad']; ?></td>
                            <td style="width:1px">
                                <a href="modificar.php?seccion=variedades&id=<?php echo $row['id'] ?>"><button class="btn btn-primary" type="submit">Editar</button></a>
                            </td>
                            <td style="width:1px">
                                <a href="eliminarRegistro.php?seccion=variedades&id=<?php echo $row['id'] ?>">
                                    <i class="fa fa-trash btn" style="color:red; font-size:28px;padding:0px"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <!--------------------VARIEDADES EXTRA----------------------->

            <h1 style="text-align:center; padding:15px">Variedades Extra</h1>
            
            <!-- Nuevo Registro -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nueva_variedadextra" style="margin-left:30px;">Nueva variedad extra</button>
            <!-- Modal -->
            <div class="modal fade" id="nueva_variedadextra" role="dialog">
                <div class="modal-dialog">
                    <!-- Contenido Modal -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nueva variedad extra</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="nuevoRegistro.php?seccion=variedadesextra">
                                <div class="form-group">
                                    <label>Variedad</label>
                                    <input class="form-control" type="text" name="variedadextra" placeholder="Ingrese la nueva variedad extra" required="">
                                </div>
                                <!-- Footer Modal -->
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            
            <div class="table-responsive table-bordered" style="margin-top: 24px;border:none">
                <table class="table table-bordered" style="width:100%;">
                    <thead style="background: #41b5e7;text-shadow: 1px 1px 1px rgb(142,141,141);font-size: 16px;">
                        <tr>
                            <th>ID</th>
                            <th>Variedad extra</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody style="background: #cbcbcb;font-size: 14px;">
                        <?php //PHP SELECTS
                            $query = "SELECT * FROM variedadesextra";
                            $envio = $conexion->query($query);
                            while($row=$envio->fetch_assoc()){
                            
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['variedadextra']; ?></td>
                            <td style="width:1px">
                                <a href="modificar.php?seccion=variedadesextra&id=<?php echo $row['id'] ?>"><button class="btn btn-primary" type="submit">Editar</button></a>
                            </td>
                            <td style="width:1px">
                                <a href="eliminarRegistro.php?seccion=variedadesextra&id=<?php echo $row['id'] ?>">
                                    <i class="fa fa-trash btn" style="color:red; font-size:28px;padding:0px"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        

        <!--------------------------ENTRADAS-------------------------->

        <div class="col-9" style="background:rgb(255,255,255); margin-top:30px">
            <h1 style="text-align:center; padding:15px" id="entradas">Entradas</h1>
            
            <!-- Nuevo Registro -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nueva_entrada" style="margin-left:30px;">Nueva entrada</button>
            <!-- Modal -->
            <div class="modal fade" id="nueva_entrada" role="dialog">
                <div class="modal-dialog">
                    <!-- Contenido Modal -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nueva entrada</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="nuevoRegistro.php?seccion=entradas">
                                <div class="form-group">
                                    <label>Entrada</label>
                                    <input class="form-control" type="text" name="entrada" placeholder="Ingrese la nueva entrada" required="">
                                </div>
                                <!-- Footer Modal -->
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            
            <div class="table-responsive table-bordered" style="margin-top: 24px;border:none">
                <table class="table table-bordered" style="width:100%;">
                    <thead style="background: #41b5e7;text-shadow: 1px 1px 1px rgb(142,141,141);font-size: 16px;">
                        <tr>
                            <th>ID</th>
                            <th>Entrada</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody style="background: #cbcbcb;font-size: 14px;">
                        <?php //PHP SELECTS
                            $query = "SELECT * FROM entradas";
                            $envio = $conexion->query($query);
                            while($row=$envio->fetch_assoc()){
                            
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['entrada']; ?></td>
                            <td style="width:1px">
                                <a href="modificar.php?seccion=entradas&id=<?php echo $row['id'] ?>"><button class="btn btn-primary" type="submit">Editar</button></a>
                            </td>
                            <td style="width:1px">
                                <a href="eliminarRegistro.php?seccion=entradas&id=<?php echo $row['id'] ?>">
                                    <i class="fa fa-trash btn" style="color:red; font-size:28px;padding:0px"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--------------------------ENTRADAS ESPECIALES-------------------------->

        <div class="col-9" style="background:rgb(255,255,255); margin-top:30px">
            <h1 style="text-align:center; padding:15px" id="entradasespeciales">Entradas Especiales</h1>
            
            <!-- Nuevo Registro -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nueva_entradaespecial" style="margin-left:30px;">Nueva entrada especial</button>
            <!-- Modal -->
            <div class="modal fade" id="nueva_entradaespecial" role="dialog">
                <div class="modal-dialog">
                    <!-- Contenido Modal -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nueva entrada especial</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="nuevoRegistro.php?seccion=entradasespeciales">
                                <div class="form-group">
                                    <label>Entrada</label>
                                    <input class="form-control" type="text" name="entradaEspecial" placeholder="Ingrese la nueva entrada especial" required="">
                                </div>
                                <!-- Footer Modal -->
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            
            <div class="table-responsive table-bordered" style="margin-top: 24px;border:none">
                <table class="table table-bordered" style="width:100%;">
                    <thead style="background: #41b5e7;text-shadow: 1px 1px 1px rgb(142,141,141);font-size: 16px;">
                        <tr>
                            <th>ID</th>
                            <th>Entrada especial</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody style="background: #cbcbcb;font-size: 14px;">
                        <?php //PHP SELECTS
                            $query = "SELECT * FROM entradasespeciales";
                            $envio = $conexion->query($query);
                            while($row=$envio->fetch_assoc()){
                            
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['entradaEspecial']; ?></td>
                            <td style="width:1px">
                                <a href="modificar.php?seccion=entradasespeciales&id=<?php echo $row['id'] ?>"><button class="btn btn-primary" type="submit">Editar</button></a>
                            </td>
                            <td style="width:1px">
                                <a href="eliminarRegistro.php?seccion=entradasespeciales&id=<?php echo $row['id'] ?>">
                                    <i class="fa fa-trash btn" style="color:red; font-size:28px;padding:0px"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--------------------------IMAGENES NUESTRAS DELICIAS-------------------------->

        <div class="col-9" style="background:rgb(255,255,255); margin-top:30px">
            <h1 style="text-align:center; padding:15px" id="imagen_nuestrasdelicias">Imágenes Nuestras Delicias</h1>
            
            <!-- Nuevo Registro -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nueva_imagennuestrasdelicias" style="margin-left:30px;">Nueva imagen</button>
            <!-- Modal -->
            <div class="modal fade" id="nueva_imagennuestrasdelicias" role="dialog">
                <div class="modal-dialog">
                    <!-- Contenido Modal -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nueva Imagen</h4>
                        </div>
                        <div class="modal-body">
                        <form action="nuevoRegistro.php?seccion=imagenes_nuestrasdelicias" method="POST" enctype="multipart/form-data">
                            <div class="alert alert-warning" role="alert">
                                NOTA: Luego de dar click en "Guardar" serás redirigido a otra página en donde deberás colocar el nombre del archivo cargado y
                                la sección que le corresponda.
                            </div>
                            <h5>Subir Imagen</h5>
                            <div class="form-group">
                                <label>Imagen</label>
                                <input class="form-control" type="file" name="imagen" placeholder="Ingrese la imagen" required="">
                            </div>
                            <!-- Footer Modal -->
                            <div class="modal-footer">
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="subir" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>  
                </div>
            </div>
            
            <div class="table-responsive table-bordered" style="margin-top: 24px;border:none">
                <table class="table table-bordered" style="width:100%;">
                    <thead style="background: #41b5e7;text-shadow: 1px 1px 1px rgb(142,141,141);font-size: 16px;">
                        <tr>
                            <th>ID</th>
                            <th>Sección Imagen</th>
                            <th>URL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody style="background: #cbcbcb;font-size: 14px;">
                        <?php //PHP SELECTS
                            $query = "SELECT * FROM imagenes WHERE seccion_imagen = 'Variedades' or seccion_imagen = 'Entradas' or seccion_imagen = 'EntradasEspeciales' ORDER BY seccion_imagen DESC";
                            $envio = $conexion->query($query);
                            while($row=$envio->fetch_assoc()){
                            
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['seccion_imagen']; ?></td>
                            <td><?php echo $row['URL_imagen']; ?></td>
                            <td style="width:1px">
                                <a href="eliminarRegistro.php?seccion=imagen_nuestrasdelicias&id=<?php echo $row['id'] ?>">
                                    <i class="fa fa-trash btn" style="color:red; font-size:28px;padding:0px"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--------------------------IMAGENES GALERIA-------------------------->

        <div class="col-9" style="background:rgb(255,255,255); margin-top:30px">
            <h1 style="text-align:center; padding:15px" id="imagenes">Imágenes Galería</h1>
            
            <!-- Nuevo Registro -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#imagenesgeneral" style="margin-left:30px;">Nueva Imagen</button>
            <!-- Modal -->
            <div class="modal fade" id="imagenesgeneral" role="dialog">
                <div class="modal-dialog">
                    <!-- Contenido Modal -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nueva Imagen</h4>
                        </div>
                        <div class="modal-body">
                            <form action="nuevoRegistro.php?seccion=imagenes" method="POST" enctype="multipart/form-data">
                                <div class="alert alert-warning" role="alert">
                                    NOTA: Luego de dar click en "Guardar" serás redirigido a otra página en donde deberás colocar el nombre del archivo cargado y
                                    la sección que le corresponda.
                                </div>
                                <h5>Subir Imagen</h5>
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input class="form-control" type="file" name="imagen" placeholder="Ingrese la imagen" required="">
                                </div>
                                <!-- Footer Modal -->
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="subir" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            
            <!-- TABLA Registros -->
            <div class="table-responsive table-bordered" style="margin-top: 24px;border:none">
                <table class="table table-bordered" style="width:100%;">
                    <thead style="background: #41b5e7;text-shadow: 1px 1px 1px rgb(142,141,141);font-size: 16px;">
                        <tr>
                            <th>ID</th>
                            <th>Sección Imagen</th>
                            <th>URL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody style="background: #cbcbcb;font-size: 14px;">
                        <?php //PHP SELECTS
                            $query = "SELECT * FROM imagenes WHERE seccion_imagen = 'Produccion' or seccion_imagen = 'Eventos' or seccion_imagen = 'Famosos' ORDER BY seccion_imagen";
                            $envio = $conexion->query($query);
                            while($row=$envio->fetch_assoc()){
                            
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['seccion_imagen']; ?></td>
                            <td><?php echo $row['URL_imagen']; ?></td>
                            <td style="width:1px">
                                <a href="eliminarRegistro.php?seccion=imagenes&id=<?php echo $row['id'] ?>">
                                    <i class="fa fa-trash btn" style="color:red; font-size:28px;padding:0px"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!--------------------------Scripts JS-------------------------->

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    
    
    
</body>

</html>

<?php
    }
?>