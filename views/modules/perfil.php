<?php 
	session_start();
	if (!$_SESSION['sesion']) {
		header('location:index.php?action=login');
		exit();
	}
?>

<div class="page-header">
  <h1>Perfil de usuario <small>En esta pagina se podrá editar la información del perfil.</small></h1>
</div>

<form method="POST">
	<?php 
		$editar = new MvcController();
		$editar->getUsuario(); //Se llama la funcion del controller para buscar un libro
		$editar->actualizarUsuarioController(); //Funcion para actualizar el libro
	?>
</form>
