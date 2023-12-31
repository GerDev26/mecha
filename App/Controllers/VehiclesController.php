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

            $todasLasMotos = $motos->getAllJoin("MARCAS", "idMarca");

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

                $motoIngresada->insert([
                    "modelo"=>$_POST['modelo'],
                    "fecha"=>$_POST['fecha'],
                    "estado"=>1,
                    "idMarca"=>$marcaSeleccionda[0]["id"],
                    "cilindrada"=>$_POST["cilindrada"]
                ]);
                $miImagen = $_POST["file"];
                echo $miImagen;
                $url= URL_PATH;
                $url .=  "/Assets/img/vehiculos/";
                echo $url;
                $motoIngresada->subirImagen($_POST["file"], $url);
            }

        }

        public function newUser(){
            $this->render("newUser", "index");
        }
    }

?>