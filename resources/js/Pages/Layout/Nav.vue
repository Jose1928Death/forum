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
            <!-- Icons -->
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
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
                  src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg"
                  class="rounded-circle"
                  height="22"
                  alt=""
                  loading="lazy"
                />
              </a>
              <ul
                class="dropdown-menu"
                aria-labelledby="navbarDropdownMenuLink"
                style="right: 0; left: auto"
              >
                <li>
                  <a class="dropdown-item" href="#">Bienvenido <b>{{user.name}}</b></a>
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

