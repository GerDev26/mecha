<section id="insertVehiclesContainer">
    <div class="formContainer">
        <form method="POST" enctype="multipart/form-data">
            <h3 style="font-size: 25px;">Ingresar Vehiculos</h3>
            <datalist id="marcaDeMoto">
                <?php
                foreach ($todasLasMarcas as $key) {
                    echo "<option value=", $key["marca"], "></option>";
                }
                ?>
            </datalist>
            <label>
                <p>Marca</p>
                <input list="marcaDeMoto" name="marca" required>
            </label>
            <label>
                <p>Modelo</p>
                <input name="modelo" type="text" required>
            </label>
            <label>
                <p>Año</p>
                <input name="fecha" type="number" required>
            </label>
            <label>
                <p>Cilindrada</p>
                <input name="cilindrada" type="number" required>
            </label>
            <label class="file-select">
                <p>Seleccione la imagen</p>
                <input name="file" type="file" id="file">
            </label>
        </div>

        <div class="formContainer">
            <div class="checkboxContainer">
                <h3>Agregar Tecnologia</h3>
                <?php
                foreach ($todasLasTecnologias as $key) {
                ?>
                <label>
                    <p><?php echo $key["tecnologia"]; ?></p>
                    <input type="checkbox" name="tecnologias[]" value="<?php echo $key["tecnologia"]; ?>">
                </label>
                <?php
                }
                ?>
                <button class="botonesDeFormulario" type="button" onclick="window.location.href='<?php echo URL_PATH ?>/vehicles/list';">Volver</button>
                <button class="botonesDeFormulario">Subir</button>
            </form>
            </div>
        </div>
</section>