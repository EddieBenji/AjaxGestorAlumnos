<?php
session_start();
header("Content-Type:text/plain");
$sInfo = "";
$sDBServer = "localhost";
$sDBName = "bdtarea1ajax";
$sDBUserName = "root";
$sDBPassword = "root";
$_SESSION["valida"] = false;
$usuario = $_POST["usuario"];
$pass = $_POST["password"];
$status="";
//Creamos el SQL Query
$sQuery = "Select * from  usuarios where usuario = '" . $usuario . "' and password = '" . $pass . "'";

//Realizamos la conexión
$oLink = mysqli_connect($sDBServer, $sDBUserName, $sDBPassword, $sDBName);


if ($sInfo == "") {
    if ($oResult = mysqli_query($oLink,$sQuery) and mysqli_affected_rows($oLink) > 0) {
         $_SESSION["valida"] = true;
         $status = "bien";
    } else {
        
        $status = "No existe el usuario ";
    }
}

mysqli_close($oLink);
echo ($status);
?>
