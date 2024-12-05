<?php error_reporting(1); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Historial</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">


<style>

    select {
  border: 2.80px solid #003366; /*#2F4F4F*/
  border-radius: 10px;
  width: 140px;
  overflow: hidden;
  background: #fff url("") no-repeat 90% center;
}
</style>

<?php 
require 'bd/conexion_bd.php';
  
  $obj = new BD_PDO();

  
   $registros = $obj->Ejecutar_Instruccion("select * from personal where nombre_per like '%".$_POST['txtbuscar']."%'");

if (isset($_POST['btnbuscar'])) 
{
   $registrosVisi0 = $obj->Ejecutar_Instruccion("select id_visi,nombre_visi,apellidos_visi,compania,
        fecha_registro,statusVisitante,id_person, nombre_com, nombre_per, apellidos_per from visitantes 
        inner JOIN compania on visitantes.compania = compania.id_com
        inner JOIN personal on visitantes.id_person = personal.id_per 
        where ".$_POST['txtbuscarpor']." like '%".@$_POST['txtbuscar']."%' and ".$_POST['txtbuscarpor2']." like '%".@$_POST['txtbuscar2']."%' and ".$_POST['txtbuscarpor3']." like '%".@$_POST['txtbuscar3']."%'"); 
}
else
{
   $registrosVisi0 = $obj->Ejecutar_Instruccion("select id_visi,nombre_visi,apellidos_visi,compania,
        fecha_registro,statusVisitante,id_person, nombre_com, nombre_per, apellidos_per from visitantes 
        inner JOIN compania on visitantes.compania = compania.id_com
        inner JOIN personal on visitantes.id_person = personal.id_per 
        where nombre_visi like '%".@$_POST['txtbuscar']."%'");
} 


$contador = count($registrosVisi0); //Variable para hacer el conteo de registros
 ?>
        <!--Barra de navegacion-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Historial de visitas <img src="img/visi4.png" alt="" style="width: 6.5%; height: 6.5%;"> </a>
                <li ><img src="img/atras.png" alt=""><a style="color: #FFF;" href="index.php">Regresar</a></li>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <!-- <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#registrar">Registrar</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#buscar">Buscar</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contacto">Contacto</a></li>
                    </ul> -->
                </div>
            </div>
        </nav>

        <div id="visitante"></div>
        <br><br><br><br><br><br>
        <!-- historial visitantes-->
       <form action="historial.php#tarjetas" method="post" class="container">
    <div class="jumbotron">
     <h1 id="visitante" >Buscar <mark style="background-color: #004c99; border-radius: 10px; ">visitantes </mark> </h1> 
        <br>
        <div class="row">
        <label>Tipo de busqueda</label>

        <select id="txtbuscarpor" name="txtbuscarpor" class="caja">
            <option value="nombre_visi" title="Nombre del visitante">Nombre del Visitante</option>
            <option value="statusVisitante" title="Busca por 1 y 0  (1=Activo / 0=Inactivo)">Estatus</option>
            <option value="nombre_com" title="Nombre de la compañia">Compañia</option>
            <option value="nombre_per" title="Nombre del personal">Nombre de Personal</option>
        </select>
        <input type="text" name="txtbuscar" id="txtbuscar" style="border-radius: 6.9px; background-color: lightgray; width: 125px;">


        <select name="txtbuscarpor2" id="txtbuscarpor2">
            <option value="fecha_registro" title="Ejemplo: 2021-06-23">Fecha</option>
            <option value="statusVisitante" title="Busca por 1 y 0  (1=Activo / 0=Inactivo)">Estatus</option>
            <option value="nombre_com" title="Nombre de la compañia">Compañia</option>
            <option value="apellidos_per" title="Apellido del personal">Apellido del personal</option>
            <option value="apellidos_visi" title="Apellido del visitante">Apellido del visitante</option>
        </select>
        <input type="text" name="txtbuscar2" id="txtbuscar2" style="border-radius: 6.9px; background-color: lightgray; width: 125px;">
    

      <select name="txtbuscarpor3" id="txtbuscarpor3">
            <option value="statusVisitante" title="Busca por 1 y 0  (1=Activo / 0=Inactivo)">Estatus</option>
            <option value="nombre_com" title="Nombre de la compañia">Compañia</option>
            <option value="fecha_registro" title="Ejemplo: 2021-06-23">Fecha</option>
            <option value="nombre_per" title="Nombre del personal">Personal</option>
        </select>
        <input type="text" name="txtbuscar3" id="txtbuscar3" style="border-radius: 6.9px; background-color: lightgray; width: 125px;">

         <input type="submit" name="btnbuscar" id="btnbuscar" value="Buscar" class="btn btn-info">
</div>    </div>

        <!-- <br> -->
        <!-- <div class="table-responsive">
        <table class="table table-dark" style="">
            <tr align="center" style="background-color: #0b4f7f;border-radius: 15px;">
                <td>ID Visitante</td>
                <td>Nombre del <br>Visitante</td>
                <td>Compañia</td>
                <td>Fecha</td>
                <td>Visito a</td>
                <td>Estatus</td> 
                <td>Modificar</td>
       
            <?php foreach ($registrosVisi as $renglon ) {  ?>
                
                <tr align="center">
                <td style="display: none;"></td>
                <td><?php echo $renglon['id_visi']; ?></td>
                <td><?php echo $renglon['nombre_visi']." ".$renglon['apellidos_visi']; ?></td>
                <td><?php echo $renglon['nombre_com']; ?></td>
                <td><?php echo $renglon['fecha_registro']; ?></td>
                <td><?php echo $renglon['nombre_per']." ".$renglon['apellidos_per']; ?> </td>
                <td><?php echo $renglon['statusVisitante']; ?></td>
                
                <td><a class="btn btn-success" href="visitantes.php?id_modificar=<?php echo $renglon['id_visi'] ?>#registro"><img src="img/iconoeditar.png"></a></td>
            </tr>
        <?php }?>
        
        </table> -->
        </form>
       
        <div class="container">
<div class="jumbotron"  style="background-color: white;" align="center" id="tarjetas">
    <h5> 
        <?php 
    if ($contador == '0')
     {
    echo "No hay registros";
     }
     else
     {
    echo "Registros: ".$contador;
     }
?></h5>

<!--Muestra de registros de visitas en tarjetas--->
<section class="service-section spad">
    <div class="container">
        <br>
        <div class="card-deck mt-3">
            <?php 
            
      if (isset($_POST['btnbuscar'])) 
        {              
            $registros1 = $obj->Ejecutar_Instruccion("select id_visi,nombre_visi,apellidos_visi,compania,
        fecha_registro,statusVisitante,id_person, nombre_com, nombre_per, apellidos_per from visitantes 
        inner JOIN compania on visitantes.compania = compania.id_com
        inner JOIN personal on visitantes.id_person = personal.id_per 
        where ".$_POST['txtbuscarpor']." like '%".@$_POST['txtbuscar']."%' and ".$_POST['txtbuscarpor2']." like '%".@$_POST['txtbuscar2']."%' and ".$_POST['txtbuscarpor3']." like '%".@$_POST['txtbuscar3']."%'");
            $cantidad= count($registros1);
        } 
       else
        {  
            $registros1 = $obj->Ejecutar_Instruccion("select id_visi,nombre_visi,apellidos_visi,compania,
        fecha_registro,statusVisitante,id_person, nombre_com, nombre_per, apellidos_per from visitantes 
        inner JOIN compania on visitantes.compania = compania.id_com
        inner JOIN personal on visitantes.id_person = personal.id_per 
        where nombre_visi like '%".@$_POST['txtbuscar']."%'");
            $cantidad= count($registros1); 
        }

            foreach ($registros1 as $registro) { ?>

    <div class="col-lg-4 col-md-6 text-center">             
      <div class="card text-center border-">
        
            <div class="sb-icon">               
                                
            <div class="card-body">

                <h4 class="card-title"><?php echo $registro['nombre_visi']." ".$registro['apellidos_visi']; ?></h4> 
                <img src="img/avatar.png" width="70px" height="45px">
                <label class="card-text">ID Visitante: <?php echo $registro['id_visi']; ?></label><br> 

                <label class="card-text"><b>Compañia:</b> <?php echo $registro['nombre_com']; ?></label>
                <label class="card-text">Visito a: <?php echo $registro['nombre_per']." ".$registro['apellidos_per']; ?></label><br>

                <?php 
                if($registro['statusVisitante'] == '1')
                {
                 echo '<label style="background-color: lightgreen; border-radius: 7px;" class="card-text">Status: 1</label><br>';
                }
                 else 
                {
                 echo '<label style="background-color: #E66D7F; border-radius: 7px;" class="card-text">Status: 0</label><br>';
                } ?>
                <!-- <label class="card-text">Status: <?php echo $registro['statusVisitante']; ?></label><br> -->
                <label class="card-text"><?php echo $registro['fecha_registro']; ?></label><br>   
            
              <a class="btn btn-outline-success" href="visitantes.php?id_modificar=<?php echo $registro['id_visi'] ?>#registro">Modificar</a>  
              <!-- <a class="btn btn-danger" href="visitantes.php?id_eliminar=<?php echo $registro['id_visi']; ?>#buscar" title="Recuerda el ID para eliminar"><img src="img/iconoeliminar.png"></a> -->                
            </div>   
          </div>
      </div><br>
    </div> 
                  
                  <?php }?>

        </div>    
    </div>
</section>

  </div>
</div>
 

<div id="compania"></div>
        <br><hr>
       
    
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
                        <a class="btn btn-outline-light btn-social mx-1"  href="https://www.facebook.com/pages/category/Industrial-Company/Reclutamiento-Magna-Allende-197703887847093/" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a>
                       
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
