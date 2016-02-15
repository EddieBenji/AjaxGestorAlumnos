<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Crear nuevo tutor</title>
<?php





	
	$sClave = $_POST["clave"];
	$sAP = $_POST["aP"];
	$sAM = $_POST["aM"];
	$sGenero = $_POST["sex"];
	$sEmail = $_POST["correo"];
	$sArea = $_POST["area"];

	$sStatus = "";
	$sInfo = "";
	
	//Conexión
	$sDBServer = "localhost";
	$sDBName = "bdtarea1ajax";
	$sDBUserName = "root";
	$sDBPassword = "";
	
	$sSQL = "INSERT INTO tutores(`claveTutor`, `aPaterno`, `aMaterno`, `genero`, `area`,`correo`) VALUES ('$sClave','$sAP','$sAM','$sGenero','$sArea','$sEmail')";
	
	//Realizamos la conexión
	$oLink = mysql_connect($sDBServer,$sDBUserName,$sDBPassword);
	@mysql_select_db($sDBName) or $sInfo = "No se pudo abir la base de datos";
	
	if($sInfo==""){
		if($oResult = mysql_query($sSQL)){
			$sStatus = "Se ha agregado el tutor correctamente;
		}
		else{
			$sStatus = "Ocurrió un error al insertar el dato, el tutor no fue creado";
		}
	}
	
	mysql_close($oLink );	


?>

<script type="text/javascript">
	window.onload = function(){
		
		parent.saveResult("<?php echo $sStatus ?>");
		//top.frames["displayFrame"].saveResult("<?php echo $sStatus ?>");
	}
</script>


</head>

<body>
</body>
</html>
