<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
$sClave = $_POST["matricula"];
$sAP = $_POST["aP"];
$sAM = $_POST["aM"];
$sFN = $_POST["fN"];
$sFI = $_POST["fI"];
$sGenero = $_POST["sex"];
$sEmail = $_POST["correo"];
$sArea = $_POST["carrera"];
$realizar = $_POST["realizar"];
$sInfo = "";
$sStatus = "";

//Conexion
$sDBServer = "localhost";
$sDBName = "bdtarea1ajax";
$sDBUsername = "root";
$sDBPassword = "root";

$oLink = mysqli_connect($sDBServer, $sDBUsername, $sDBPassword, $sDBName);


switch ($realizar) {
    //alta
    case 1:
        $sql = mysqli_query($oLink, "Select * From alumnos where matricula = " . $sClave);

        if (mysqli_affected_rows($oLink) > 0) {
            $sStatus = "Ya existe un alumno con esa matricula";
        } else {
            // $sql = "Insert into alumnos(matricula, aPaterno, aMaterno, fNacimiendo, genero, correo, E-carrera)" . "values('$sMatricula','$sAP','$sAM','$sFN','$sFI','$sGenero','$sEmail','$sCarrera')";
            $sql = "INSERT INTO alumnos(`matricula`, `aPaterno`, `aMaterno`, `fNacimiendo`, `fIngreso`,`genero`, `correo`, `carrera`) VALUES ('$sClave','$sAP','$sAM','$sFN','$sFI','$sGenero','$sEmail','$sArea')";
            if ($sInfo == "") {
                if ($oResult = mysqli_query($oLink, $sql)) {
                    $sStatus = "Alumno Agregado";
                } else {
                    $sStatus = "Ocurrió un error al agregar el alumno, el alumno no fue agregado";
                }
            }
            mysqli_close($oLink);
        }
        echo $sStatus;

        break;
    //Consulta
    case 2:
        $sql = "Select * From alumnos where matricula = " . $sClave;
      
            if ($sInfo == "") {
                if ($oResult = mysqli_query($oLink, $sql) and mysqli_affected_rows($oLink) > 0) {
                    $aValues = mysqli_fetch_array($oResult, MYSQL_ASSOC);
                    $sInfo = $aValues['matricula'] . "," . $aValues['aPaterno'] . "," .
                            $aValues['aMaterno'] . "," . $aValues['fNacimiendo'] . "," .
                            $aValues['fIngreso'] . "," . $aValues['genero']
                            . "," . $aValues['correo'] . "," . $aValues['carrera'] . "," . "Consulta Exitosa";
                   echo ($sInfo);
                }else{
                    $sInfo = ",,,,,,,,No existe el alumno a consultar";
                    echo ($sInfo);
                }
            }
        
        
        break;
    //Baja
    case 3:
        $sql = mysqli_query($oLink, "Select * From alumnos where matricula = " . $sClave);

        if (mysqli_affected_rows($oLink) == 0) {
            $sStatus = "No existe el alumno a eliminar";
        } else {
            $sql = "Delete From alumnos where matricula = " . $sClave;

            if ($sInfo == "") {
                if ($oResult = mysqli_query($oLink, $sql)) {
                    $sStatus = "Se ha eliminado el alumno";
                } else {
                    $sStatus = "Ocurrió un error al elimnar el alumno, el alumno no fue eliminado";
                }
            }
            mysqli_close($oLink);
        }
        echo $sStatus;
        break;
    //Modificaciones
    case 4:
        $sql = mysqli_query($oLink, "Select * From alumnos where matricula = " . $sClave);
        if (mysqli_affected_rows($oLink) == 0) {
            $sStatus = "No existe el alumno a modificar";
        } else {
            $sql = "Update `alumnos` Set `matricula`='$sClave', `aPaterno`='$sAP', `aMaterno`='$sAM', `fNacimiendo`='$sFN', `fIngreso`='$sFI',`genero`='$sGenero', `correo`='$sEmail', `carrera`='$sArea' Where matricula = " . $sClave;
            if ($sInfo == "") {
                if ($oResult = mysqli_query($oLink, $sql)) {
                    $sStatus = "Se ha modificado el alumno";
                } else {
                    $sStatus = "Ocurrió un error al modificar el alumno, el alumno no fue modificado";
                }
            }
            mysqli_close($oLink);
        }
        echo $sStatus;
        break;
    default :
        break;
}
?>


