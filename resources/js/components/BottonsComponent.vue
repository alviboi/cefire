<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="flip-card">
          <div class="flip-card-inner">
              <a href="/controldecentres">
            <div class="flip-card-front">
              <img src="img/centres.png" alt="Avatar" style="width:300px;height:200px;" />
            </div>
            <div class="flip-card-back">
              <h2 class="p-3">Control de centres</h2>
              <h4>Búsqueda dels centres educatius i el seu assessor</h4>
            </div>

</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="flip-card">
          <div class="flip-card-inner">
            <a href="http://128.0.0.240/reserva.php">
              <div class="flip-card-front">
                <img src="img/reserva_aula.png" alt="Avatar" style="width:300px;height:200px;" />
              </div>
              <div class="flip-card-back">
                <h2 class="p-3">Reserva d'Aules</h2>
                <h4 class="p-3">Per anar a la pàgina de reserva d'Aules</h4>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="flip-card">
          <div class="flip-card-inner">
              <a href="http://128.0.0.231/nextcloud/">
            <div class="flip-card-front">
              <img src="img/owncloud.png" alt="Avatar" style="width:300px;height:200px;" />
            </div>
            <div class="flip-card-back">
                <h2 class="p-3">Owncloud</h2>
                <h4>Espai per a compartir arxius</h4>
            </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-lg-4">
        <div class="flip-card">
          <div class="flip-card-inner">
              <a href="https://128.0.0.231:82/">
            <div class="flip-card-front">
              <img src="img/jitsi.png" alt="Avatar" style="width:300px;height:200px;" />
            </div>
            <div class="flip-card-back">
                <h2 class="p-3">Jitsi</h2>
                <h4 class="p-3">Espai per crear videoconferències a dintre de la xarxa del CEFIRE</h4>
            </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="flip-card">
          <div class="flip-card-inner">
              <a href="http://128.0.0.240/gesform/">
            <div class="flip-card-front">
              <img src="img/gesform.png" alt="Avatar" style="width:300px;height:200px;" />
            </div>
            <div class="flip-card-back">
                <h2 class="p-3">Gesform</h2>
                <h4>Descarrega última versió de Gesform</h4>
            </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="flip-card">
          <div class="flip-card-inner">
              <a href="https://128.0.0.238:8006/">
            <div class="flip-card-front">
              <img src="img/proxmox.png" alt="Avatar" style="width:300px;height:200px;" />
            </div>
            <div class="flip-card-back">
                <h4 class="p-3">Administració total del CEFIRE de València</h4>
                <h5>Aquí tens l'administració TOTAL del CEFIRE. Molt amb compte!!! Pots destruir el CEFIRE</h5>
            </div>
            </a>
          </div>
        </div>
      </div>
  </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      greeting: "Hello",
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>

<style lang="scss" scoped>
.general {
  padding: 5%;
}

/* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
.flip-card {
  background-color: transparent;
  width: 300px;
  height: 200px;
  border: 1px solid #f1f1f1;
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
.flip-card-front,
.flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden; /* Safari */
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: #bbb;
  color: black;
}

/* Style the back side */
.flip-card-back {
  background-color: dodgerblue;
  color: white;
  transform: rotateY(180deg);
}
</style>
