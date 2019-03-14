<?php 
require_once("_db.php");
switch ($_POST["accion"]) {
	case 'login':
	login();
	break;
	//usuarios
	case 'consultar_usuarios':
	consultar_usuarios();
	break;
	case 'insertar_usuarios':
	insertar_usuarios();
	break;
	case 'editar_usuarios':
		editar_usuarios($_POST["id"]);
	break;
	case 'editar_registro':
		editar_registro($_POST["id"]);
	break;
	case 'eliminar_registro':
		eliminar_usuarios($_POST["id"]);
	break;
	//main

	case 'consultar_encabezado':
	consultar_encabezado();
	break;
	case 'insertar_encabezado':
	insertar_encabezado();
	break;
//**TESTIMONIALS**//
	case 'consultar_testimonials':
	consultar_testimonials();
	break;
	case 'insertar_testimonials':
	insertar_testimonials();
	break;
		case 'eliminar_testimonials':
	eliminar_testimonials($_POST["id"]);
	break;
	case 'ceditar_testimonials':
	ceditar_testimonials($_POST["id"]);
	break;
	case 'editar_testimonials':
	editar_testimonials($_POST["id"]);
	break;

	//**CARGA FOTO**//
	case 'carga_foto':
	carga_foto();
	break;

	
	//**dowloads**//
	case 'consultar_dowloads':
	consultar_dowloads();
	break;
	case 'insertar_dowloads':
	insertar_dowloads();
	break;
		case 'eliminar_dowloads':
	eliminar_dowloads($_POST["id"]);
	break;
	case 'ceditar_dowloads':
	ceditar_dowloads($_POST["id"]);
	break;
	case 'editar_dowloads':
	editar_dowloads($_POST["id"]);
	break;
	default:
	break;
}
function consultar_usuarios(){
	global $mysqli;
	$consulta = "SELECT * FROM usuarios";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); 
}

function editar_usuarios($id){
	global $mysqli;
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];	
	$password = $_POST["password"];	
	$telefono = $_POST["telefono"];	
	$consulta = "UPDATE usuarios SET nombre_usr = '$nombre', correo_usr = '$correo', password = '$password', telefono_usr = '$telefono' WHERE id_usr = $id";
	$resultado = mysqli_query($mysqli, $consulta);
    echo "Se edito el usuario correctamente";

}
function editar_registro($id){
    global $mysqli;
    $consulta = "SELECT * FROM usuarios WHERE id_usr = '$id'";
    $resultado = mysqli_query($mysqli,$consulta);
    
    $fila = mysqli_fetch_array($resultado);
    echo json_encode($fila);
  }

function eliminar_usuarios($id){
	global $mysqli;
	$consulta = "DELETE FROM usuarios WHERE id_usr =$id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elmino correctamente";
		# code...
	}else{
		echo "Se genero un error intenta nuevamente";
	}
}

function insertar_usuarios(){
	global $mysqli;
	$nombre_usr = $_POST["nombre"];
	$correo_usr = $_POST["correo"];	
	$password= $_POST["password"];	
	$telefono_usr = $_POST["telefono"];	
	$consul1 = "INSERT INTO usuarios VALUES('','$nombre_usr','$correo_usr','$password', '$telefono_usr', 1)";
	$resul1 = mysqli_query($mysqli, $consul1);
		echo "Se inserto el usuario en la BD ";
		
}

function consultar_testimonials(){
	global $mysqli;
	$consulta = "SELECT * FROM testimonial";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function insertar_testimonials(){
	global $mysqli;
	$img_tes = $_POST["imagen"];
	$cita_tes = $_POST["cita"];	
	$persona_tes = $_POST["persona"];	
	$consultain = "INSERT INTO testimonial VALUES('','$img_tes','$cita_tes','$persona_tes')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	$arregloin = [];
	while($filain = mysqli_fetch_array($resultadoin)){
		array_push($arregloin, $filain);
	}
	echo json_encode($arregloin); //Imprime el JSON ENCODEADO
}
function eliminar_testimonials($id){
	global $mysqli;
	$consulta = "DELETE FROM testimonial WHERE id_tes = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function editar_testimonials($id){
	global $mysqli;
	$consulta = "SELECT * FROM testimonial WHERE id_tes = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function ceditar_testimonials($id){
	global $mysqli;
	$img_tes = $_POST["imagen"];
	$cita_tes = $_POST["cita"];	
	$persona_tes = $_POST["persona"];	
	$consultain = "UPDATE testimonial SET img_tes = '$img_tes',cita_tes = '$cita_tes', persona_tes = '$persona_tes' WHERE id_tes = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito el testimonial correctamente";
}
/////dowloads 

function consultar_dowloads(){
	global $mysqli;
	$consulta = "SELECT * FROM dowloads";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); 
}

function insertar_dowloads(){
	global $mysqli;
	$tituDo = $_POST["titulo"];
	$subtituDo = $_POST["subtitulo"];	
	$consultain = "INSERT INTO dowloads VALUES('','$tituDo','$subtituDo')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	  echo "se inserto el usuario en la bd";

	
}
function eliminar_dowloads($id){
	global $mysqli;
	$consulta = "DELETE FROM dowloads WHERE idDo = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}

}
function ceditar_dowloads($id){
	global $mysqli;
	$consulta = "SELECT * FROM dowloads WHERE idDo = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}
function editar_dowloads($id){
	global $mysqli;
	$titulo = $_POST["titulo"];
	$subtitulo = $_POST["subtitulo"];	
	$consultain = "UPDATE dowloads SET tituDo = '$titulo',subtituDo = '$subtitulo'
	WHERE idDo = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito dowloads correctamente";
}
function carga_foto(){
	if (isset($_FILES["foto"])) {
		$file = $_FILES["foto"];
		$nombre = $_FILES["foto"]["name"];
		$temporal = $_FILES["foto"]["tmp_name"];
		$tipo = $_FILES["foto"]["type"];
		$tam = $_FILES["foto"]["size"];
		$dir = "../img/logotipo.png/";
		$respuesta = [
			"archivo" => "img/logotipo.png",
			"status" => 0
		];
		if(move_uploaded_file($temporal, $dir.$nombre)){
			$respuesta["archivo"] = "img/logotipo.png/".$nombre;
			$respuesta["status"] = 1;
		}
		echo json_encode($respuesta);
	}
}
function login(){
		global $mysqli;

		$correo = $_POST["correo"];
		$pass = $_POST["password"];	

		$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo'";
		$resultado = $mysqli->query($consulta);
		$fila = $resultado->fetch_assoc();
		
		if ($fila == 0) 
			{

				echo "[2]";

			}


		else if ($fila["password"] != $pass) 
			{
				$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo' AND password = '$pass'";
				$resultado = $mysqli->query($consulta);
				$fila = $resultado->fetch_assoc();

				echo "[0]";

				
			}
				else if($correo == $fila["correo_usr"] && $pass == $fila["password"])
				{

					echo "[1]"	;
					session_start();
					error_reporting(0);

					$_SESSION['usuarios']=$correo;
					echo $correo;
					echo $_SESSION['usuarios'];
  					
					
				}
			}

?>