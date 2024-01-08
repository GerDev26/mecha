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
        public function new(){
            
            $database = new Database();
            $conection = $database->getConnection();

            $this->includeClass([
                "Vehicles",
                "Marcas",
                "Tecnologias",
                "VEH_TEC"
            ]);

            $marca = new Marcas($conection);
            $tecnologia = new Tecnologias($conection);

            $todasLasMarcas=$marca->getAll();
            $todasLasTecnologias=$tecnologia->getAll();

            $this->render("newVehicle", "form", [
                'todasLasMarcas' => $todasLasMarcas,
                'todasLasTecnologias' => $todasLasTecnologias
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

                $vehTec = new VEH_TEC($conection);
                $idMoto = $motoIngresada->searchBy($_POST["modelo"], "modelo");

                foreach ($_POST["tecnologias"] as $key) {
                    $idTec = $tecnologia->searchBy($key, "tecnologia");
                    $vehTec->insert([
                        "fkVehiculo" => $idMoto[0]["idVehiculos"],
                        "fkTecnologia" => $idTec[0]["idTecnologias"]
                    ]);
                }
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
                "Marcas",
                "Tecnologias",
                "VEH_TEC"
            ]);

            $tecnologia = new Tecnologias($conection);
            $marca = new Marcas($conection);
            $motos = new Vehicles($conection);
            $vehTec = new VEH_TEC($conection);

            $todasLasMarcas=$marca->getAll();

            $tecnologiaDeLaMoto = $vehTec->getVehTec($_POST["id"], "VEHICULOS");

            if(empty($tecnologiaDeLaMoto)){
                $tecnologiasRestantes = $tecnologia->getAll();
            }
            else{
                $tecnologiasRestantes = $tecnologia->getTecDifference($tecnologiaDeLaMoto);
            }


            $motoSeleccionada = $motos->getByIdJoin("MARCAS", "fkMarca", $_POST["id"]);

            $this->render("updateVehicle", "form", [
                'todasLasMarcas' => $todasLasMarcas,
                'motoSeleccionada' => $motoSeleccionada,
                'tecnologiaDeLaMoto' => $tecnologiaDeLaMoto,
                'tecnologiasRestantes' => $tecnologiasRestantes
            ]);

            if(isset($_POST["marca"])){
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

                if(!empty($_POST["tecRestante"])){
                    foreach ($_POST["tecRestante"] as $key) {
                        $vehTec->insert([
                            "fkVehiculo" => $_POST["id"],
                            "fkTecnologia" => $key
                        ]);
                    }
                }

                if(!empty($_POST["tecVehiculo"])){
                    $vehTec->deleteTecnologyAsociated($_POST["id"], $_POST["tecVehiculo"]);
                }

                header("Location: ./list");

            }
        }
        
    }

?>