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
            $nombreArchivo = basename($archivo["name"]);
            $rutaCompleta = $directorioDestino . $nombreArchivo;
        
            if (move_uploaded_file($archivo["tmp_name"], $rutaCompleta)) {
                echo "La imagen se ha subido correctamente.";
            } else {
                echo "Hubo un error al subir la imagen.";
            }
        }
        
    }
?>