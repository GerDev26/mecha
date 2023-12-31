<?php
    require_once(__DIR__ . "/../Core/Orm.php");
    class Vehicles extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "VEHICULOS", $connection);
            $this->tableJoin="MARCAS";
        }
        public function mostrarMarcas($vehiculos = [], $objetoMarca) {
            foreach ($vehiculos as &$item) {
                $marca=$objetoMarca->getById($item["idMarca"]);
                $item["idMarca"] = $marca["descripcion"];
            }
            return $vehiculos;
        }

        public function subirImagen($archivo, $directorioDestino) {
            // Verifica si el directorio de destino existe y créalo si no existe
            if (!file_exists($directorioDestino)) {
                mkdir($directorioDestino, 0777, true);
            }
        
            // Obtiene el nombre del archivo y construye la ruta completa
            $nombreArchivo = basename($archivo["name"]);
            $rutaCompleta = $directorioDestino . $nombreArchivo;
        
            // Intenta mover el archivo al directorio de destino
            if (move_uploaded_file($archivo["tmp_name"], $rutaCompleta)) {
                echo "La imagen se ha subido correctamente.";
            } else {
                echo "Hubo un error al subir la imagen.";
                // Muestra información adicional sobre el error
                echo "Error: " . $_FILES['file']['error'];
            }
        }
        
    }
?>