<section class="articleContainer">

  <article>
    <div class="imageContainer">
      <a href="<?php echo URL_PATH?>/vehicles/newVehicle">
        <img src="<?php echo URL_PATH; ?>/Assets/img/añadir.png" alt="Imagen con un simbolo +">
      </a>
    </div>
  </article>

  <?php
  foreach ($todasLasMotos as $key) {
  ?>
  

    <article>
      <div class="imageContainer">
        <img src="<?php echo URL_PATH. "/". $key["rutaImagen"]; ?>" onerror="this.src='<?php echo URL_PATH; ?>/Assets/img/mecha.png';">
      </div>
      
      <div class="information">

        <div class="dataContainer">
          <p>Marca:</p>
          <p><?php echo $key["marca"]; ?></p>
        </div>

        <div class="dataContainer">
          <p>Modelo:</p>
          <p><?php echo $key["modelo"]; ?></p>
        </div>

        <div class="dataContainer">
          <p>Año:</p>
          <p><?php echo $key["fecha"]; ?></p>
        </div>

      </div>

        <form action="<?php echo URL_PATH?>/vehicles/delete" method="POST">
            <button id="Eliminar">Eliminar</button>
            <input type="hidden" value="<?php echo $key["idVehiculos"]; ?>" name="id">
          </form>

        <form action="<?php echo URL_PATH?>/vehicles/update" method="POST">
          <button id="Modificar">Modificar</button>
          <input type="hidden" value="<?php echo $key["idVehiculos"]; ?>" name="id">
        </form>

    </article>

  <?php
  }
  ?>

</section>