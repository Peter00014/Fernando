<?php error_reporting(1); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
         <!--PWA-->
        <link rel="manifest" href="manifest.json"> 
        <meta name="author" content="" />
        <title>Control de Acceso</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <script src="js/push.min.js"></script>
        <script type="text/javascript" src="push.js"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top" onload="setTimeout(push,8000)">

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Control de Acceso</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                         
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="conocenos.php">Conocenos</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="extensiones.php">Extensiones</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <script type="text/javascript">
    function push(){
        Push.Permission.request();
        Push.create('Hecha un vistazo',{
        body: 'Registra tu hora de entrada',
        icon: "img/visi2.png",
        timeout: 50000,
        vibrate: [100, 100, 100],
        onClick: function() {
            window.location=("http://localhost/Proyecto%20v2_PWA/visitantes.php");
            console.log(this);
        }
        
 });
    }

</script>
        <!--https://pwa-controlacceso.000webhostapp.com/visitantes.php Masthead-->
 <!--PWA-->
    

 <!----METAS DE PWA-->
    <meta name="theme-color" content="#2F3BA2">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="shortcut icon" href="img2/icon-512x512.png">
    <link rel="apple-touch-icon" href="img2/icon-512x512.png">
    <link rel="apple-touch-startup-image" href="img2/icon-512x512.png">

    <link rel="apple-touch-icon" href="img2/icon-192x192.png" />
    <link rel="apple-touch-icon" href="img2/icon-256x256.png" />
    <link rel="apple-touch-icon" href="img2/icon-384x384.png" />
    <link rel="apple-touch-icon" href="img2/icon-512x512.png" />
<meta name="apple-mobile-web-app-status-bar" content="#db4938" />
<br>
<hr>    



<style>
    
#carta {
transition: top ease 0.5s;  
}

/*Especificamos por nombre de id la funcion que queremos que haga css*/
#cartamov:hover{
margin-top: -12px;
transition: margin 0.2s ease-out; 
}
#cartamov1:hover{
margin-top: -12px;
transition: margin 0.2s ease-in-out; 
}
#cartamov2:hover{
margin-top: -12px;
transition: margin 0.2s ease-in-out; 
}
#cartamov3:hover{
margin-top: -12px;
transition: margin 0.2s ease-in-out; 
}
</style>
<div class=""><br><br>
    <div class="jumbotron"> 

<div class="container">   
    <h1>Seleccione</h1>
    <div class="row"> 

      <div class="col-md">        
          <div class="card bg-warning text-white" id="cartamov">
            <div class="card-body">
              <h4 class="card-title">Registro de compañias</h4><img src="img/compania3.png" alt="" style="width: 50%; height: 50%;" align="right">
              <p class="card-text">Da de alta cada compañia y estatus, 
                                   las compañias se guardaran, una vez dada de alta no es necesario volverla a registrar</p>
              <a href="compania.php" class="btn btn-light">Entrar</a>
            </div>
          </div>          
      </div>   

      <div class="col-md">        
          <div class="card bg- text-white" style="background-color: orangered;" id="cartamov1">
            <div class="card-body">
              <h4 class="card-title">Registro de personal</h4><img src="img/personal3.png" alt="" style="width: 52%; height: 52%;" align="right">
              <p class="card-text">Da de alta cada personal de oficina con sus datos, extencion de telefono, correo, estatus, etc </p>
              <a href="" class="btn btn-light">Entrar</a>
            </div>
          </div>          
      </div>


      <div class="col-md">        
          <div class="card bg-success text-white" align="" id="cartamov2">
            <div class="card-body">
              <h4 class="card-title">Registro de visitante</h4><img src="img/visi2.png" alt="" style="width: 50%; height: 50%;" align="right">
              <p class="card-text" align="">Registra las visitas que vayan llegando,
                                   con sus datos o informacion correspondientes y a quien van a visitar  </p>
              <a href="visitantes.php" class="btn btn-light">Entrar</a>
            </div>
          </div>          
      </div>

      <div class="col-md">        
          <div class="card bg- text-white" style="background-color: #004c99;" id="cartamov3">
            <div class="card-body">
              <h4 class="card-title">Historial</h4><img src="img/histo.png" alt="" style="width: 50%; height: 50%;" align="right">
              <p class="card-text">Buscar en el historial de visitas, puedes buscar por distintos criterios y condiciones o tambien puedes buscar normalmente </p>
              <a href="historial.php" class="btn btn-light">Entrar</a>
            </div>
          </div>          
      </div>          
    </div>
  </div>




    </div>
</div>

<br><br>             
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>
                    Politica de privacidad  &copy;   <br>Magna International Inc.
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/pages/category/Industrial-Company/Reclutamiento-Magna-Allende-197703887847093/" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a>
                       
                    <a class="btn btn-outline-light btn-social mx-1" href="https://www.magna.com/es" target="_blank"><i class="fab fa-fw fa-dribbble"></i></a>
                </small>
            </div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
    
        
        <!-- Portfolio Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-labelledby="portfolioModal4Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal4Label">Magna Asientos Allende</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal numero 1 - Imagen-->
                                    
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-5"><h5>Esta empresa esta clasificada dentro del sector (336 - Fabricación de equipo de transporte que agrupa Unidades económicas dedicadas principalmente a la fabricación de equipo de transporte, como automóviles, camionetas y camiones; carrocerías y remolques; partes para vehículos automotores; equipo aeroespacial, equipo ferroviario, embarcaciones y otro equipo de transporte.)<br><br>Aqui se hace la Fabricación de asientos y accesorios interiores para vehículos automotores. De diferentes marcas. Se ubica en COLONIA CENTRO de Allende, COAHUILA DE ZARAGOZA. Emplea alrededor de 251 y más personas </h5></p>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        Cerrar ventana
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 5-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-labelledby="portfolioModal5Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal5Label">Informacion de la empresa</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal numero 2 - Imagen-->  
                                    
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-5"><h5>Magna International Inc. es una compañía canadiense con sede en Aurora, Ontario, Canadá. Es el mayor fabricante de componentes para el automóvil de Canadá. La compañía es dueña del fabricante de automóviles Magna Steyr situado en Graz, Austria.</h5><br><h6>Magna también fabrica componentes del automóvil. Sus principales clientes son General Motors, Ford y Chrysler. Además de los "3 Grandes", Magna cuenta en su cartera de clientes con fabricantes como Volkswagen, BMW o Toyota. </h6></p>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        Cerrar ventana
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
     
        <!-- Bootstrap core JS-->
      <!--   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script> -->
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="./js/jquery-3.6.0.js"></script>
        <!--llamar instalacion del service worker-->
        <script src="registrar_serviceWorker.js"></script> 
    </body>
</html>
