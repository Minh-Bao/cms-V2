<?php

$nom = $_POST["nom"];
$from = $_POST["email"];
$sujet = $_POST["sujet"];
$message = $_POST["message"];

     $subject = 'Contact de la part de '.$from ." ".$sujet;
     $headers = 'From: '.$from.'' . "\r\n" .
     'To : contact@naturelcoquin.com' . "\r\n" .
     'Reply-To: '.$from.'' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

     mail($to, utf8_decode($subject), utf8_decode($message), $headers);

?>

<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet"> 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



  <div class="alert alert-success myAlert" id="myAlert">
    <strong> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Merci</strong> Message envoy&eacute;
  </div>

  <script>window.setTimeout(function() { $(".myAlert").fadeOut(); $('#myModal').modal('hide'); }, 1000); </script>

  

