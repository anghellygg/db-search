<?php
    $paciente = $_REQUEST["paciente"];
    $enfermedades = $_REQUEST["enfermedades"];
    $medico = $_REQUEST["medico"];

    //1. conectar a la base de datos
    $host = "localhost";
    $dbname = "veterinaria";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   //2. construir la sentencia sql
    $sql = "INSERT INTO registro (id, id_paciente, id_enfermedad, medico) VALUES(NULL, '$paciente', '$enfermedades', '$medico')";

    //3.preparar sentencia sql
    $q = $cnx->prepare($sql);

    //4. ejecutar la sentencia sql

    $result = $q->execute();

    if($result){
        echo "registro hecho correctamente";
    }
    else{
        echo "hubo un error al registrar el paciente $paciente";
    }
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
<h1>El paciente ha sido registrado correctamente</h1>
    <table border = "1">
    <tr>
     <td>
        Id del paciente
     </td>
     <td>
        Id de la enfermedad
     </td>
     <td>
        Medico
     </td>
    </tr>

    <tr>
    <td>
        <?php echo  $paciente ?>
    </td>
    <td>
        <?php echo  $enfermedades ?>
    </td>
    <td>
        <?php echo  $medico ?>
    </td>
    </tr>
    </center>
    <br>
    </section>
</body>
</html>