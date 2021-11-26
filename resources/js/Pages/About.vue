<template>
  <Master>
    <div id="terminos">
      <main role="main">
        <section class="jumbotron text-center">
          <div class="container">
            <h1 class="jumbotron-heading">Foro Alandal</h1>
            <p class="lead text-muted">
              Espacio donde los alumnos y los profesores pueden intercambiar temas de conversación, este foro puede enfocarse en diversos temas y suele desarrollar un sentido de comunidad virtual entre los participantes.
            </p>
            <p>
              <a href="https://iesalandalus.linkpc.net/moodle/" class="btn btn-primary my-2">Entrar a Moodle</a>
              <a href="https://iesalandalus.org/joomla/" class="btn btn-secondary my-2">Entrar a Web Al-Ándalus</a>
            </p>
          </div>
        </section>

        <div class="album py-5 bg-light">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-4 box-shadow bg-secondary text-center text-white">
                  <i style="margin-top: 25px;" class="fas fa-school fa-8x"></i>
                  <div class="card-body">
                    <p class="card-text">
                      Sitio donde puedes establecer temas de conversación acerca del centro educativo.
                    </p>
                    <div
                      class="d-flex justify-content-between align-items-center"
                    >
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow bg-primary text-center text-white">
                  <i style="margin-top: 25px;" class="fas fa-user-shield fa-8x"></i>
                  <div class="card-body">
                    <p class="card-text">
                      Tolerancia cero al racismo, sexismo, política y/o orientación sexual.
                    </p>
                    <div
                      class="d-flex justify-content-between align-items-center"
                    >
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow bg-secondary text-center text-white">
                  <i style="margin-top: 25px;" class="fas fa-users fa-8x"></i>
                  <div class="card-body">
                    <p class="card-text">
                      Temas de conversación dedicados a los módulos superiores, medios y temas informales.
                    </p>
                    <div
                      class="d-flex justify-content-between align-items-center"
                    >
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow bg-primary text-center text-white">
                  <i style="margin-top: 25px;" class="far fa-comment-alt fa-8x"></i>
                  <div class="card-body">
                    <p class="card-text">
                      Diversidad de comentarios y debates sobre los temas creados por los propios usuarios.
                    </p>
                    <div
                      class="d-flex justify-content-between align-items-center"
                    >
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow bg-secondary text-center text-white">
                  <i style="margin-top: 25px;" class="fas fa-running fa-8x"></i>
                  <div class="card-body">
                    <p class="card-text">
                      Alta velocidad de respuesta de información y manejo de páginas.
                    </p>
                    <div
                      class="d-flex justify-content-between align-items-center"
                    >
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow bg-primary text-center text-white">
                  <i style="margin-top: 25px;" class="fas fa-skull-crossbones fa-8x"></i>
                  <div class="card-body">
                    <p class="card-text">
                      Protección de datos frente a los piratas informáticos con contraseñas potentes.
                    </p>
                    <div
                      class="d-flex justify-content-between align-items-center"
                    >
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>
      </main>
    </div>
  </Master>
</template>
<script>
import Master from "./Layout/Master";
export default {
  components: { Master },
  name: "About",
};
</script>
