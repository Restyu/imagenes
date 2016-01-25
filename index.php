<?php 

require_once 'data.php';

try{
	$pdo = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES utf8');

}catch(PDOException $e){
	die('Error de conexión a la base de datos: '. $e->getMessage());
}

$base_path = $_SERVER['DOCUMENT_ROOT'].'/galeria/';
$base_imagen_path = $base_path . "imagenes/";


if (isset($_GET['add'])) {
	
	$titulo = $_POST['titulo'];

	$file_name = $_FILES['imagen']['name'];
	$file_size = $_FILES['imagen']['size'];
	$file_tmp = $_FILES['imagen']['tmp_name'];
	$file_type = $_FILES['imagen']['type'];
	$file_error = $_FILES['imagen']['error'];

	echo $titulo;
	echo $file_name;

	try {

	$sql = "INSERT INTO galeria (titulo,ruta) values (:titulo , :ruta)";
		
		$ruta = $base_path.'imagenes/'.$file_name;
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':titulo', $titulo);
		$ps->bindValue(':ruta', $file_name);
		$ps->execute();
	
	} catch (Exception $e) {

	die ("no se ha podido enviar la imagen");

	}	

	move_uploaded_file($file_tmp, $base_imagen_path . $file_name);

}else{

	require_once('formulario.html.php');
}

try{
	$sql = 'SELECT * FROM galeria';
	$ps = $pdo->prepare($sql);
	$ps->execute();
}catch(PDOException $e) {
	die("No se ha podido extraer información de la base de datos:". $e->getMessage());
}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$fotos[] = $row;
}

 ?>