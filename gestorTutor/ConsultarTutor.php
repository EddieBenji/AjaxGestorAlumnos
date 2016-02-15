<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Consultar información tutor</title>

<?php



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
			$sStatus = "No existe el tutor con el id = ".$sID;
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
