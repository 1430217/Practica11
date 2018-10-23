<div class="page-header">
  <h1>Listado de libros <small>En esta seción podrá editar y eliminar libros.</small></h1>
</div>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Listado de libros</h3>
  </div>
  <div class="panel-body">
    <!-- inicio del panel-->
    <div class="row">
    <div class="col-xs-12">
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Descripción</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
          <tbody>
            <?php
              $mvc = new MvcController();
              $mvc->getLibrosController();
              $mvc->borrarLibro();
            ?>
          </tbody>
        </table>
      </div>
  </div>
  <!-- final del panel-->
  </div>
</div>

<?php
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'cambio')
			echo 'Libro actualizado';
	}
?>

