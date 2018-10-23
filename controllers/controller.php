<?php
    class MvcController{    

        public function pagina(){
            include 'views/template.php';
        }

        public function enlacesPaginasController(){
            if(isset($_GET['action'])){
                $enlaces = $_GET['action'];
            }else{
                $enlaces = 'index';
            }
            $respuesta = EnlacesPagina::enlacesPaginasModel($enlaces);
            include $respuesta;
        }

        public function registrarUsuarioController(){
            if(isset($_POST['name'])){
                $contrasena = password_hash($_POST['password'], PASSWORD_DEFAULT); //cifrado de la contraseña

                $usuario = array(
                    'name' => $_POST['name'],
                    'username' => $_POST['username'],
                    'password' => $contrasena
                );

                //print_r($usuario);

                $stmt = Datos::registrarUsuario($usuario,'user');

                if($stmt == "success")
					header("location:index.php?action=ok"); 
				else 
					header("location:index.php");
            }
        }

        public function loginController(){

			if (isset($_POST['username'])) {
				$usuario = array('username' => $_POST['username'],
								'password' => $_POST['password']
				);
				//Recibe el usuario como un array y el nombre de la tabla
                $stmt = Datos::loginModel($usuario, 'user');
                
				//Si los datos coinciden con los de la base de datos entonces se inicia la sesion
				if($_POST['username'] == $stmt['username']){ 

                    //Comprobar la contraseña cifrada de la base de dartos con la del formulario
                    if(password_verify($_POST['password'], $stmt['password'])){ 
                        //Se inicia la sesion y se redirecciona al listado de usuarios
                        session_start();
                        $_SESSION['sesion'] = true;
                        header('location: index.php');
                    }
				} 
				else 
					header('location:index.php?action=fallo');
			}
        }

        public function addLibroController(){
            if(isset($_POST['title'])){

                $libro = array(
                    'title' => $_POST['title'],
                    'author' => $_POST['author'],
                    'description' => $_POST['description']
                );

                $stmt = Datos::addlibro($libro, 'book');

                if($stmt == 'success')
					header('Location: index.php?action=listaLibros'); 
				else 
					header('Location: index.php');
            
            }
        }

        /* Imprimir en la tabla de los libros (Lista los libros enla base de datos)*/
        public function getLibrosController(){
            $stmt = Datos::getLibros('book');

			//For each para recorrer la tabla de las carreras y poder imprimirlos
			foreach ($stmt as $book => $r) {
				//Echo para imprimir los datos en la tabla
				echo 
                    '<tr>
                        <td>'.$r["title"].'</td>
                        <td>'.$r["author"].'</td>
                        <td>'.$r["description"].'</td>
                        <td><a href="index.php?action=editar&id='.$r["id"].'"><button class="btn btn-warning" ><span class="glyphicon glyphicon-pencil"></span></button>'.'</td>
                        <td><a href="index.php?action=listaLibros&idBorrar='.$r["id"].'"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>'.'</td>
					</tr>'
				;
			}	
        }

        /* Imprime los datos en un formulario del libro seleccionado para editar */
        public function getlibro(){
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $stmt = Datos::getLibro($id, 'book');
                echo '
                    <input type="hidden" name="id" value="'.$stmt["id"].'">
                    
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" value=" '.$stmt["title"].' " name="title">
                        <span class="glyphicon glyphicon-text-size form-control-feedback"></span>
                    </div>
            
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" value=" '.$stmt["author"].' " name="author">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <textarea class="form-control" cols="30" rows="10" name="description" >' .$stmt["description"]. '</textarea>
                        <span class="glyphicon glyphicon-comment form-control-feedback"></span>
                    </div>   
                    
                    <div class="row">
                        <div class="col-xs-8">
                        </div>
                        <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Actualizar Libro</button>
                        </div>
                    </div>'
                ;
            }
            
        }
        public function actualizarLibroController(){
            if (isset($_POST['id'])) {
                $libro = array(
                    'id' => $_POST['id'],
                    'title' => $_POST['title'],
                    'author' => $_POST['author'],
                    'description' => $_POST['description']
                );

                $stmt = Datos::actualizarLibro($libro, 'book');
                if($stmt == 'success')
                    header('Location: index.php?action=cambio');
                else 
                    echo 'Error al actualizar';
                
            }
                
        }

        public function borrarLibro(){
            if (isset($_GET['idBorrar'])){

                $stmt = Datos::deleteLibro($_GET['idBorrar'], 'book');
                if($stmt == 'success')
                    header('Location: index.php?action=listaLibros');
                else 
                    echo 'Error al eliminar el libro';
                
            }
        }

        /* Controller para imprimir el conteo de maestros (Ver en el dashboard) */
        public function getCountLibros(){
            $stmt = Datos::countLibros('book');
            echo $stmt;
        }
    }
?>  