<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
$sClave = $_POST["clave"];
$sAP = $_POST["aP"];
$sAM = $_POST["aM"];
$sGenero = $_POST["sex"];
$sEmail = $_POST["correo"];
$sArea = $_POST["area"];
$realizar = $_POST["realizar"];
$sInfo = "";
$sStatus = "";

//Conexion
$sDBServer = "localhost";
$sDBName = "bdtarea1ajax";
$sDBUsername = "root";
$sDBPassword = "";

$oLink = mysqli_connect($sDBServer, $sDBUsername, $sDBPassword, $sDBName);


switch ($realizar) {
    //alta
    case 1:
        $sql = mysqli_query($oLink, "Select * From tutores where claveTutor = " . $sClave);

        if (mysqli_affected_rows($oLink) > 0) {
            $sStatus = "Ya existe un Tutor con esa clave";
        } else {
            // $sql = "Insert into alumnos(matricula, aPaterno, aMaterno, fNacimiendo, genero, correo, E-carrera)" . "values('$sMatricula','$sAP','$sAM','$sFN','$sFI','$sGenero','$sEmail','$sCarrera')";
            $sql = "INSERT INTO tutores(`claveTutor`, `aPaterno`, `aMaterno`, `genero`, `area`,`correo`) VALUES ('$sClave','$sAP','$sAM','$sGenero','$sArea','$sEmail')";
            if ($sInfo == "") {
                if ($oResult = mysqli_query($oLink, $sql)) {
                    $sStatus = "Tutor Agregado";
                } else {
                    $sStatus = "Ocurrió un error al agregar al tutor, el tutor no fue agregado";
                }
            }
            mysqli_close($oLink);
        }
        echo $sStatus;

        break;
    //Consulta
    case 2:
        $sql = "Select * From tutores where claveTutor = " . $sClave;

        if ($sInfo == "") {
            if ($oResult = mysqli_query($oLink, $sql) and mysqli_affected_rows($oLink) > 0) {
                $aValues = mysqli_fetch_array($oResult, MYSQL_ASSOC);
                $sInfo = $aValues['claveTutor'] . "," . $aValues['aPaterno'] . "," .
                        $aValues['aMaterno'] . "," . $aValues['genero'] . "," .
                        $aValues['area'] . "," . $aValues['correo'] .
                        "," . "Consulta Exitosa";
                echo ($sInfo);
            } else {
                $sInfo = ",,,,,,No existe el Tutor a consultar";
                echo ($sInfo);
            }
        }


        break;
    //Baja
    case 3:
        $sql = mysqli_query($oLink, "Select * From tutores where claveTutor = " . $sClave);

        if (mysqli_affected_rows($oLink) == 0) {
            $sStatus = "No existe el tutor a eliminar";
        } else {
            $sql = "Delete From tutores where claveTutor = " . $sClave;

            if ($sInfo == "") {
                if ($oResult = mysqli_query($oLink, $sql)) {
                    $sStatus = "Se ha eliminado al tutor";
                } else {
                    $sStatus = "Ocurrió un error al elimnar al tutor, el tutor no fue eliminado";
                }
            }
           mysqli_close($oLink); 
        }
        
        echo $sStatus;
        break;
    //Modificaciones
    case 4:
        $sql = mysqli_query($oLink, "Select * From tutores where claveTutor = " . $sClave);
        if (mysqli_affected_rows($oLink) == 0) {
            $sStatus = "No existe el tutor a modificar";
        } else {
            $sql = "Update `tutores` Set `claveTutor`='$sClave', `aPaterno`='$sAP', `aMaterno`='$sAM', `genero`='$sGenero', `area`='$sArea', `correo`='$sEmail' Where claveTutor = " . $sClave;
            if ($sInfo == "") {
                if ($oResult = mysqli_query($oLink, $sql)) {
                    $sStatus = "Se ha modificado al tutor";
                } else {
                    $sStatus = "Ocurrió un error al modificar al tutor, el tutor no fue modificado";
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


