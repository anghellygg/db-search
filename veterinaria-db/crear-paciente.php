<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear paciente</title>
    <title>ACTUALIDAD</title>
   
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
            <header>
                <h1>PACIENTE</h1>
               <center><h2>Crear paciente</h2></center> 
            </header>

            <center>
            <form action="guardar-paciente.php" method="POST">
        Nombre <input type="text" name="nombre"> <br/>
        Dueño <input type="text" name="dueño"> <br/>
        Animal    
            <input type="radio" name="animal" value="0"> gato 
            <input type="radio" name="animal" value="1"> perro <br/>
        Edad
        <select name="edad">
            <option value="1">Uno</option>
            <option value="2">dos</option>
            <option value="3">tres</option>
            <option value="4">cuatro</option>
            <option value="5">cinco</option>
            <option value="6">seis</option>
            <option value="7">siete</option>
            <option value="8">ocho</option>
            <option value="9">nueve</option>
            <option value="10">diez</option>
            <option value="11">once</option>
            <option value="12">doce</option>
            <option value="13">trece</option>
        </select>
        <br/>
        <input type="submit" value="Guardar paciente">
        </center>
        <br>
    </section> 


</body>
</html>