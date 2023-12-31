<?php
    class VehiclesController extends Controller{
        public function __construct(PDO $conection){
            $this->dir="/vehicles/";
        }
        public function list(){
            $database = new Database();
            $conection = $database->getConnection();
            $this->includeClass([
                "Vehicles",
                "Marcas"
            ]);
            $motos = new Vehicles($conection);
            $marca = new Marcas($conection);

            $todasLasMotos = $motos->getAllActiveJoin("MARCAS", "idMarca");

            $this->render("vehiclesList", "navigation", [
                "todasLasMotos" => $todasLasMotos
            ]);
        }
        public function newVehicle(){
            
            $database = new Database();
            $conection = $database->getConnection();

            $this->includeClass([
                "Vehicles",
                "Marcas"
            ]);

            $marca = new Marcas($conection);
            $motoIngresada = new Vehicles($conection);

            $todasLasMarcas=$marca->getAll();

            $this->render("newVehicle", "form", [
                'todasLasMarcas' => $todasLasMarcas
            ]);

            if(isset($_POST["marca"])){

                $existenMarcas = $marca->issetRows($_POST["marca"], "descripcion");
                
                if(!$existenMarcas){                    
                    $marca->insert([
                        "descripcion"=>$_POST["marca"]
                    ]);
                }
                $marcaSeleccionda = $marca->searchBy($_POST["marca"], "descripcion");

                $url ="Assets/img/vehiculos/";
                $url .=$_POST["marca"]."/";

                $_FILES["file"]["name"] = $_POST["modelo"];
                $_FILES["file"]["name"] .= ".jpg";

                $rutaImagen=$url. $_FILES["file"]["name"];
                echo $rutaImagen;

                $motoIngresada->subirImagen($_FILES["file"], $url);
                $motoIngresada->insert([
                    "modelo"=>$_POST['modelo'],
                    "fecha"=>$_POST['fecha'],
                    "estado"=>1,
                    "idMarca"=>$marcaSeleccionda[0]["id"],
                    "cilindrada"=>$_POST["cilindrada"],
                    "rutaImagen"=>$rutaImagen
                ]);

                
            }
            
        }

        public function delete(){

            $database = new Database();
            $conection = $database->getConnection();

            $this->includeClass([
                "Vehicles"
            ]);

            $eliminarMoto = new Vehicles($conection);

            $eliminarMoto->updateById($_POST["id"], [
                "estado"=>0
            ]);

            header("Location: ../vehicles/list");

        }
        
        public function modify(){
            
            $database = new Database();
            $conection = $database->getConnection();

            $this->includeClass([
                "Vehicles",
                "Marcas"
            ]);

            $marca = new Marcas($conection);
            $motoIngresada = new Vehicles($conection);

            $todasLasMarcas=$marca->getAll();

            $this->render("newVehicle", "form", [
                'todasLasMarcas' => $todasLasMarcas
            ]);

            if(isset($_POST["modelo"])){

                $existenMarcas = $marca->issetRows($_POST["marca"], "descripcion");
                $marcaSeleccionda = $marca->searchBy($_POST["marca"], "descripcion");
                
                if(!$existenMarcas){                    
                    $marca->UpdateById($marcaSeleccionda[0]["id"])([
                        "descripcion"=>$_POST["marca"]
                    ]);
                }

                $url ="Assets/img/vehiculos/";
                $url .=$_POST["marca"]."/";

                $_FILES["file"]["name"] = $_POST["modelo"];
                $_FILES["file"]["name"] .= ".jpg";

                $rutaImagen=$url. $_FILES["file"]["name"];
                echo $rutaImagen;

                $motoIngresada->subirImagen($_FILES["file"], $url);
                $motoIngresada->insert([
                    "modelo"=>$_POST['modelo'],
                    "fecha"=>$_POST['fecha'],
                    "estado"=>1,
                    "idMarca"=>$marcaSeleccionda[0]["id"],
                    "cilindrada"=>$_POST["cilindrada"],
                    "rutaImagen"=>$rutaImagen
                ]);
        }
    }

?>