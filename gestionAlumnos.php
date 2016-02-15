<?php
session_start();
if ($_SESSION["valida"] == false) {
    header('Location: login.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Gestion Alumnos</title>
        <link rel="stylesheet" type="text/css" href="css/tarea1.css">
            <script type="text/javascript" src="js/zxml.js"></script>
            <script type="text/javascript">
                var realizar = 0;

                function sendRequest() {
                    var oForm = document.forms[0];
                    var sBody = getRequestBody(oForm);
                    var oXmlHttp = zXmlHttp.createRequest();
                    oXmlHttp.open("post", oForm.action, true);
                    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    oXmlHttp.onreadystatechange = function () {
                        if (oXmlHttp.readyState == 4) {
                            if (oXmlHttp.status == 200) {
                                saveResult(oXmlHttp.responseText);

                            } else {
                                saveResult("Ocurrio un error: " + oXmlHttp.statusText)
                            }
                        }
                    };
                    oXmlHttp.send(sBody);
                }

                function getRequestBody(oForm) {
                    //funcion que devuelve una cadena de consulta
                    var aParams = new Array();
                    for (var i = 0; i < oForm.elements.length; i++) {
                        var sParam = encodeURIComponent(oForm.elements[i].name);
                        sParam += "=";
                        sParam += encodeURIComponent(oForm.elements[i].value);
                        aParams.push(sParam);
                    }
                    sParam = encodeURIComponent("realizar");
                    sParam += "=";
                    sParam += encodeURIComponent(realizar.toString());
                    aParams.push(sParam);
                    return aParams.join("&");
                }

                function saveResult(sMensaje) {

                    if (realizar == 2) {
                        str = sMensaje.split(",");

                        var inputs = document.getElementsByClassName("esp");

                        for (i = 1; i < 8; i++) {
                            inputs[i].value = str[i];
                        }
                        var divStatus = document.getElementById("divStatus");
                        divStatus.innerHTML = str[8];
                    } else {
                        var divStatus = document.getElementById("divStatus");
                        divStatus.innerHTML = sMensaje;
                    }

                }

                function habilitarCamposAlta() {
                    realizar = 1;
                    elementos = document.forms[0];
                    for (i = 0; i < elementos.length; i++) {
                        elementos[i].disabled = false;

                    }
                    inputs = document.getElementsByClassName("esp");
                    for (i = 0; i < 8; i++) {
                        inputs[i].value = "";
                    }
                    var divStatus = document.getElementById("divStatus");
                    divStatus.innerHTML = "";
                }
                function habilitarCamposConsulta() {
                    realizar = 2;
                    elementos = document.getElementsByClassName("esp");
                    for (i = 0; i < elementos.length; i++) {
                        elementos[i].disabled = true;
                    }
                    el = document.getElementsByName("matricula");
                    el[0].disabled = false;
                    el = document.getElementsByName("btnEnviar");
                    el[0].disabled = false;

                    inputs = document.getElementsByClassName("esp");
                    for (i = 0; i < elementos.length; i++) {
                        inputs[i].value = "";

                    }
                    var divStatus = document.getElementById("divStatus");
                    divStatus.innerHTML = "";
                }

                function habilitarCamposBaja() {
                    realizar = 3;
                    elementos = document.getElementsByClassName("esp");
                    for (i = 0; i < elementos.length; i++) {
                        elementos[i].disabled = true;
                    }

                    inputs = document.getElementsByClassName("esp");
                    for (i = 0; i < elementos.length; i++) {
                        inputs[i].value = "";

                    }

                    el = document.getElementsByName("matricula");
                    el[0].disabled = false;
                    el = document.getElementsByName("btnEnviar");
                    el[0].disabled = false;
                    var divStatus = document.getElementById("divStatus");
                    divStatus.innerHTML = "";
                }

                function habilitarCamposModificaciones() {
                    var divStatus = document.getElementById("divStatus");
                    divStatus.innerHTML = "";
                    realizar = 4;
                    elementos = document.forms[0];
                    for (i = 0; i < elementos.length; i++) {
                        elementos[i].disabled = false;
                    }
                    inputs = document.getElementsByClassName("esp");
                    for (i = 0; i < 8; i++) {
                        inputs[i].value = "";

                    }

                }
            </script>
    </head>

    <body>
        <form action="manejarAlumno.php" method="post" onsubmit="sendRequest();
                return false">
            <table id="formulario">
                <tbody>
                    <tr><td colspan="4"> <h1>Entrada a la Aplicacion</h1></td></tr>
                    <tr>
                        <td><input type="button" value="Altas" onclick="habilitarCamposAlta()"/></td>
                        <td><input type="button" value="Consultas" onclick="habilitarCamposConsulta()"/></td>
                        <td><input type="button" value="Modificaciones" onclick="habilitarCamposModificaciones()" /></td>
                        <td><input type="button" value="Bajas" onclick="habilitarCamposBaja()"/></td>
                    </tr>

                    <tr><td colspan="2"><label>Matricula:</label></td><td colspan="2"><input name="matricula" class="esp" type="number" disabled required/></td></tr>
                    <tr><td colspan="2"><label>Apellido Paterno:</label></td><td colspan="2"><input name="aP" class="esp" type="text" disabled required/></td></tr>
                    <tr><td colspan="2"><label>Apellido Materno:</label></td><td colspan="2"><input name="aM" class="esp" type="text" disabled required/></td></tr>
                    <tr><td colspan="2"><label>Fecha nacimiento:</label></td><td colspan="2"><input name="fN" class="esp" type="date" disabled required/></td></tr>
                    <tr><td colspan="2"><label>Fecha de ingreso:</label></td><td colspan="2"><input name="fI" class="esp" type="date" disabled required/></td></tr>
                    <tr><td colspan="2">
                            <label>Genero:</label></td><td><SELECT name="sex" class="esp" disabled required> 
                                <OPTION value="hombre">hombre</OPTION> 
                                <OPTION value="mujer">mujer</OPTION> 
                            </SELECT> </td</tr>
                    <tr><td colspan="2"><label>Correo:</label></td><td colspan="2"><input name="correo" class="esp" type="email" disabled required/></td></tr>
                    <tr><td colspan="2"><label>Carrera:</label></td><td colspan="2"><input name="carrera" class="esp" type="text" disabled required/></td></tr>
                    <tr><td><input type="submit" value="Enviar" name="btnEnviar" disabled /></td></tr>
                </tbody>
            </table>
        </form>
        <div id="divStatus"></div>
    </body>
</html>



