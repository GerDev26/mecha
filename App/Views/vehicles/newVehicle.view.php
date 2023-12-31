<section id="insertVehiclesContainer">
    <form method="POST" enctype="multipart/form-data">
        <h3 style="font-size: 25px;">Ingrese los datos del Vehiculo</h3>
        <datalist id="marcaDeMoto">
            <?php
            foreach ($todasLasMarcas as $key) {
                echo "<option value=", $key["descripcion"], "></option>";
            }
            ?>
        </datalist>
        <label>
            <p>Marca</p>
            <input list="marcaDeMoto" name="marca">
        </label>
        <label>
            <p>Modelo</p>
            <input name="modelo" type="text">
        </label>
        <label>
            <p>Año</p>
            <input name="fecha" type="text">
        </label>
        <label>
            <p>Cilindrada</p>
            <input name="cilindrada" type="number">
        </label>
        <label>
            <p>Seleccione la imagen</p>
            <input name="file" type="file" id="file">
        </label>
        <div id="buttonContainer">
            <button>Enviar</button>
            <a href="<?php echo URL_PATH?>/vehicles/List"><button type="button" >Volver</button></a>
        </div>
    </form>
</section>