<?php

    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $fecha_evento = $_POST['fecha_evento'];
        $localidad = $_POST['localidad'];
        $cant_personas = $_POST['cant_personas'];
        $comentario = $_POST['comentario'];

        $header = "From: noreply@example.com" . "\r\n";
        $header.= "Reply-To: noreply@example.com" . "\r\n";
        $header.= "X-Mailer: PHP/". phpversion();

        $asunto = "Evento de " . $nombre ;
        $mensaje = "En " . $localidad;
        $mail = @mail($email,$asunto,$mensaje,$header);
        if ($email) {
            echo "<h4>Mail enviado</h4>";
        }

    }

?>