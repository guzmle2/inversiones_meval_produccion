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
            <div class="well span5">
                <section>
                    <h1 class="center">Planilla de registro principal</h1>
                    <header>
                        <h2>Usuario: <?php session_start(); echo $_SESSION[ 'nombre']; echo $_SESSION[ 'apellidos']; ?></h2>
                        
                    </header>
                </section>
                <div>
                    <form id="ingresar_asociado.php" method="POST" name="ingreso" data-toggle="validator">
                        <label class="required">Cedula <span class="required">*</span>
                        </label>
                        <input class="input-block-level" placeholder="C.I.V" type="text" name="cedula" required>

                        <label class="required">Apellido <span class="required">*</span>
                        </label>
                        <input class="input-block-level" placeholder="Introduzca apellido" type="text" name="apellidos" required>


                        <label class="required">Nombre <span class="required">*</span>
                        </label>
                        <input class="input-block-level" placeholder="Introduzca nombre" type="text" name="nombre" required>


                        <label class="required">Email <span class="required">*</span>
                        </label>
                        <input class="input-block-level" placeholder="ejemplo@ejemplo.com" type="text" name="correo" required>

                        <label class="control-label required">Contraseña <span class="required">*</span>
                        </label>
                        <input class="input-block-level" placeholder="Clave" type="password" name="clave" required>

                        <label class="required">Telefono <span class="required">*</span>
                        </label>
                        <input class="input-block-level" placeholder="Introduzca nombre" type="text" name="telefono" required>

                        <label class="required">Num Voucher <span class="required">*</span>
                        </label>
                        <input class="input-block-level" placeholder="Introduzca el num de voucher" type="text" name="voucher" required>


                        <div align="center">
                            <input class=" btn btn-primary btn-lg" type="submit" value="Registrar" name="guardar">
                        </div>


                    </form>

                </div>
                <?php
  
  
  if (isset($_REQUEST['guardar']))
  {
	   $cedula=$_POST['cedula'];
	   $apellidos=$_POST['apellidos'];
	   $nombre=$_POST['nombre'];
	   $cedula_jefe = $_SESSION['cedula'];
	   $correo=$_POST['correo'];
	   $clave=$_POST['clave'];
	   $telefono=$_POST['telefono'];
	   $voucher=$_POST['voucher'];
	   	  
$conexion= mysql_connect ("localhost","invermev_invmev","!63lgdBO37!") or die ("no puede conectarse al servidor".mysql_error());
mysql_select_db("invermev_empleados",$conexion) or die ("problemas con la Base de Datos".mysql_error());
$sql="select tiene_hijos from empleados where cedula='$_SESSION[cedula]'";
$jefe=mysql_query($sql,$conexion) or die("problemas con la tabla empleados ".mysql_error());
$jef=mysql_fetch_array($jefe);  
if ($jef['tiene_hijos'] > 5 ) 
{
  echo "<table width=\"100%\" border=\"0\">";
  echo "<tr><td align=\"center\">";
  echo "***No Puede Registrar Otro Asociado, Numero M�ximo Ya Exedido***";
  echo "</tr></td>";
  echo "</table>";
  exit;
}
mysql_query("INSERT INTO empleados(cedula,apellidos,nombre,cedula_jefe,nivel,correo,clave,telefono,voucher) VALUES ('$_REQUEST[cedula]','$_REQUEST[apellidos]','$_REQUEST[nombre]','$_SESSION[cedula]', '$_SESSION[nivel]'+1,'$_REQUEST[correo]','$_REQUEST[clave]','$_REQUEST[telefono]','$_REQUEST[voucher]')",$conexion) or die (" no pude grabar".mysql_error());
mysql_query("update empleados set tiene_hijos=tiene_hijos+1 where cedula='$_SESSION[cedula]'",$conexion) or die ("no pude actualizar la cantidad de asociados ".mysql_error());
  echo "<table width=\"100%\" border=\"0\">";
  echo "<tr><td align=\"center\">";
  echo "***Registro Asociado Agregado***";
  echo "</tr></td>";
  echo "</table>";
}
else {

 }

 ?>

            </div>
            <div class="span5 well">
                <img src="img/LogoPng.png" height="271" width="397" alt="" style="padding:20px;">
                <?php if ($_SESSION[ 'nivel']==0) { ?>
                <div align="center">
                    <p><a href="ver_lista.php" class=" btn btn-primary btn-lg">Ver Lista</a>
                    </p>
                </div>

                <?php } ?>

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