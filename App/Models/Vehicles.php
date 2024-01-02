<?php
    require_once(__DIR__ . "/../Core/Orm.php");
    class Vehicles extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "VEHICULOS", $connection);
        }
        public function mostrarMarcas($vehiculos = [], $objetoMarca) {
            foreach ($vehiculos as &$item) {
                $marca=$objetoMarca->getById($item["fkMarca"]);
                $item["fkMarca"] = $marca["marca"];
            }
            return $vehiculos;
        }

        public function subirImagenVehiculo($archivo, $marca, $modelo) {
            $directorioDestino= "Assets/img/vehiculos/";
            $directorioDestino .= $marca."/";
            // Verifica si el directorio de destino existe y créalo si no existe
            if (!file_exists($directorioDestino)) {
                mkdir($directorioDestino, 0777, true);
            }

            $archivo["name"] = $modelo . ".jpg";

            // Obtiene el nombre del archivo y construye la ruta completa
            $nombreArchivo = basename($archivo["name"]);
            $rutaCompleta = $directorioDestino . $nombreArchivo;
            
            // Intenta mover el archivo al directorio de destino
            if (move_uploaded_file($archivo["tmp_name"], $rutaCompleta)) {
                return $rutaCompleta;
            } else {
                echo "Hubo un error al subir la imagen.";
                // Muestra información adicional sobre el error
                echo "Error: " . $_FILES['file']['error'];
            }
        }

        private function getRutaImagen($marca, $modelo){
            $url ="Assets/img/vehiculos/";
            $url .=$marca."/";
            $nombreImagen = $modelo;
            $nombreImagen .= ".jpg";

            return $rutaImagen = $url . $nombreImagen;
        }
        
    }
?>