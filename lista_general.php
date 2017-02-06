<?php
    function __autoload($class_name)
    {
        require_once $class_name.'.php';
    }

    $tree = new Tree();

    $elements = $tree->get();
    $masters = $elements["masters"];
    $childrens = $elements["childrens"];
?>

<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Inversiones Meval</title>

<head>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100italic,300italic,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" href="css/responsive.min.css">
    <link rel="stylesheet" href="css/yii.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--[if lt IE 9]>
        <script src="dist/html5shiv.js"></script>
        <![endif]-->
</head>

<body>
    <!--inicio de header-->
    <nav class="navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="true">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Inversiones Meval</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse in" id="bs-example-navbar-collapse-9" aria-expanded="true">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">Inicio</a>
                    </li>
                    <li><a href="nosotros.html">Nosotros</a>
                    </li>
                    <li><a href="preguntas.html">¿Preguntas?</a>
                    </li>
                    <li><a href="negocios.html">Negocios</a>
                    </li>
                    <li><a href="sesionClose.php">Salir</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!--fin de header-->
    <section class="bg pd4">
        <div class="container">
            <div class="row-fluid">
                <div class="span8">
                    <div class="well">
                        <header>
                            <h1>Lista General</h1>
                        </header>
                        <section>
                            <h3 class="heading text-center">Asociados Al Negocio</h3>
                            <hr>
                            <table class="table table-hover">
                                  <tr>
                                  <td>
                                      <h4>Nombre</h4>
                                  </td>
                                  
                                  <td>
                                      <h4>Apellido</h4>
                                  </td>
                                  
                                  <td>
                                      <h4>Telf.</h4>
                                  </td>
                                  
                                  <td>
                                      <h4>Correo</h4>
                                  </td>
                                  
                                  <td>
                                      <h4>Voucher</h4>
                                  </td>
    
<?php
$conexion=mysql_connect("localhost","invermev_invmev","!63lgdBO37!") or die ("no se pudo conectar");
mysql_select_db("invermev_empleados",$conexion) or die ("en la base de datos");
$registro=mysql_query("select apellidos,nombre,telefono,correo,voucher from empleados",$conexion) or die ("problemas al leer1");
while ($tr=mysql_fetch_array($registro))
      {
	  echo "<tr>";
      echo "<td align=center>".          $tr['apellidos']."<br>"."</td>";
      echo "<td align=center>".          $tr['nombre']."<br>"."</td>";
      echo "<td align=center>".          $tr['telefono']."<br>"."</td>";
	  echo "<td align=center>".          $tr['correo']."<br>"."</td>";
	  echo "<td align=center>".          $tr['voucher']."<br>"."</td>";
	 
	  }
      mysql_close($conexion);
?>	
  </tr>
                            </table>
                        </section>
                    </div>
                </div>
                <div class="span4">
                    <div class="well">
                        <img src="img/LogoPng.png" height="271" width="397" alt="" class="pd4">
                        <div align="center">
                            <p><a href="registrar_asociado.php" class=" btn btn-primary btn-lg pd4">Registrar asociado</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--inicio footer-->
    <footer class="footer bg-ft clearfix pd4">
        <div class="container">
            <!--footer container-->
            <div class="row">
                <div class="span3 ">
                    <section>
                        <h4><span>Contactanos</span></h4>
                        <p>Inversiones Meval
                            <br> Carabobo - Venezuela
                            <br>
                            <strong>Telefono</strong> <a href="Tel:+58 241-3167131" class="tele">+58 241-3167131</a>
                            <br>
                            <span class="overflow"><strong>Correo:</strong> <a href="mailto:email@domain.com">info@inversionesmeval.com.ve</a></span> </p>
                    </section>
                    <!--close section-->
                    <section>
                        <h4><span>Siguenos</span></h4>
                        <div class="social">
                            <a href="#"><i class="icon-facebook facebook"></i></a>
                            <a href="#"><i class="icon-twitter twitter"></i></a>
                            <a href="#"><i class="icon-linkedin linkedin"></i></a>
                            <a href="#"><i class="icon-google-plus google-plus"></i></a>
                        </div>
                    </section>
                    <!--close section-->
                </div>
                <!-- close .span3 -->
                <!--section containing newsletter signup and recent images-->
                <div class="span5">
                    <section>
                        <h4><span>Informacion general</span></h4>
                        <p>Si estas interesado pero aun no te decides, apunta tu email te enviaremos un correo para despejar dudas</p>
                        <form action="#" method="post">
                            <div class="input-append append-fix custom-append row-fluid">
                                <input type="email" class="span8" placeholder="Email Address" name="email">
                                <button class="btn btn-primary">Contactame</button>
                            </div>
                        </form>
                        <!--close input-append-->
                    </section>
                    <!--close section-->
                </div>
                <!-- close .span5 -->
                <!--section containing blog posts-->
                <div class="span4">
                    <section>
                        <h4><span>Activate, gana dinero facil</span></h4>
                        <p>
                            Los emprendedores luchan por alcanzar sus sueños y metas, para nadie es oculto que la recompensa es el fruto de nuestros esfuerzos, esta es una excelente opotunidad que comodamente te puede cambiar tu vida, detente y toma el mando de tu futuro.
                        </p>
                        <div align="center">
                            <p><a href="Terminos.html" class=" btn btn-primary btn-lg pd4">Terminos y condiciones</a>
                            </p>
                        </div>
                        
                    </section>
                </div>
                <!-- close .span4 -->
            </div>
            <!-- close .row-fluid-->
        </div>
        <!-- close footer .container-->
    </footer>
    <section class="footer-credits">
        <div class="container">
            <ul class="clearfix">
                <li>| © 2015 Inversiones Meval All rights reserved.</li>
            </ul>
        </div>
        <!--close footer-credits container-->
    </section>
    <!--fin de footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!--<script src="http://code.jquery.com/jquery.js"></script>
cdn-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/classie.js"></script>
    <script src="js/uiMorphingButton_inflow.js"></script>
    <script src="js/uiMorphingButton_fixed.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>