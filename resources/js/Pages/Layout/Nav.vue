<template>
  <nav class="mb-3 navbar navbar-expand-lg navbar-dark bg-primary navbar-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Navbar brand -->
      <a href="/" class="navbar-brand">IES ALANDALUS</a>

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
          <li class="nav-item"><a class="nav-link" href="#">Temas</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Mensajes</a></li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sin respuesta</a>
          </li>
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
              <a class="nav-link" href="https://twitter.com/">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://es-es.facebook.com/">
                <i class="fab fa-facebook"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://www.youtube.com/">
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
  computed: {
    user() {
      return this.$page.props.auth.user;
    },
  },
};
</script>

