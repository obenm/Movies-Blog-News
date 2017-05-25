<?php
if(isset($_POST['enviar']))
{
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$sexo = $_POST['sexo'];
	$pais = $_POST['pais'];
	$estado = $_POST['estado'];
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['mensaje'];
	
	$con = mysqli_connect("localhost", "root", "1243");
	if (!$con){
		echo "<script language=’JavaScript’>alert('Error de Conexión con MySQL');</script>";
		//die('ERROR DE CONEXION CON MYSQL:' . mysqli_error());
	}
	
	$database = mysqli_select_db($con, "bd_peliiiiiiiculas");
	if (!$database){
		echo "<script language=’JavaScript’>alert('Error de Conexión con la Base de Datos');</script>";
		//die('ERROR CONEXION CON BD:' . mysql_error());
	}
	
	$sql = "INSERT INTO tbl_contacto (nombre, apellidos, correo, telefono, sexo, pais, estado, asunto, mensaje)
		VALUES ('" . $nombre . "', '" . $apellido . "', '" . $correo . "', '" . $telefono . "', '" . $sexo . "', '" . $pais . "', '" . $estado . "', '" . $asunto . "', '" . $mensaje . "')";
		
	$result = mysqli_query($con, $sql);
	if (!$result){
		echo "<script language=’JavaScript’>alert('La Consulta SQL contiene Errores');</script>";
		//die("La consulta SQL contiene errores." . mysql_error());
	}
	
	mysqli_close($con);
	echo "<script language=’JavaScript’>alert('Enviado Correctamente');</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Envío - Pagina Peliculas</title>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
		<link href="../icono.ico" type="image/x-icon" rel="shortcut icon" />
		<script src="js/jquery-1.11.1.js"></script>
		<script type="text/javascript">
				$(document).ready(function() {
					var bgs = ["url('../img/bg_Dragons2.jpg')", "url('../img/bg_Malefica.jpg')", "url('../img/bg_BajoMismaEstrella.jpg')", "url('../img/bg_FiloTomorrow.jpg')", "url('../img/bg_Xmen.jpg')", "url('../img/bg_HateLove.jpg')", "url('../img/bg_TresDias.jpg')", "url('../img/bg_Philomena.jpg')"];
					escogerBackground();
					function escogerBackground(){
						var rand = Math.floor(Math.random() * 8);
						$("body").css("background-image", bgs[rand]);
					}
				});
		</script>
	</head>

	<body>
		<div id="contenedor">
			<div id="cabecera">
				<a href="../index.html"><div id="logo"></div></a>
				<div id="menu">
					<ul>
						<li><a href="../index.html">Inicio</a>
							<ul>
								<li><a href="../index.html">Pagina Principal</a></li>
								<li><a href="../mapa-de-sitio.html">Mapa de Sitio</a></li>
							</ul>
						</li>
						<li><a href="../noticias.html">Noticias</a></li>
						<li><a href="../cartelera.html">Cartelera</a>
							<ul>
								<li><a href="../peliculas/como-entrenar-a-tu-dragon.html">Cómo Entrenar a tu Dragón 2</a></li>
								<li><a href="../peliculas/malefica.html">Malefica</a></li>
								<li><a href="../peliculas/bajo-la-misma-estrella.html">Bajo la Misma Estrella</a></li>
								<li><a href="../peliculas/al-filo-del-manana.html">Al Filo del Mañana</a></li>
								<li><a href="../peliculas/xmen-dias-del-futuro-pasado.html">X-Men: Días Del Futuro Pasado</a></li>
								<li><a href="../peliculas/odio-el-amor.html">Odio el Amor</a></li>
								<li><a href="../peliculas/tres-dias-para-matar.html">Tres Días para Matar</a></li>
								<li><a href="../peliculas/philomena.html">Philomena</a></li>
							</ul>
						</li>
						
						<li><a href="envio.php">Contacto</a>
							<ul>
								<li><a href="envio.php">Envía</a></li>
								<li><a href="consulta.html">Consulta</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<div id="mapaSitio"><a href="../mapa-de-sitio.html">Mapa de Sitio</a></div>
			</div>
			<div id="contenido">
				<div id="contenido_pagina">
					<div id="pagina_contenido">

						<div id="contenido_titulo">
							<h1>Email</h1>
						</div>
					
						<form name="form" action="envio.php" method="POST">
							<fieldset>
								<legend>Datos personales</legend>
								Nombre <br />
								<input type="text" name="nombre" value="" />
								<br />
								Apellido <br />
								<input type="text" name="apellido" value="" />
								<br />
								Correo <br />
								<input type="text" name="correo" value="" />
								<br />
								Telefono <br />
								<input type="text" name="telefono" value="" />
								<br />
								Sexo <br />
								<input type="radio" name="sexo" value="hombre" /> Hombre
								<input type="radio" name="sexo" value="mujer" /> Mujer
							</fieldset>
							
							<br />
							<fieldset>
								<legend>Datos de lugar</legend>
								<label for="pais">Pais<label><br />
								<select id="pais" name="pais">
									<option value="" selected="selecciona">-Seleccona un pais-</option>
									<option value="">Mexico</option>
									<option value="">Estados Unidos</option>
									<option value="">China</option>
								</select>
								
								<br/>				
								<label for="estado">Estado</label><br />
								<select id="estado" name="estado">
									<option value="" selected="selecciona">-Seleccona un pais-</option>
									<option value="">Nayarit</option>
									<option value="">Colima</option>
									<option value="">Jalisco</option>
									<option value="">Chihuahua</option>
									<option value="">Veracruz</option>
									<option value="">Tabasco</option>
									<option value="">Guerrero</option>
									<option value="">Oaxaca</option>
									<option value="">Chiapas</option>
									<option value="">Yucatan</option>
									<option value="">Campeche</option>
									<option value="">Quintana Roo</option>
									<option value="">Tlaxcala</option>
									<option value="">Nuevo Leon</option>
									<option value="">Guanajuato</option>
									<option value="">San Luis Potosi</option>
									<option value="">Puebla</option>
									<option value="">Aguascalientes</option>
									<option value="">Zacatecas</option>
									<option value="">Estado de Mexico</option>
									<option value="">Hidalgo</option>
									<option value="">Distrito Federal</option>
									<option value="">Morelos</option>
									<option value="">Sinaloa</option>
									<option value="">Baja California</option>
									<option value="">Baja California Sur</option>
									<option value="">Coahuila</option>
									<option value="">Durango</option>
									<option value="">Sonora</option>			
									<option value="">Tamaulipas</option>
									<option value="">Queretaro</option>
									<option value="">Michoacan</option>
								</select>
								
							</fieldset>
							
							<br />
							<fieldset>
								<legend>Mensaje</legend>
								Asunto <br />
								<input type="text" name="asunto" value="" size="80" />
								<br />
								Mensaje <br />
								<textarea name="mensaje" cols="61" rows="5"></textarea>								
							</fieldset>
							
							<br />
							<input type="submit" name="enviar" value="Enviar" />
						</form>

					</div>
					<div id="pagina_barraLateral">
						<div id="barraLateral_anuncio">
							<img src="../img/publicidad.jpg" />
						</div>
					</div>
				</div>
				<div id="contenido_pagPeliculaComentarios">
					
				</div>
			</div>
			<div id="pie">
				<div id="pie_contador">
					<span>Contador de visitas: </span>
					<script type="text/javascript" src="http://counter3.statcounterfree.com/private/countertab.js?c=642310116f463d4659a969504937ad7e"></script>
				</div>
			</div>
		</div>	
	</body>
</html>
