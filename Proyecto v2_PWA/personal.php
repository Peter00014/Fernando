<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Personal</title>
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


<!--Validacion de eliminar un registro--->
<script type="text/javascript">
    
function ConfirmarEliminar()
{
    var respuesta =confirm("¿Estás seguro de eliminar este registro?");
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

<!--Funcion para que no haya campos vacios al insertar--->
<script type="text/javascript">

function Validar()

{  
    var NombrePers = document.getElementById("txtNombrePer").value;
    var nombre_sin_e = NombrePers.trim();

    if (nombre_sin_e.length < 1) 
    {
           alert("El campo de nombre está vacío.");
           return false;
    }

}
        
</script>    

<?php 
require 'bd/conexion_bd.php';
  
  $obj = new BD_PDO();

  if(isset($_POST['btninsertar'])) 
  {
    if($_POST['btninsertar']=='Insertar') 
    {
      $obj->Ejecutar_Instruccion("insert into personal(nombre_per,apellidos_per,correo,extensionTel,
        statusPersonal) values ('".$_POST['txtNombrePer']."','".$_POST['txtApellidosPer']."','".$_POST['txtcorreo']."','".$_POST['txtExtension']."','".$_POST['txtStatusPer']."')");
    }
    else 
    {
      $obj->Ejecutar_Instruccion("update personal set id_per='".$_POST['txtID_per']."',
      nombre_per='".$_POST['txtNombrePer']."',apellidos_per='".$_POST['txtApellidosPer']."',
      correo='".$_POST['txtcorreo']."',extensionTel='".$_POST['txtExtension']."',statusPersonal='".$_POST['txtStatusPer']."' where id_per='".$_POST['txtID_per']."'");  
    }
  }
  elseif (isset($_GET['id_eliminar'])) 
  {
    $obj->Ejecutar_Instruccion("delete from personal where id_per = '".$_GET['id_eliminar']."'");
  }
  elseif (isset($_GET['id_modificar'])) 
  {
   $personal_modificar = $obj->Ejecutar_Instruccion("select * from personal where id_per='".$_GET['id_modificar']."'");
  }
   $registros = $obj->Ejecutar_Instruccion("select * from personal where nombre_per like '%".$_POST['txtbuscar']."%'");



 ?>
        <!--Barra de navegacion-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Control de Acceso</a>
                <li ><a style="color: #FFF;" href="index.php"><img src="img/atras.png">Regresar</a></li>
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
        <!-- Masthead-->
        <header class="masthead text-white text-center" style="background-image: linear-gradient(to right,#191D21, orangered);">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <!-- <img class="masthead-avatar mb-5" src="img/personal2.png" alt="..." /> -->
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Registrar Personal</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"> </div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Dar de alta cada personal</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="registrar">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0" id="registro"></h2><br>
                <!-- Icon Divider-->

                    <!-- Registro de personal-->
            <form action="personal.php#buscar" method="post" onsubmit="return Validar()">
                <div class="container" align="center">
                
                    <div class="jumbotron">
                        <h2>Personal <img src="img/iconopersonal.png"></h2>

                <input style="display: none;" type="txtID_per" name="txtID_per" value="<?php echo @$personal_modificar[0]['id_per']; ?>">

<br>   <div class="row">
                <div class="col-md-6">
                     <label>Nombre </label>
                     <input type="text" name="txtNombrePer" id="txtNombrePer" class="form-control" value="<?php echo @$personal_modificar[0]['nombre_per']; ?>" required><br>   
                </div>

                <div class="col-md-6">
                     <label>Apellidos </label>
                     <input type="text" name="txtApellidosPer" id="txtApellidosPer" class="form-control" value="<?php echo @$personal_modificar[0]['apellidos_per']; ?>" required><br> 
                 </div> 
      </div>

 <div class="row">
               <div class="col-md-4">
                   <label>Correo</label>
                   <input type="email" name="txtcorreo" id="txtcorreo" class="form-control" value="<?php echo @$personal_modificar[0]['correo']; ?>" required>
               </div>
<br>
               <div class="col-md-4">
                   <label>Extension</label>   
                   <input type="number" name="txtExtension" id="txtExtension" class="form-control" 
                   value="<?php echo @$personal_modificar[0]['extensionTel']; ?>" required>        
              </div>
<br>         

            <div class="col-md-4">
                   <label>Estatus</label>
                   <select name="txtStatusPer" id="txtStatusPer" class="form-control" required>
                        <option value="">Seleccione</option>
                         
                        <option value="1" <?php if (@$personal_modificar[0]['statusPersonal']=='1') { echo 'Selected';} ?>>Activo</option>

                        <option value="0" <?php if (@$personal_modificar[0]['statusPersonal']=='0') { echo 'Selected';} ?>>Inactivo</option>
                    </select>
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

                <form action="personal.php#buscar" method="post" class="container">
        <h1>Buscar Personal</h1>
        <br>
        <label>Nombre de Personal</label>
        <input type="text" name="txtbuscar" id="txtbuscar">
        <input type="submit" name="btnbuscar" id="btnbuscar" value="Buscar" class="btn btn-info">
        <br><br><br>
        <div class="table-responsive">
        <table class="table table-bordered" style="background-color: white; border-radius: 15px;">
            <tr align="center">
                <td>ID Personal</td>
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>Correo</td>
                <td>Extension de <br>telefono </td>
                <td>Estado</td>
                <td style="text-align: center">Eliminar</td>
                <td>Modificar</td>
            </tr>
            <?php foreach ($registros as $renglon ) {  ?>

                <tr align="center">
                <td><?php echo $renglon['id_per']; ?></td>
                <td><?php echo $renglon['nombre_per']; ?></td>
                <td><?php echo $renglon['apellidos_per']; ?></td>
                <td><?php echo $renglon['correo']; ?></td>
                <td><?php echo $renglon['extensionTel']; ?></td>
                <td><?php echo $renglon['statusPersonal']; ?></td>
                <td><a onclick="return ConfirmarEliminar()" class="btn btn-danger" href="personal.php?id_eliminar=<?php echo $renglon['id_per']; ?>#buscar"><img src="img/iconoeliminar.png"></a></td>
                <td><a class="btn btn-success" href="personal.php?id_modificar=<?php echo $renglon['id_per'] ?>#registro"><img src="img/iconoeditar.png"></a></td>
            </tr>
        <?php }?>
        
        </table>
        </form>
        <div style="display: none;">
            <a class="btn btn-secondary" href="historial.php#personal">Ir a histoial</a>
        </div>
     </div>                          
    </div>
    </div>
     
        <!-- Seccion de contacto-->
       <br><br><br>
       <div class="container" align="center">
           
               <img src="img/logo2.png" id="contacto">
          
       </div>
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

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
