<?php
    $host = "localhost";
    $dbname = "veterinaria";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $sql = "SELECT id, nombre FROM pacientes";

    $q = $cnx->prepare($sql);
    $result = $q->execute();
    $pacientes = $q->fetchAll();

    $sql = "SELECT id, enfermedad FROM enfermedades";
   
    $q = $cnx->prepare($sql);
    $result = $q->execute();
    $enfermedades = $q->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crear registro</title>
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
            <li><a href="../crear-paciente.php">PACIENTE</a></li>
			<li><a href="crear-registro.php">REGISTRO</a></li>
			<li><a href="../reportes/registro-completo.php">REPORTE DE ANIMALES</a></li>
            <li><a href="../reportes/reporte-medico.php">REPORTE MEDICO</a></li>
        </ul>
	</nav>
	</header>

    <section id="main-content">
            <header>
                <h1>PACIENTE</h1>
               <center><h2>Crear registro</h2></center> 
            </header>

            <center>
    <form action="guardar-registro.php" method="POST">
        paciente 
        <select name="paciente" id="">
<?php
            for($i=0; $i<count($pacientes); $i++){
?>
            <option value="<?php echo $pacientes[$i]["id"] ?>">
                <?php echo $pacientes[$i]["nombre"] ?>
                </option>
<?php
            }
?>
        </select>
        <br/>
        enfermedades 
        <select name="enfermedades" id="">
<?php
            for($i=0; $i<count($enfermedades); $i++){
?>
            <option value="<?php echo $enfermedades[$i]["id"] ?>">
                <?php echo $enfermedades[$i]["enfermedad"] ?>
                </option>
<?php
            }
?>
        </select>
        <br/>
        Medico <input type="text" name="medico"> <br/>
        
        <input type="submit" value="Registrado">
        </center>
        <br>
    </section>
</body>
</html>