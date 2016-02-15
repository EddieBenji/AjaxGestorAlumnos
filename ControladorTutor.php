
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Crear nuevo tutor</title>
<?php


	$accion = $_POST["accion"];

	switch ($accion) {
		case 1:
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
			$sStatus = "Se ha agregado el tutor correctamente";
		}
		else{
			$sStatus = "Ocurrió un error al insertar el dato, el tutor no fue creado";
		}
	}
	
	mysql_close($oLink );	
			break;
		case 2:
			$sClave = $_POST["clave"];
	$sInfo = "";
	$sDBServer = "localhost";
	$sDBName = "bdtarea1ajax";
	$sDBUserName = "root";
	$sDBPassword = "";
	$sStatus = "";
	//Creamos el SQL Query
	$sQuery = "Select * from  tutores where claveTutor = ".$sClave;
	
	//Realizamos la conexión
	$oLink = mysql_connect($sDBServer,$sDBUserName,$sDBPassword);
	@mysql_select_db($sDBName) or $sInfo = "No se pudo abir la base de datos";
	
	if($sInfo == ""){
		if($oResult = mysql_query($sQuery) and mysql_num_rows($oResult)>0){
			$aValues = mysql_fetch_array($oResult,MYSQL_ASSOC);
			$sStatus = $aValues['claveTutor'] . "<br>" . $aValues['aPaterno'] . "<br>" .
                        $aValues['aMaterno'] . "<br>" . $aValues['genero'] . "<br>" .
                        $aValues['area'] . "<br>" . $aValues['correo'] .
                        "<br>" . "Consulta Exitosa";
			
		}
		else{
			$sStatus = "No existe el tutor con la clave = ".$sClave;
		}
	}
	
	mysql_close($oLink );
			break;
		case 3:
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
	
	$sSQL = "Update `tutores` Set `claveTutor`='$sClave', `aPaterno`='$sAP', `aMaterno`='$sAM', `genero`='$sGenero', `area`='$sArea', `correo`='$sEmail' Where claveTutor = " . $sClave;

	$sql = "Select * From tutores where claveTutor = " . $sClave;
	
	//Realizamos la conexión
	$oLink = mysql_connect($sDBServer,$sDBUserName,$sDBPassword);
	@mysql_select_db($sDBName) or $sInfo = "No se pudo abir la base de datos";


	if($oResult = mysql_query($sql) and mysql_num_rows($oResult)>0){
		if($sInfo==""){
		if($oResult = mysql_query($sSQL)){
			$sStatus = "Se ha actualizado el tutor correctamente";
		}
		else{
			$sStatus = "Ocurrió un error al actualizar el tutor.";
		}
	}
	
	mysql_close($oLink );
	}else{
		$sStatus = "No existe el tutor a actualizar con la clave = ".$sClave;
	}
	
		
			break;
		case 4:
			$sClave = $_POST["clave"];
	
	
	$sStatus = "";
	$sInfo = "";
	
	//Conexión
	$sDBServer = "localhost";
	$sDBName = "bdtarea1ajax";
	$sDBUserName = "root";
	$sDBPassword = "";
	
	$sSQL = "Delete From tutores where claveTutor = " . $sClave;


	$sql = "Select * From tutores where claveTutor = " . $sClave;
	
	//Realizamos la conexión
	$oLink = mysql_connect($sDBServer,$sDBUserName,$sDBPassword);
	@mysql_select_db($sDBName) or $sInfo = "No se pudo abir la base de datos";
	if($oResult = mysql_query($sql) and mysql_num_rows($oResult)>0){
		if($sInfo==""){
		if($oResult = mysql_query($sSQL)){
			$sStatus = "Se ha eliminado el tutor correctamente";
		}
		else{
			$sStatus = "Ocurrió un error al eliminar el tutor. Tutor no eliminado";
		}
	}
	
	mysql_close($oLink );	
	}else{
		$sStatus = "No existe el tutor a eliminar con la clave = ".$sClave;
	}
	
			break;
		
		default:
			
			break;
	}
	
	


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
