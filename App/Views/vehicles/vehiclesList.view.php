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
      <img src="<?php echo URL_PATH; ?>/Assets/img/vehiculos/<?php echo $key['descripcion'], '/', $key['modelo']; ?>.jpg" alt="">
    </div>
    <form class="information">
      <div class="dataContainer">
        <p>Marca:</p>
        <p>Modelo:</p>
        <p>Año:</p>
        <a role="button" href="#eliminar"><button>Eliminar</button></a>
      </div>
      <div class="dataContainer">
        <p><?php echo $key["descripcion"]; ?></p>
        <p><?php echo $key["modelo"]; ?></p>
        <p><?php echo $key["fecha"]; ?></p>
        <a role="button" href="#modificar"><button>Modificar</button></a>
      </div>
    </form>
  </article>
  <?php
    }
    ?>
    <article>
    <div class="imageContainer">
      <img src="<?php echo URL_PATH; ?>/Assets/img/vehiculos/yamaha/XTZ125.png" alt="">
    </div>
    <form class="information">
      <div class="dataContainer">
        <p>Marca:</p>
        <p>Modelo:</p>
        <p>Año:</p>
        <a role="button" href="#eliminar"><button>Eliminar</button></a>
      </div>
      <div class="dataContainer">
        <p>Yamaha</p>
        <p>XTZ250</p>
        <p>2021</p>
        <a role="button" href="#modificar"><button>Modificar</button></a>
      </div>
    </form>
  </article>
  <article>
    <div class="imageContainer">
      <img src="<?php echo URL_PATH; ?>/Assets/img/vehiculos/zanella/PatagoniaEagle250.jpg" alt="">
    </div>
    <form class="information">
      <div class="dataContainer">
        <p>Marca:</p>
        <p>Modelo:</p>
        <p>Año:</p>
        <a role="button" href="#eliminar"><button>Eliminar</button></a>
      </div>
      <div class="dataContainer">
        <p>Zanella</p>
        <p>Patagonia250</p>
        <p>2020</p>
        <a role="button" href="#modificar"><button>Modificar</button></a>
      </div>
    </form>
  </article>
  </article>
  <article>
    <div class="imageContainer">
      <img src="<?php echo URL_PATH; ?>/Assets/img/vehiculos/bajaj/ns200.png" alt="">
    </div>
    <form class="information">
      <div class="dataContainer">
        <p>Marca:</p>
        <p>Modelo:</p>
        <p>Año:</p>
        <a role="button" href="#eliminar"><button>Eliminar</button></a>
      </div>
      <div class="dataContainer">
        <p>Bajaj</p>
        <p>ns200</p>
        <p>2018</p>
        <a role="button" href="#modificar"><button>Modificar</button></a>
      </div>
    </form>
  </article>
</section>