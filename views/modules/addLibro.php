<div class="page-header">
  <h1>Agregar un libro <small>En esta seción podrá agregar libros a la base de datos.</small></h1>
</div>


<div>
    <form method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nombre del libro" name="title">
        <span class="glyphicon glyphicon-text-size form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Autor del libro" name="author">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <textarea name="description" class="form-control" placeholder="Descripción del libro" cols="30" rows="10"></textarea>
        <span class="glyphicon glyphicon-comment form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Agregar Libro</button>
        </div>
      </div>
    </form>
</div>

<?php
    $mvc = new MvcController();
    $mvc->addLibroController();
?>