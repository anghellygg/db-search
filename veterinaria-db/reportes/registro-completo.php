<?php
    
    $where = '';
    $edad = "";
    $animal = "";
    $medico = "";
    if (isset($_REQUEST["edad"]) || isset($_REQUEST["animal"]) || isset($_REQUEST["medico"])) {
        $tipo_filtro = $_REQUEST["tipo_filtro"];
        if (isset($_REQUEST["edad"]) ) {
            $edad = $_REQUEST["edad"];
            if ($edad != "") {
                $where = "WHERE p.edad = '$edad'";
            }
        }

        if (isset($_REQUEST["animal"]) ) {
            $animal = $_REQUEST["animal"];
            if ($animal != "") {
                if ($where == "") {
                    $where = "WHERE p.animal = '$animal'";
                }else {
                    $where = "$where $tipo_filtro p.animal = '$animal'";
                }
            }
        }
        if (isset($_REQUEST["medico"]) ) {
            $medico = $_REQUEST["medico"];
            if ($medico != "") {
                if ($where == "") {
                    $where = "WHERE r.medico = '$medico'";
                }else {
                    $where = "$where $tipo_filtro r.medico = '$medico'";
                }
            }
        }
    }

    $host = "localhost";
    $dbname = "veterinaria";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   //2. construir la sentencia sql
    $sql = "SELECT p.nombre, p.animal, p.edad, p.nombre_dueno, e.enfermedad,
     r.medico FROM pacientes as p JOIN registro r ON p.id = r.id_paciente JOIN 
     enfermedades e ON r.id_enfermedad = e.id $where ORDER BY p.nombre ASC";

    //3.preparar sentencia sql
    $q = $cnx->prepare($sql);

    //4. ejecutar la sentencia sql

    $result = $q->execute();

    $registros = $q->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de registros</title>

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
			<li><a href="../registro-paciente/crear-registro.php">REGISTRO</a></li>
			<li><a href="registro-completo.php">REPORTE DE ANIMALES</a></li>
            <li><a href="reporte-medico.php">REPORTE MEDICO</a></li>
        </ul>
	</nav>
	</header>


    <section id="main-content">

<form action="registro-completo.php">
<center>
<h3>Reporte de animales</h3>
Animal
<select name="animal">
        <option value="">seleccionar</option>
        <option value="0" <?php if($animal =="0"){ echo "selected";}  ?>>gato</option>
        <option value="1" <?php if($animal =="1"){ echo "selected";}  ?>>perro</option>
</select>
<br/><br/>
Edad
<input type="number" name="edad" value="<?php echo $edad; ?>">
<br/><br/>
Medico
<input type="text" name="medico" value="<?php echo $medico; ?>">
<br/><br/>
<p>Por favor seleccione:</p>
   <button type="submit" name="tipo_filtro" value="AND"> filtrar todo </button>
   <button type="submit" name="tipo_filtro" value="OR"> filtrar cualquiera </button>
</center>
</form>

            <center>
<h1>Lista de Registros</h1>
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
     <td>
        Enfermedad
     </td>
     <td>
        Medico
     </td>
    </tr>
    

<?php
    for($i =0; $i<count($registros); $i++) {
?>
    <tr>
    <td>
        <?php echo $registros[$i]["nombre"] ?>
 </td>
 <td>
 <?php 
    $animal = $registros[$i]["animal"];
    if($animal =="0"){
        echo "gato";
    }
    else{
        echo "perro";
    }
    ?>
 </td>
 <td>
 <?php echo $registros[$i]["edad"] ?>
 </td>
 <td>
 <?php echo $registros[$i]["nombre_dueno"] ?>
 </td>
 <td>
 <?php echo $registros[$i]["enfermedad"] ?>
 </td>
 <td>
 <?php echo $registros[$i]["medico"] ?>
 </td>
    </tr>
<?php
    }
?>
    </table>
    </center>
        <br>
    </section> 
</body>
</html>