<?php
    $nombre = $_REQUEST["nombre"];
    $animal = $_REQUEST["animal"];
    $edad = $_REQUEST["edad"];
    $dueño = $_REQUEST["dueño"];

    //1. conectar a la base de datos
    $host = "localhost";
    $dbname = "veterinaria";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   //2. construir la sentencia sql
    $sql = "INSERT INTO pacientes (id, nombre, animal, edad, nombre_dueno) VALUES(NULL, '$nombre', '$animal', '$edad', '$dueño')";

    //3.preparar sentencia sql
    $q = $cnx->prepare($sql);

    //4. ejecutar la sentencia sql

    $result = $q->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paciente</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link rel="stylesheet" href="css/styles2.css" type="text/css">
</head>
<body>

<header id="main-header">
		<a id="logo-header" href="">
			<span class="site-name">Huellitas de amor</span>
            <span class="site-desc">"Siempre al cuidado de tu mascota"</span>
		</a>
	<nav>
		<ul>
            <li><a href="crear-paciente.php">PACIENTE</a></li>
			<li><a href="registro-paciente/crear-registro.php">REGISTRO</a></li>
			<li><a href="reportes/registro-completo.php">REPORTE DE ANIMALES</a></li>
           <li><a href="reportes/reporte-medico.php">REPORTE MEDICO</a></li>
        </ul>
	</nav>
	</header>

    <section id="main-content">
    <center>
<h1>El paciente ha sido creado correctamente</h1>
    <table border = "1">
    <tr>
     <td>
        Nombre del Paciente
     </td>
     <td>
        Tipo de Animal
     </td>
     <td>
        Edad
     </td>
     <td>
        Nombre del Dueño
     </td>
    </tr>

    <tr>
    <td>
        <?php echo  $nombre ?>
    </td>
    <td>
        <?php echo  $animal ?>
    </td>
    <td>
        <?php echo  $edad ?>
    </td>
    <td>
        <?php echo  $dueño ?>
    </td>
    </tr>
    </center>
    <br>
    </section>
</body>
</html>