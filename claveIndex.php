<?php
    $conexion= mysql_connect ("localhost","invermev_invmev","!63lgdBO37!") or die("no puede conectarse al servidor".mysql_error()); // SI HAY ERROR EN LA BASE DE DATOS//
    mysql_select_db("invermev_empleados",$conexion) or die ("problemas con la base de datos".mysql_error());// CONEXION A LA BASE DE DATOS//

    $sql="select * from empleados where correo='$_REQUEST[correo]' and clave ='$_REQUEST[clave]'";

    $empleados=mysql_query($sql,$conexion) or die("problemas con la tabla empleados ".mysql_error());
    session_start();

    if(($emp=mysql_fetch_array($empleados))) { 
    //usuario y contrase�a v�lidos 
    //se define una sesion y se guarda el dato session_start();

    $_SESSION['cedula']=$emp['cedula'];
    $_SESSION['nombre']=$emp['nombre'];
    $_SESSION['apellidos']=$emp['apellidos'];
    $_SESSION['nivel']=$emp['nivel'];

    $_SESSION["autenticado"] = "SI";
    header("location:registrar_asociado.php");
    }

    else{

    header("location:login.php?errorusuario=si");

    }
?>