<?php 
require_once("db.php");
switch ($_POST["accion"]) {
	case 'login':
	login();
	break;
	case 'consultar_usuarios':
	consultar_usuarios();
	break;
	case 'insertar_usuarios':
	insertar_usuarios();
	break;
	default:
	break;
	case 'insertar_testimonials':
	insertar_testimonials();
	break;
	case 'consultar_download':
	consultar_download();
	break;
	case 'insertar_download':
	insertar_download();
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
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function insertar_usuarios(){
	global $mysqli;
	$nombre_usr = $_POST["nombre"];
	$correo_usr = $_POST["correo"];	
	$password = $_POST["password"];	
	$telefono_usr = $_POST["telefono"];	
	$consultain = "INSERT INTO usuarios VALUES('','$nombre_usr','$correo_usr','$password', '$telefono_usr', 1)";
	$resultadoin = mysqli_query($mysqli, $consultain);
	$arregloin = [];
	while($filain = mysqli_fetch_array($resultadoin)){
		array_push($arregloin, $filain);
	}
	echo json_encode($arregloin); //Imprime el JSON ENCODEADO
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
	$testimonial_imagen = $_POST["imagen"];
	$testimonial_cita = $_POST["cita"];	
	$testimonial_persona = $_POST["persona"];	
	$consultain = "INSERT INTO testimonial VALUES('','$testimonial_imagen','$testimonial_cita','$testimonial_persona')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	$arregloin = [];
	while($filain = mysqli_fetch_array($resultadoin)){
		array_push($arregloin, $filain);
	}
	echo json_encode($arregloin); //Imprime el JSON ENCODEADO
}


function consultar_download(){
	global $mysqli;
	$consulta = "SELECT * FROM download";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function insertar_download(){
	global $mysqli;
	$download_titulo = $_POST["titulo"];
	$download_subtitulo = $_POST["subtitulo"];	
	$download_boton = $_POST["boton"];	
	$consultain = "INSERT INTO download VALUES('','$download_titulo','$download_subtitulo','$download_boton')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	$arregloin = [];
	while($filain = mysqli_fetch_array($resultadoin)){
		array_push($arregloin, $filain);
	}
	echo json_encode($arregloin); //Imprime el JSON ENCODEADO
}





	function login(){
		global $mysqli;
		// Conectar a Base de Datos.
		$correo = $_POST["correo"];
		$pass = $_POST["password"];	
		// Consultar a Base de Datos que exista el usuario.
		$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo'";
		$resultado = $mysqli->query($consulta);
		$fila = $resultado->fetch_assoc();
		
		if ($fila == 0) 
			{
				// 	Si el usuario no existe imprimir = 2
				echo "El usuario no existe [ERROR-02]";

			}

			// 	Si el usuario existe, conusltar que el password sea correcto. 
		else if ($fila["password"] != $pass) 
			{
				$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo' AND password = '$pass'";
				$resultado = $mysqli->query($consulta);
				$fila = $resultado->fetch_assoc();
				// 			Si el password no es correcto, imprimir codigo de erorres = 0.
				echo "El Password es Incorrecto [ERROR-00]";

				
			}
				else if($correo == $fila["correo_usr"] && $pass == $fila["password"])
				{
					// 			Si el password es correcto imprimir = 1 
					echo "El Usuario y Password son Correctos [ACESSO-01]"	;
					
				}
			}

?>