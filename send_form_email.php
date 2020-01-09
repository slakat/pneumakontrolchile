<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contacto@pneumakontrolchile.com";
    $email_subject = "Nuevo mensaje - Pneuma Kontrol";
 
    function died($error) {
        // your error code can go here
        echo "Hay errores en la información que escribiste. ";
        echo $error."<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['fname']) ||
        !isset($_POST['lname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('Lo sentimos, no pudimos enviar el mensaje.');       
    }
 
     
 
    $first_name = $_POST['fname']; // required
    $last_name = $_POST['lname']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'El email que ingresaste no es válido.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'El primer nombre no es válido.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'El apellido no es válido.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'El mensaje no es válido.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Detalles del formulario abako.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Nombre: ".clean_string($first_name)."\n";
    $email_message .= "Apellido: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Mensaje: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->

<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pneuma Kontrol Chile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Pneuma Kontrol Chile," />
  <meta name="keywords" content="Pneuma Kontrol Chile, algo" />
  <meta name="author" content="Kat" />


    <!-- Facebook and Twitter integration -->
  <meta property="og:title" content="Pneuma Kontrol Chile"/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content="Pneuma Kontrol Chile"/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="css/icomoon.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="css/bootstrap.css">
  
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <!-- Theme style  -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Modernizr JS -->
  <script src="js/modernizr-2.6.2.min.js"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->

  </head>
  <body>
    
  <div class="fh5co-loader"></div>
  
  <div id="page">
  <nav class="fh5co-nav" role="navigation">
    <div class="top-menu">
      <div class="container">
        <div class="row">
          <div class="col-xs-3 text-right">
            <div id="fh5co-logo"><a href="./"><img src="images/oficial/logo.png"/></a></div>
          </div>
          <div class="col-xs-9 text-right menu-1">
            <ul>
              <!-- <li class="active"><a href="index.html">Home</a></li> -->
              <li><a href="./">Inicio</a></li>
              <li><a href="nosotros.html">Sobre Nosotros</a></li>
              <li><a href="ahorro.html">Ahorro y Gestión</a></li>
              <li class="btn-cta"><a href="contacto.html"><span>Contacto</span></a></li>
            </ul>
          </div>
        </div>
        
      </div>
    </div>
  </nav>

  <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/oficial/cover.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="display-t">
            <div class="display-tc animate-box" data-animate-effect="fadeIn">
              <h1>Gracias por contactarnos, te responderemos lo antes posible.</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
 


<footer id="fh5co-footer" role="contentinfo">
    <div class="container">
      <div class="row row-pb-md">
        <div class="col-md-10 fh5co-widget">
          <h3>Sobre Pneuma Kontrol Chile</h3>
          <p>Somos una empresa que fue creada para dar servicio y soporte en el área de automatización neumática e industrial, además de realizar servicios de auditoria en calidad de aire y ahorro energético.</p>
          <p>Nuestra empresa busca consolidar una alianza estratégica con nuestros clientes, a través de una asesoría constante y ejecución oportuna.</p>
          <p><a class="btn btn-primary btn-outline with-arrow" href="nosotros.html">Conoce más <i class="icon-arrow-right"></i></a></p>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
          <ul class="fh5co-footer-links">
            <li><a href="./">Inicio</a></li>
            <li><a href="nosotros.html">Nosotros </a></li>
            <li><a href="ahorro.html">Ahorro</a></li>
            <li><a href="contacto.html">Contacto</a></li>
          </ul>
        </div>

      </div>

      <div class="row copyright">
        <div class="col-md-12 text-center">
          <p>
            <small class="block">&copy; 2018 Pneuma Kontrol Chile. Todos los derechos reservados..</small> 
          </p>
          <!--<p>
            <ul class="fh5co-social-icons">
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-linkedin"></i></a></li>
              <li><a href="#"><i class="icon-dribbble"></i></a></li>
            </ul>
          </p>-->
        </div>
      </div>

    </div>
  </footer>
  
  </div>

  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
  </div>
  
  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!-- jQuery Easing -->
  <script src="js/jquery.easing.1.3.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Waypoints -->
  <script src="js/jquery.waypoints.min.js"></script>
  <!-- Stellar Parallax -->
  <script src="js/jquery.stellar.min.js"></script>
  <!-- Carousel -->
  <script src="js/owl.carousel.min.js"></script>
  <!-- Main -->
  <script src="js/main.js"></script>

  </body>
</html>

 
<?php
 
}
?>