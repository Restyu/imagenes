<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>añadir foto</title>
</head>
<body>
	<h1>subir imagen</h1>

	<form action="?add" method="post" enctype="multipart/form-data">
		<div>
			<label for="titulo">titulo</label>
			<input type="text" name="titulo" value="">
		</div>
		<div>
			<label for="imagen">imagen</label>
			<input type="file" name="imagen" id="imagen" value="">
		</div>
		<div>
			<button type="submit">enviar</button>
		</div>
	</form>
</body>
</html>