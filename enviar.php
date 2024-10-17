<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Configuración del correo
    $to = "jnandroask9@gmail.com"; // Cambia esto a tu correo real
    $subject = "Nuevo mensaje de contacto de Pizzería Venecia";
    $body = "Nombre: $name\n";
    $body .= "Teléfono: $phone\n";
    $body .= "Email: $email\n";
    $body .= "Mensaje: $message\n";
    
    $headers = "From: $email";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>
                alert('Mensaje enviado correctamente.');
                window.location.href = 'redes-sociales.html';
              </script>";
    } else {
        echo "<script>
                alert('Error al enviar el mensaje. Por favor, intenta de nuevo.');
                window.location.href = 'redes-sociales.html';
              </script>";
    }
} else {
    echo "Método no permitido.";
}
?>