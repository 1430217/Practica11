<?php 
	session_start();
	if (!$_SESSION['sesion']) {
		header('location:index.php?action=login');
		exit();
	}
?>

<div class="page-header">
  <h1>Editar libro <small>En esta pagina se podrá editar la información del libro.</small></h1>
</div>

<form method="post">
	<?php 
		$editar = new MvcController();
		$editar->getlibro(); //Se llama la funcion del controller para buscar un libro
		$editar->actualizarLibroController(); //Funcion para actualizar el libro
	?>
</form>

