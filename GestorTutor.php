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
<title>Guarda datos del tutor</title>

<script type="text/javascript">

	var oIFrame = null;
	
	function createIframe(){
		var oIFrameElement = document.createElement("iframe");
		oIFrameElement.width = 0;
		oIFrameElement.height = 0;
		oIFrameElement.frameBorder = 0;
		oIFrameElement.name = "hiddenFrame";
		oIFrameElement.id = "hiddenFrame";
		document.body.appendChild(oIFrameElement);
		
		oIFrame = frames["hiddenFrame"];
		
	}
	
	function checkIframe(){

		if(!oIFrame){
			createIframe();			
		}
		setTimeout(oIFrame.location = "ProxyForm.html",10);
	}
	
	function formReady(){
		var oHiddenForm = oIFrame.document.forms[0];
		var oForm = document.forms[0];
		
		for(var i=0; i<oForm.elements.length; i++){
			var oHidden = oIFrame.document.createElement("input");
			oHidden.type = "hidden";
			oHidden.name = oForm.elements[i].name;
			oHidden.value = oForm.elements[i].value;
			oHiddenForm.appendChild(oHidden);			
		}
		
		oHiddenForm.action = oForm.action;
		oHiddenForm.submit();
	}
	
	function saveResult(sMessage){
		var divStatus = document.getElementById("divStatus");
		divStatus.innerHTML = sMessage;
	}



	function habilitarCamposAlta(){
		inputs = document.getElementById("accion");
                    
                        inputs.value = 1;
        elementos = document.forms[0];
                    for (i = 0; i < elementos.length; i++) {
                        elementos[i].disabled = false;

                    }
                    inputs = document.getElementsByClassName("esp");
                    for (i = 0; i < 6; i++) {
                        inputs[i].value = "";
                    }

                    var divStatus = document.getElementById("divStatus");
                    divStatus.innerHTML = "";    
	}

	function habilitarCamposConsulta(){
		inputs = document.getElementById("accion");
                    
        inputs.value = 2;

		elementos = document.getElementsByClassName("esp");
                    for (i = 0; i < elementos.length; i++) {
                        elementos[i].disabled = true;
                    }
                    el = document.getElementsByName("clave");
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
		inputs = document.getElementById("accion");
                    
        inputs.value = 4;
                 
                    elementos = document.getElementsByClassName("esp");
                    for (i = 0; i < elementos.length; i++) {
                        elementos[i].disabled = true;
                    }

                    inputs = document.getElementsByClassName("esp");
                    for (i = 0; i < elementos.length; i++) {
                        inputs[i].value = "";

                    }

                    el = document.getElementsByName("clave");
                    el[0].disabled = false;
                    el = document.getElementsByName("btnEnviar");
                    el[0].disabled = false;
                    var divStatus = document.getElementById("divStatus");
                    divStatus.innerHTML = "";
                }

	function habilitarCamposModificaciones() {

		inputs = document.getElementById("accion");
                    
        inputs.value = 3;
                    var divStatus = document.getElementById("divStatus");
                    divStatus.innerHTML = "";
                    realizar = 4;
                    elementos = document.forms[0];
                    for (i = 0; i < elementos.length; i++) {
                        elementos[i].disabled = false;
                    }
                    inputs = document.getElementsByClassName("esp");
                    for (i = 0; i < 6; i++) {
                        inputs[i].value = "";

                    }
                    
                    
                    

                }                
	
</script>

</head>

<body>
<form action="ControladorTutor.php" method="post" onsubmit="checkIframe(); return false" >
		<table id="formulario">
                <tbody>
                    <tr><td colspan="4"> <h1>Gestión de tutores</h1></td></tr>
                    <tr>
                        <td><input type="button" value="Altas" onclick="habilitarCamposAlta()"/></td>
                        <td><input type="button" value="Consultas" onclick="habilitarCamposConsulta()"/></td>
                        <td><input type="button" value="Modificaciones" onclick="habilitarCamposModificaciones()" /></td>
                        <td><input type="button" value="Bajas" onclick="habilitarCamposBaja()"/></td>
                    </tr>

                    <input id="accion" name="accion" type="hidden"></input>


                    <tr><td colspan="2"><label>Clave Profesor:</label></td><td colspan="2"><input name="clave" class="esp" type="number" disabled required/></td></tr>
                    <tr><td colspan="2"><label>Apellido Paterno:</label></td><td colspan="2"><input name="aP" class="esp" type="text" disabled required/></td></tr>
                    <tr><td colspan="2"><label>Apellido Materno:</label></td><td colspan="2"><input name="aM" class="esp" type="text" disabled required/></td></tr>
                    <tr><td colspan="2">
                            <label>Genero:</label></td><td><SELECT name="sex" class="esp" disabled required> 
                                <OPTION value="Hombre" selected>Hombre</OPTION> 
                                <OPTION value="Mujer">Mujer</OPTION> 
                            </SELECT> </td</tr>
                    <tr><td colspan="2">
                            <label>Area:</label></td><td><SELECT name="area" class="esp" disabled required> 
                                <OPTION value="LIS">LIS</OPTION> 
                                <OPTION value="LCC">LCC</OPTION> 
                                <OPTION value="LIC">LIC</OPTION> 
                                <OPTION value="MAT">MAT</OPTION> 
                            </SELECT> </td</tr>
                    <tr><td colspan="2"><label>Correo:</label></td><td colspan="2"><input name="correo" class="esp" type="email" disabled required/></td></tr>
                    <tr><td><input type="submit" value="Enviar" name="btnEnviar" disabled /></td></tr>
                </tbody>
            </table>
</form>

<div id="divStatus"></div>

</body>
</html>
