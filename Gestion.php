<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if ($_SESSION["valida"] == false) {
    header('Location: login.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Login</title>
    </head>
    <link rel="stylesheet" type="text/css" href="css/tarea1.css">
    <script type="text/javascript">

        function gestionAlumnos() {
            window.location = "gestionAlumnos.php";
        }

        function gestionTutores() {
            window.location = "gestionTutores.php";
        }
        function cerrarSesion() {
            window.location = "login.php";
        }
    </script>


    <body>

        <!--Formulario a rellenar-->
        <div id="login">
            <h1>Seleccione</h1>
            <form id="menu">


                <input class="gestionBtn" type="button" value="Gestionar Alumnos" onclick="gestionAlumnos();"> 
                </br></br></br>
                <input class="gestionBtn" type="button" value="Gestionar Tutores" onclick="gestionTutores();"> 

                </br></br></br>
                <input class="gestionBtn" type="button" value="Cerrar Sesion" onclick="cerrarSesion();"> 

            </form>
        </div>
    </body>
</html>


