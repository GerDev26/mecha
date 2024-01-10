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
            <input type="hidden" name="id" value="<?php echo $motoSeleccionada["idVehiculos"]?>">
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

        </div>

        <div class="formContainer">
            <label class="file-select">
                <p>Seleccione la imagen</p>
                <input name="file" type="file" id="file">
            </label>
            <div class="checkboxContainer">
                <h3>Agregar Tecnologia</h3>
                <?php
                foreach ($tecnologiasRestantes as $key) {
                ?>
                <label>
                    <p><?php echo $key["tecnologia"]; ?></p>
                    <input type="checkbox" name="tecRestante[]" value="<?php echo $key["idTecnologias"]; ?>">
                </label>
                <?php
                }
                ?>
                </div>
                <div class="checkboxContainer">
                <h3>Eliminar Tecnologia</h3>
                <?php
                foreach ($tecnologiaDeLaMoto as $key) {
                ?>
                <label>
                    <p><?php echo $key["tecnologia"]; ?></p>
                    <input type="checkbox" name="tecVehiculo[]" value="<?php echo $key["idTecnologias"]; ?>">
                </label>
                <?php
                }
                ?>
            </div>
            <button class="botonesDeFormulario" type="button" onclick="window.location.href='<?php echo URL_PATH ?>/vehicles/list';">Volver</button>
            <button class="botonesDeFormulario">Modificar</button>
        </form>
        </div>
</section>