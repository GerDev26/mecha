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

            $todasLasMotos = $motos->getAllActiveJoin("MARCAS", "fkMarca");

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

            $todasLasMarcas=$marca->getAll();

            $this->render("newVehicle", "form", [
                'todasLasMarcas' => $todasLasMarcas
            ]);

            if(isset($_POST["marca"])){

                $existeLaMarca = $marca->issetRows($_POST["marca"], "marca");
                
                if(!$existeLaMarca){                    
                    $marca->insert([
                        "marca"=>$_POST["marca"]
                    ]);
                }

                $marcaSeleccionda = $marca->searchBy($_POST["marca"], "marca");

                $motoIngresada = new Vehicles($conection);

                if(tieneArchivo($_FILES["file"])){
                    $rutaImagen = $motoIngresada->subirImagenVehiculo($_FILES["file"], $_POST["marca"], $_POST["modelo"]);
                }
                else{
                    $rutaImagen = null;
                }
                

                $motoIngresada->insert([
                    "modelo"=>$_POST['modelo'],
                    "fecha"=>$_POST['fecha'],
                    "estado"=>1,
                    "fkMarca"=>$marcaSeleccionda[0]["idMarcas"],
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
            echo $_POST["id"];
            $eliminarMoto = new Vehicles($conection);
            $eliminarMoto->updateById($_POST["id"], [
                "estado"=>0
            ]);

            header("Location: ./list");


        }

        public function update(){

            $database = new Database();
            $conection = $database->getConnection();

            $this->includeClass([
                "Vehicles",
                "Marcas"
            ]);

            $marca = new Marcas($conection);
            $motos = new Vehicles($conection);

            $todasLasMarcas=$marca->getAll(); 

            $motoSeleccionada = $motos->getByIdJoin("MARCAS", "fkMarca", $_POST["id"]);

            $this->render("updateVehicle", "form", [
                'todasLasMarcas' => $todasLasMarcas,
                'motoSeleccionada' => $motoSeleccionada
            ]);

            if(isset($_POST["marca"])){
                echo $_POST["id"];
                $existeLaMarca = $marca->issetRows($_POST["marca"], "marca");
                    
                if(!$existeLaMarca){                    
                    $marca->insert([
                        "marca"=>$_POST["marca"]
                    ]);
                }
    
                $marcaSeleccionda = $marca->searchBy($_POST["marca"], "marca");
    
                if(tieneArchivo($_FILES["file"])){
                    $rutaImagen = $motos->subirImagenVehiculo($_FILES["file"], $_POST["marca"], $_POST["modelo"]);
                }
                else{
                    $rutaImagen = $motoSeleccionada["rutaImagen"];
                }
                $motos->updateById($_POST["id"], [
                    "modelo"=>$_POST['modelo'],
                    "fecha"=>$_POST['fecha'],
                    "fkMarca"=>$marcaSeleccionda[0]["idMarcas"],
                    "cilindrada"=>$_POST["cilindrada"],
                    "rutaImagen"=>$rutaImagen
                ]);

                header("Location: ./list");

            }
        }
        
    }

?>