<?php

require "mail.php";

$status = "";

function validateForm($name, $email, $subject, $message){    
    return !empty(trim($name)) && !empty(trim($email)) &&
     !empty(trim($subject)) && !empty(trim($message));
  }


    if (isset($_POST["form"])) {
        if (validateForm($_POST["name"], $_POST["email"], $_POST["subject"],
        $_POST["message"] )) {
            
            // Sanitizando los datos

            $name = htmlentities($_POST['name']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $subject = htmlentities($_POST['subject']);
            $message = htmlentities($_POST['message']);

            $body = "$name <$email> te envia el siguiente mensaje: <br><br>
            $message";

            // Mandar el correo
            sendMail($subject, $body, $email, $name, true);

            $status = "success";
        } else {
            $status = "warning";
        }
        
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Formulario de Contacto</title>
</head>
<body>  

    <?php if($status == "warning"): ?>
    <div class="alert-warning">
        <span>Surgió un problema</span>
    </div>
    <?php endif; ?>

    <?php if($status == "success") :  ?>
    <div class="alert-success">
        <span>Mensaje enviado exitósamente</span>
    </div>
    <?php endif; ?>

        <section class="container">
                <h2>Contáctanos</h2>
                <div class="contact_container">
                <div class="box">
                    <form action="./index.php" method="POST" class="form">
                        <div class="contact_options">
                            <div class="inputBox">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="inputBox">
                                <label for="email">Correo:</label>
                                <input type="email" name="email" id="email">
                            </div>
                            <div class="inputBox">
                                <label for="subject">Asunto:</label>
                                <input type="text" name="subject" id="subject">
                            </div>
                            <div class="inputBox">
                                <label for="message">Mensaje:</label>
                                <textarea name="message" id="message" rows="7">
                    
                                </textarea>
                            </div>
                    
                            
                        </div>
                        <div class="boton-container">
                            <button type="submit" name="form" class="btn-primary1">Enviar</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </section>

        <div class="contact-info">
            <div class="info">
                <span>
                    <i class="fa-solid fa-location-dot"></i>
                    Avenida always alive, California 
                </span>
            </div>
            <div class="infa">
                <span>
                    <i class="fa-solid fa-phone"></i>
                    +1 544 3665412 
                </span>
            </div>
        </div>

        <script src="https://kit.fontawesome.com/1ea585efc3.js" 
        crossorigin="anonymous"></script>
</body>
</html>
