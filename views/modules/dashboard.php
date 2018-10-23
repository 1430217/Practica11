<?php
    $mvc = new MvcController();
    if(isset($_SESSION['sesion'])){
?>


<div class="page-header">
  <h1>Dashboard <small>En esta pagina se podrá administrar la cantidad los libros.</small></h1>
</div>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3> <?php $mvc->getCountLibros(); ?> </h3>
                <p>Libros</p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <a href="index.php?action=listaLibros" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>


    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3> <?php $mvc->getCountLibros(); ?> </h3>
                <p>Autores</p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <a href="index.php?action=listaLibros" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
  



<?php
    }else{
    header('Location: index.php?action=login');
    }
?>