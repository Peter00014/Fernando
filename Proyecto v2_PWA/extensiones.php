<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Extensiones</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">

<!--Funcion para que no haya campos vacios al insertar--->
<script type="text/javascript">

function Validar()

{  
    var NombreCom = document.getElementById("txtNombreCom").value;
    var nombre_sin_e = NombreCom.trim();

    if (nombre_sin_e.length < 1) 
    {
           alert("El campo de nombre está vacío.");
           return false;
    }

}
        
</script>    

<!--Validacion de confirmar eliminar--->
<script type="text/javascript">
    
function ConfirmarEliminar()
{
    var respuesta =confirm("¿Estás seguro de eliminar esta extension?");
    if (respuesta==true) 
    {
       return true;
    }
    else
    {
      return false;
    }

}
</script>    

<?php 
require 'bd/conexion_bd.php';

 $obj = new BD_PDO();

  if (isset($_POST['btninsertar'])) 
       {
          if ($_POST['btninsertar']=='Insertar') 
         {
            $obj->Ejecutar_Instruccion("insert into extensiones(Nombre_ext,Num_extension,Departamento) values ('".$_POST['txtNombreExt']."','".$_POST['txtNumExt']."','".$_POST['txtDepa']."')");
         }
      
         else
         {
          $obj->Ejecutar_Instruccion("update extensiones set id_extension='".$_POST['txtId_ext']."',Nombre_ext='".$_POST['txtNombreExt']."',Num_extension='".$_POST['txtNumExt']."',Departamento='".$_POST['txtDepa']."' where id_extension='".$_POST['txtId_ext']."'");
         }
       }
       elseif (isset($_GET['id_eliminar']))
       {
           $obj->Ejecutar_Instruccion("delete from extensiones where id_extension = '".$_GET['id_eliminar']."'");
       }
       elseif (isset($_GET['id_modificar'])) 
        {
            $ext_modificar = $obj->Ejecutar_Instruccion("select * from extensiones where id_extension = '".$_GET['id_modificar']."'");         
        }

       $registros = $obj->Ejecutar_Instruccion("select * from extensiones where Departamento like '%".$_POST['txtbuscar']."%'");

 ?>

        <!-- barra de navegacion-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Control de Acceso</a>
                <li ><img src="img/atras.png" alt=""><a style="color: #FFF;" href="index.php">Regresar</a></li>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#registrar">Registrar</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#buscar">Buscar</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contacto">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Banner-->
        <header class="masthead bg- text-white text-center" style="background-image: linear-gradient(to right,#444340 ,#F380B7 );">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
               <!--  <img class="masthead-avatar mb-5" src="img/compania5.png" alt="..." /> -->
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Extensiones</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"> </div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Da de alta la extension</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="registrar">
            <div class="container">
                <!-- Portfolio Section Heading-->
         <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0" id="registro"></h2><br><br>
                <!-- Icon Divider-->
               <!--  <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><img src="img/companiaIcono.png"></div>
                    <div class="divider-custom-line"></div>
                </div> -->

                <!-- Registro de extensiones-->
            <form action="extensiones.php#buscar" method="post" onsubmit="return Validar()">
                <div class="container" align="center">
                
                    <div class="jumbotron">
                        <h2>Extensiones Magna <img src="img/call.png"></h2>

                <input style="display: none;" type="txtId_ext" name="txtId_ext" value="<?php echo @$ext_modificar[0]['id_extension']; ?>">
<br>
           <div class="row">

                    <div class="col-lg-4">        
                     <label>Nombre</label>
                     <input type="text" name="txtNombreExt" id="txtNombreExt" class="form-control" value="<?php echo @$ext_modificar[0]['Nombre_ext']; ?>" required><br>    
                    </div>

                    <div class="col-lg-4">
                     <label for="">Extension</label>
                     <input class="form-control" type="number" name="txtNumExt" id="txtNumExt" value="<?php echo @$ext_modificar[0]['Num_extension']; ?>" required>
                    </div>

                    <div class="col-lg-4">
                     <label for="">Departamento</label>
                     <input class="form-control" type="text" name="txtDepa" id="txtDepa" value="<?php echo @$ext_modificar[0]['Departamento']; ?>" required>
                   </div>
           </div>
<br><br>
                     <input class="btn btn-success" type="submit" name="btninsertar" value="<?php 
                        
                        if (isset($_GET['id_modificar']))
                        {
                            echo 'Modificar';
                        }
                        else
                        {
                            echo 'Insertar';
                        }            ?>">

                  
                    </div>
                </div>
               
            </div>
     </form> 
        </section>

        <!-- Seccion Buscar-->
         
            <div align="center" class="jumbotron" id="buscar">
                <!-- Clase de la seccion de la lupa-->
                <!-- <h2 class="page-section-heading text-center text-uppercase text-white">Busqueda</h2> -->
                <!-- icono de lupa-->
                <!-- <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><img src="img/lupa2.png"></div>
                    <div class="divider-custom-line"></div>
                </div> -->

                <form action="extensiones.php#buscar" method="post" class="container">
        <h1>Buscar extension</h1>
        <br>
        <label>Nombre de departamento</label>
        <input type="text" name="txtbuscar" id="txtbuscar">
        <input type="submit" name="btnbuscar" id="btnbuscar" value="Buscar" class="btn btn-info">
        <br><br><br>
        <div class="table-responsive">
        <table class="table table-bordered table-dark" style="border-radius: 15px;">
            <tr align="center">
                <td>ID Extension</td>
                <td>Nombre</td>
                <td>Extension</td>
                <td>Departamento</td>
                <td>Eliminar</td>
                <td>Modificar</td>
            </tr>
            <?php foreach ($registros as $renglon ) {  ?>
                
                <tr align="center">
                <td><?php echo $renglon['id_extension']; ?></td>
                <td><?php echo $renglon['Nombre_ext']; ?></td>
                <td><?php echo $renglon['Num_extension']; ?></td>
                <td><?php echo $renglon['Departamento']; ?></td>
                <td><a onclick="return ConfirmarEliminar()" class="btn btn-danger" href="extensiones.php?id_eliminar=<?php echo $renglon['id_extension']; ?>#buscar"><img src="img/iconoeliminar.png"></a></td>
                <td><a class="btn btn-success" href="extensiones.php?id_modificar=<?php echo $renglon['id_extension'] ?>#registro"><img src="img/iconoeditar.png"></a></td>
            </tr>
        <?php }?>
        
        </table>
        </form>
        <div style="display: none;">
            <a class="btn btn-secondary" href="historial.php#compania">Ir a historial</a>
        </div>
     </div>                          
    </div>
    </div>
     
        <!-- Seccion de contacto-->
       <br><br><br>
 
           
               <img src="img/logo2.png" id="contacto" style="margin: 0 auto; display: block;">
          
  
       <br><br>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Seccion de locacion-->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Localizacion</h4>
                        <p class="lead mb-0">
                            Av. Industrial#805 Sur
                            <br />
                            Parque Industrial Allende <br> C.P 26530
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Siguenos en nuestras redes</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/pages/category/Industrial-Company/Reclutamiento-Magna-Allende-197703887847093/" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a>
                       
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.magna.com/es" target="_blank"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <!-- <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4"></h4>
                        <p class="lead mb-0">
                            Freelance is a free to use, MIT licensed Bootstrap theme created by
                            <a href="http://startbootstrap.com">Start Bootstrap</a>
                            .
                        </p>
                    </div> -->
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>
                    Politica de privacidad  &copy;   <br>Magna International Inc. 
                    <!-- This script automatically adds the current year to your website footer-->
                    <!-- (credit: https://updateyourfooter.com/)-->
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </small>
            </div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <!-- Contact form JS-->

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
