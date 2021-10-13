<template>
  <div>
    <!-- Navbar -->
    <nav class="mb-3 navbar navbar-expand-lg  navbar-dark bg-primary navbar-light">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">IES ALANDALUS</a>

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
            <li class="nav-item"><a class="nav-link" href="#">Sin respuesta</a></li>
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
                  style="right: 0; left: auto;"
                >
                  <li>
                    <a class="dropdown-item" href="#">Bienvenido</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Ajustes</a>
                  </li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Cerrar sesión</a>
                  </li>
                </ul>
              </li>
            </ul>
          </ul>
        </div>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href class="btn btn-primary btn-block">Escribir un nuevo tema</a>
                <div class="card">
                    <div class="card-header">Tags</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a>Web Development</a>
                            </li>
                            <li class="list-group-item">
                                <a>Web Development</a>
                            </li>
                            <li class="list-group-item">
                                <a>Web Development</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark">
                        <span class="badge bg-danger">Need fixed</span>
                        <span class="text-white">What is html?</span>
                        <a href="" class="badge bg-danger float-end" style="margin-right: 1rem">Delete</a>
                        <a href="" class="badge bg-warning float-end" style="margin-right: 1rem">Fixed</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic typesetting,
                                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                                    Aldus PageMaker including versions of Lorem Ipsum.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <i class="far fa-heart text-danger"></i>
                                <small>10</small>
                                &nbsp;&nbsp;
                                <i class="far fa-comment text-success"></i>
                                <small>10</small>
                                &nbsp;&nbsp;
                            </div>
                            <div class="col-md-6">
                                <a href class="badge bg-dark ml-1">Android</a>
                                <a href class="badge bg-dark ml-1">Web</a>
                            </div>
                            <div class="col-md-2">
                                <a href="" class="btn btn-sm btn-dark float-end">Read</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Master",
};
</script>

