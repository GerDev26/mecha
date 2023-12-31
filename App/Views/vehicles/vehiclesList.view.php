<section class="articleContainer">
  <article>
    <div class="imageContainer">
      <a href="<?php echo URL_PATH?>/vehicles/newVehicle">
        <img src="<?php echo URL_PATH; ?>/Assets/img/añadir.png" alt="">
      </a>
    </div>
  </article>
  <?php
    foreach ($todasLasMotos as $key) {
    ?>
  <article>
    <div class="imageContainer">
      <img src="<?php echo URL_PATH. "/". $key["rutaImagen"]; ?>" alt="">
    </div>
    
    <div class="information">
      <div class="dataContainer">
        <p>Marca:</p>
        <p>Modelo:</p>
        <p>Año:</p>

        <form action="<?php echo URL_PATH?>/vehicles/delete" method="POST">
          <button>Eliminar</button>
          <input type="hidden" value="<?php echo $key["id"]; ?>" name="id">
        </form>

      </div>
      <div class="dataContainer">
          <p><?php echo $key["descripcion"]; ?></p>
          <p><?php echo $key["modelo"]; ?></p>
          <p><?php echo $key["fecha"]; ?></p>
          <form action="<?php echo URL_PATH?>/vehicles/modify" method="POST">
            <button>Modificar</button>
            <input type="hidden" value="<?php echo $key["id"]; ?>" name="id">
          </form>
        </div>
      </div>
  </article>
  <?php
    }
    ?>
</section>