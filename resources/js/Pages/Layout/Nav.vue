<template>
  <nav class="mb-3 navbar navbar-expand-lg navbar-dark bg-primary navbar-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Navbar brand -->
      <a class="navbar-brand" href="#">
          <img class="rounded-circle" src="/images/web/icon1.png" height="30" alt="">
          Alandal
      </a>

      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- Link -->

          <li class="nav-item"><a class="nav-link" href="/">FORO</a></li>
          <li class="nav-item">
            <a class="nav-link" href="/about">ACERCA DE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/termsconditions">TERMINOS DE USO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/legal">AVISO LEGAL</a>
          </li>
<!--
          <li class="nav-item">
            <input type="text" v-model="search" placeholder="Buscar en Alandales">
          </li>
-->
        </ul>

        <!-- Icons -->
        <ul class="navbar-nav d-flex flex-row me-1">
          <ul class="navbar-nav d-flex flex-row">
            <!-- Icon dropdown -->
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle d-flex align-items-center"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  :src="this.$page.props.auth_user.image"
                  class="rounded-circle"
                  height="22"
                  alt=""
                  loading="lazy"
                />
              </a>
              <ul
                class="dropdown-menu"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <li>
                  <a class="dropdown-item" href="#"
                    >Bienvenido <b>{{ user.name }}</b></a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="/profile/edit"
                    >Editar perfil</a
                  >
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="/logout">Cerrar sesión</a>
                </li>
              </ul>
            </li>
            <!-- Icons -->
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://iesalandalus.org/joomla/">
                <i class="fas fa-graduation-cap"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://iesalandalus.linkpc.net/moodle/?redirect=0">
                <i class="fas fa-chalkboard-teacher"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://www.youtube.com/channel/UC6GUDQ-vUkCD82Xeh5nYnXQ/videos">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
          </ul>
        </ul>
      </div>
    </div>
    <!-- Container wrapper -->
  </nav>
</template>

<script>
export default {
  name: "nav",
  /*
  data(){
      search:''
  },
  */
  computed: {
    user() {
      return this.$page.props.auth.user;
    },
    /*
    filteredBlog: function(){
        return this.questions.filter((question)=>{
            return question.title.match(this.search);
        });
    }
    */
  },
};
</script>

