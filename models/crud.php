<?php 
    require_once "conexion.php";

    class Datos extends Conexion{

        public function registrarUsuario($usuario, $tabla){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (name, username, password) VALUES (:name, :username, :password)");

            $stmt->bindParam(':name', $usuario['name'], PDO::PARAM_STR);
            $stmt->bindParam(':username', $usuario['username'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $usuario['password'], PDO::PARAM_STR);

            if($stmt->execute()) 
                return 'success';
            else  
                return 'error';    
            $stmt->close();
        }  

        public function loginModel($usuario, $tabla){
			$stmt = Conexion::conectar()->prepare("SELECT username, password FROM $tabla WHERE username = :username");
			$stmt->bindParam(':username', $usuario['username'], PDO::PARAM_STR);		
			$stmt->execute();
			return $stmt->fetch();

			$stmt->close();
        }
        
        public function addLibro($libro, $tabla){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (title, author, description) VALUES (:title, :author, :description)");

            $stmt->bindParam(':title', $libro['title'], PDO::PARAM_STR);
            $stmt->bindParam(':author', $libro['author'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $libro['description'], PDO::PARAM_STR);
            $stmt->execute();

            if($stmt->execute()) 
                return 'success';
            else  
                return 'error';    
            $stmt->close();
        }


        public function actualizarLibro($libro, $tabla){
		
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET title = :title, author = :author, description = :description WHERE id = :id");		
            $stmt->bindParam(':title', $libro['title'], PDO::PARAM_STR);
            $stmt->bindParam(':author', $libro['author'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $libro['description'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $libro['id'], PDO::PARAM_INT);
            
            if ($stmt->execute()) 
                return 'success';
            else 
                return 'error';
            $stmt->close();
        }

        public function getLibros($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();

			$stmt->close();
        }

        public function getLibro($id, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }


        /* Funcion de la base de datos para editar el perfil del usuario */
        public function actualizarUsuario($usuario, $tabla){
		
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name = :name, username = :username, password = :password WHERE id = :id");		
            $stmt->bindParam(':name', $usuario['name'], PDO::PARAM_STR);
            $stmt->bindParam(':username', $usuario['username'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $usuario['password'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $usuario['id'], PDO::PARAM_INT);
            
            if ($stmt->execute()) 
                return 'success';
            else 
                return 'error';
            $stmt->close();
        }

        /** Traer la información del usuario */
        public function getUsuario($id, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

		//Funcion para borrar un libro 
		public function deleteLibro($id, $tabla){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla where id = :id");
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();

			if ($stmt->execute()) 
				return 'success';
			else 
				return 'error';

			$stmt->close();
		}
        

        /* Funcion para CONTAR los registros de la tabla books */
        public function countLibros($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            $rows = $stmt->rowCount();

            return $rows;
        }

    }

?>