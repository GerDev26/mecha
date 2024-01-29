<section id="insertVehiclesContainer">
    <div class="formContainer">
        <form method="POST">
            <h3 style="font-size: 25px;">Ingresar Tecnologia</h3>
            <label>
                <p>Tecnologia</p>
                <input type="text" name="tecnologia"">
            </label>

        </div>

        <div class="formContainer">
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