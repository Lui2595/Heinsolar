<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contacto@heinsolar.com.mx';
  
  if (isset( $_POST['name'],$_POST['email'],$_POST['subject'],$_POST['message'])){
    
  
    $to = $receiving_email_address;
    $from_name = $_POST['name'];
    $from_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message= " Hola soy $from_name y este es mi mensaje: \n".$_POST['message']; 
    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    $cabeceras .= "To: Heinsolar <$to>" . "\r\n";
    $cabeceras .= "From: $from_name <$from_email>" . "\r\n";


  mail($to, $subject, $message, $cabeceras);

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials


  }
?>
