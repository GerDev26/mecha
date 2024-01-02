<section id="insertVehiclesContainer">
    <div class="formContainer">
        <form method="POST" enctype="multipart/form-data">
            <h3 style="font-size: 25px;">Modificar Vehiculo</h3>
            <datalist id="marcaDeMoto">
                <?php
                foreach ($todasLasMarcas as $key) {
                    echo "<option value=", $key["marca"], "></option>";
                }
                ?>
            </datalist>
            <label>
                <p>Marca</p>
                <input list="marcaDeMoto" name="marca" value="<?php echo $motoSeleccionada["marca"]?>">
            </label>
            <label>
                <p>Modelo</p>
                <input name="modelo" type="text" value="<?php echo $motoSeleccionada["modelo"]?>">
            </label>
            <label>
                <p>Año</p>
                <input name="fecha" type="number" value="<?php echo $motoSeleccionada["fecha"]?>">
            </label>
            <label>
                <p>Cilindrada</p>
                <input name="cilindrada" type="number" value="<?php echo $motoSeleccionada["cilindrada"]?>">
            </label>
            <a href="<?php echo URL_PATH?>/vehicles/List"><button id="Volver" type="button" >Volver</button></a>
        </div>

        <div class="formContainer">
            <label class="file-select">
                <p>Seleccione la imagen</p>
                <input name="file" type="file" id="file">
            </label>
            <div class="checkboxContainer">
                <label>
                    Opción 1
                    <input type="checkbox" name="opcion1" value="opcion1">
                </label>
                <label>
                    Opción 1
                    <input type="checkbox" name="opcion1" value="opcion1">
                </label>
                <label>
                    Opción 1
                    <input type="checkbox" name="opcion1" value="opcion1">
                </label>
                <label>
                    Opción 1   
                    <input type="checkbox" name="opcion1" value="opcion1">
                </label>
                <label>
                    Opción 1
                    <input type="checkbox" name="opcion1" value="opcion1">
                </label>
            </div>
            <button id="Enviar">Enviar</button>
        </form>
        </div>
</section>