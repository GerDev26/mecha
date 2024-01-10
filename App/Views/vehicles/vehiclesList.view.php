<section class="articleContainer">

  <article>
    <div class="imageContainer">
      <a href="<?php echo URL_PATH?>/vehicles/new">
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
      
    <button onclick="openDialog()" class="botonesDeFormulario">Eliminar</button>

    <dialog id="myModal">
      <h3>¿Seguro que desea eliminar este modelo?</h3>
      <form action="<?php echo URL_PATH?>/vehicles/delete" method="POST">
        <input type="hidden" value="<?php echo $key["idVehiculos"]; ?>" name="id">
        <button class="botonesDeFormulario">Eliminar</button>
        <button class="botonesDeFormulario" type="button" onclick="closeDialog()">Cancelar</button>
      </form>
    </dialog>

        
        
    <form action="<?php echo URL_PATH?>/vehicles/update" method="POST">
      <button id="Modificar">Modificar</button>
      <input type="hidden" value="<?php echo $key["idVehiculos"]; ?>" name="id">
    </form>

    </article>

  <?php
  }
  ?>

</section>