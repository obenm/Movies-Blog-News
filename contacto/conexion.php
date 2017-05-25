<?php
if(isset($_POST['enviar'])){
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$sexo = $_POST['sexo'];
	$pais = $_POST['pais'];
	$estado = $_POST['estado'];
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['mensaje'];
	
	$resultado;
	$id_resultado;
	
	$con = mysqli_connect("localhost", "root", "123");
	if (!$con){
		$resultado = 1;
		//die('ERROR DE CONEXION CON MYSQL:' . mysqli_error());
	}
	
	$database = mysqli_select_db($con, "bd_peliiiiiiiculas");
	if (!$database){
		$resultado = 2;
		//die('ERROR CONEXION CON BD:' . mysql_error());
	}
	
	$sql = "INSERT INTO tbl_contacto (nombre, apellidos, correo, telefono, sexo, pais, estado, asunto, mensaje)
		VALUES ('" . $nombre . "', '" . $apellido . "', '" . $correo . "', '" . $telefono . "', '" . $sexo . "', '" . $pais . "', '" . $estado . "', '" . $asunto . "', '" . $mensaje . "')";
		
	$result = mysqli_query($con, $sql);
	if (!$result){
		$resultado = 3;
		//die("La consulta SQL contiene errores." . mysql_error());
	}
	$resultado = 4;
	
	$sql = "SELECT id_contacto FROM tbl_contacto ORDER BY id_contacto DESC";
		
	$result = mysqli_query($con, $sql);
	if (!$result){
		$resultado = 3;
		//die("La consulta SQL contiene errores." . mysql_error());
	}
	$contador = 0;
	while($row = mysqli_fetch_array($result)) {
		if($contador < 1){
			$id_resultado = $row['id_contacto'];
			$contador++;
		}
		else break;
	}
	
	mysqli_close($con);
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
						
						<li><a href="envio.html">Contacto</a>
							<ul>
								<li><a href="envio.html">Envía</a></li>
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
							<h1>Envío</h1>
						</div>
                        <div id="contenido_resultado">
						<?php
							if($resultado == 1){
								echo "Error de Conexión con MySQL";
							}
							else if($resultado == 2){
								echo "Error de Conexión con la Base de Datos";
							}
							else if($resultado == 3){
								echo "Error de Consulta SQL";
							}
							else if($resultado == 4){
								echo "<b>Datos Registrados Correctamente</b><br/><br/>";
								echo "Tu numero de mensaje es:" . $id_resultado;
							}
							else{
								echo "Ups";
							}
						?>
                        </div>
						

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