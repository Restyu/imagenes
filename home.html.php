<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Lista de fotos</h1>
	<?php foreach ($fotos as $foto): ?>
		<h2><?=$foto['titulo']?></h2>
		<img src="<?php  echo "http://localhost:8080/galeria/imagenes/".$foto['ruta']?>" alt="">
	} ?>
</body>
</html>