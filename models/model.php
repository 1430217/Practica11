<?php 
    class EnlacesPagina{

        public function enlacesPaginasModel($enlaces){
            if($enlaces == 'login' || $enlaces == 'registro' || $enlaces == 'salir' || $enlaces == 'dashboard' ||
            $enlaces == 'addLibro' || $enlaces == 'listaLibros' || $enlaces == 'editar'){

                    $module = 'views/modules/'.$enlaces.'.php';            
            }
            else if ($enlaces === 'index') { $module = 'views/modules/dashboard.php'; }
            else if($enlaces == "fallo"){ $module =  "views/modules/login.php"; } 
            else if ($enlaces === 'ok') {$module = 'views/modules/login.php';}
            else if($enlaces == "cambio"){ $module =  "views/modules/listaLibros.php"; } 
            return $module;
        }
    }
?>