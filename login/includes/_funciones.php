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
	//feature
	case 'carga_foto':
	carga_foto();
	break;
	case 'consultar_features':
	consultar_features();
	break;
	case 'insertar_features':
	insertar_features();
	break;
	case 'eliminar_features':
	eliminar_features($_POST["id"]);
	break;
	case 'ceditar_features':
	ceditar_features($_POST["id"]);
	break;
	case 'editar_features':
	editar_features($_POST["id"]);
	break;
//testimonial
	case 'consultar_testimonials':
	consultar_testimonials();
	break;
	case 'insertar_testimonials':
	insertar_testimonials();
	break;
	case 'eliminar_testimonials':
	insertar_testimonials();
	break;
	case 'ceditar_testimonials':
	insertar_testimonials();
	break;
	case 'editar_testimonials':
	insertar_testimonials();
	break;
	//main
	break;
	case 'consultar_encabezado':
	consultar_encabezado();
	break;
	case 'insertar_header':
	insertar_encabezado();
	break;
	case 'eliminar_encabezado':
	eliminar_encabezado($_POST["id"]);
	break;
	case 'ceditar_encabezado':
	ceditar_encabezado($_POST["id"]);
	break;
	case 'editar_encabezado':
	editar_encabezado($_POST["id"]);
	break;

//**WORKS**//
	case 'consultar_works':
	consultar_works();
	break;
	case 'insertar_works':
	insertar_works();
	break;
		case 'eliminar_works':
	eliminar_works($_POST["id"]);
	break;
	case 'edit_works':
	ceditar_features($_POST["id"]);
	break;
	case 'editar_works':
	editar_works($_POST["id"]);
	break;

	//**OURTEAM**//
	case 'consultar_ourteam':
	consultar_ourteam();
	break;
	case 'insertar_ourteam':
	insertar_ourteam();
	break;
		case 'eliminar_ourteam':
	eliminar_ourteam($_POST["id"]);
	break;
	case 'ceditar_ourteam':
	ceditar_ourteam($_POST["id"]);
	break;
	case 'editar_ourteam':
	editar_ourteam($_POST["id"]);
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

//---------------------------------------------------------------------------------------------------------
													//MAIN//

function consultar_encabezado(){
	global $mysqli;
	$consulta = "SELECT * FROM main";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}


function insertar_encabezado(){
	global $mysqli;
	$TituMa = $_POST["titulo"];
	$SubtituMA = $_POST["subtitulo"];	
	$BotMA = $_POST["boton"];	
	$consultain = "INSERT INTO main VALUES('','$TituMa','$SubtituMA','$BotMA')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	
	echo "Se inserto Main en la BD"; //Imprime el JSON ENCODEADO
}





function eliminar_encabezado($id){
	global $mysqli;
	$consulta = "DELETE FROM main WHERE idMa = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function ceditar_encabezado($id){
	global $mysqli;
	$consulta = "SELECT * FROM main WHERE idMa = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_encabezado($id){
	global $mysqli;
	$TituMa = $_POST["titulo"];
	$SubtituMA = $_POST["subtitulo"];	
	$BotMA = $_POST["boton"];	
	$consultain = "UPDATE main SET TituMa = '$TituMa',SubtituMA = '$SubtituMA', BotMA = '$BotMA' WHERE idMa = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito Main correctamente";
}

//testimonial
function insertar_testimonials(){
	global $mysqli;
	$img_tes = $_POST["imagen"];
	$cita_tes = $_POST["cita"];	
	$persona_tes = $_POST["persona"];	
	$consultain = "INSERT INTO testimonials VALUES('','$img_tes','$cita_tes','$persona_tes')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	
	echo "Se inserto testimonials en la BD"; //Imprime el JSON ENCODEADO
}
function consultar_testimonials(){
	global $mysqli;
	$consulta = "SELECT * FROM testimonials";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function ceditar_testimonials($id){
	global $mysqli;
	$consulta = "SELECT * FROM testimonials WHERE id_tes = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}
function eliminar_testimonials($id){
	global $mysqli;
	$consulta = "DELETE FROM testimonials WHERE id_tes = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
	}

/////FEATURES
function consultar_features(){
	global $mysqli;
	$consulta = "SELECT * FROM features";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function insertar_features(){
	global $mysqli;
	$img_fe = $_POST["imagen"];
	$titulo_fe = $_POST["titulo"];	
	$subtitulo_fe = $_POST["subtitulo"];	
	$consultain = "INSERT INTO features VALUES('','$img_fe','$titulo_fe','$subtitulo_fe')";
	$resultadoin = mysqli_query($mysqli, $consultain);

	echo "Se inserto Feature en la BD"; //Imprime el JSON ENCODEADO
}


function eliminar_features($id){
	global $mysqli;
	$consulta = "DELETE FROM features WHERE id_fe = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function ceditar_features($id){
	global $mysqli;
	$consulta = "SELECT * FROM features WHERE id_usr = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_features($id){
	global $mysqli;
	$img_fe = $_POST["imagen"];
	$titulo_fe = $_POST["titulo"];	
	$subtitulo_fe = $_POST["subtitulo"];	
	$consultain = "UPDATE features SET img_fe = '$img_fe',titulo_fe= '$titulo_fe', subtitulo_fe = '$subtitulo_fe' WHERE id_fe = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito Feature correctamente";
}
function carga_foto(){
	if (isset($_FILES["foto"])) {
		$file = $_FILES["foto"];
		$nombre = $_FILES["foto"]["name"];
		$temporal = $_FILES["foto"]["tmp_name"];
		$tipo = $_FILES["foto"]["type"];
		$tam = $_FILES["foto"]["size"];
		$dir = "../img/usuarios/";
		$respuesta = [
			"archivo" => "img/usuarios/logotipo.png",
			"status" => 0
		];
		if(move_uploaded_file($temporal, $dir.$nombre)){
			$respuesta["archivo"] = "img/usuarios/".$nombre;
			$respuesta["status"] = 1;
		}
		echo json_encode($respuesta);
	}
}
//---------------------------------------------------------------------------------------------------------
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
/////OURTEAM
function consultar_ourteam(){
	global $mysqli;
	$consulta = "SELECT * FROM ourteam";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function insertar_ourteam(){
	global $mysqli;
	$imgou = $_POST["imagen"];
	$nomou = $_POST["nombre"];	
	$cargou = $_POST["cargo"];	
	$consultain = "INSERT INTO ourteam VALUES('','$imgou','$nomou','$cargou')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	 //Imprime el JSON ENCODEADO
	echo "Se inserto el usuario en la BD ";
	 //Imprime el JSON ENCODEADO
}
function eliminar_ourteam($id){
	global $mysqli;
	$consulta = "DELETE FROM ourteam WHERE idou = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	// print_r($resultado);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function ceditar_ourteam($id){
	global $mysqli;
	$consulta = "SELECT * FROM ourteam WHERE id_our = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_ourteam($id){
	global $mysqli;
	$img_our = $_POST["imagen"];
	$nombre_our = $_POST["nombre"];	
	$cargo_our = $_POST["cargo"];	
	$consultain = "UPDATE ourteam SET imgou = '$img_our', nomou = '$nombre_our', cargou = '$cargo_our' WHERE idou = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito Ourteam correctamente";
}
/////WORKS
function consultar_works(){
	global $mysqli;
	$consulta = "SELECT * FROM works";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function insertar_works(){
	global $mysqli;
	$imgWo = $_POST["imagen"];
	$priNameWo = $_POST["proyecto"];	
	$webWo = $_POST["website"];	
	$consultain = "INSERT INTO works VALUES('','$imgWo','$priNameWo','$webWo')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	echo "Se inserto el usuario en la BD ";//Imprime el JSON ENCODEADO
}
function eliminar_works($id){
	global $mysqli;
	$consulta = "DELETE FROM works WHERE idWo = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	// print_r($resultado);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function edit_works($id){
	global $mysqli;
	$consulta = "SELECT * FROM works WHERE idWo = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);

	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_works($id){
	global $mysqli;
	$imgwo = $_POST["imagen"];
	$prinamewo = $_POST["proyecto"];	
	$webwo = $_POST["website"];	
	$consultain = "UPDATE works SET imgwo = '$imgwo', prinamewo = '$prinamewo', webwo = '$webwo' WHERE idwo= $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito el Work correctamente";
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