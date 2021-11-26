<template>
  <div class="col-md-4">
    <a href="/question/create" class="btn btn-primary btn-block"
      >Escribir un nuevo tema</a
    >
    <div class="card" v-show="!isProfileUrl">
      <div class="card-header text-primary" style="text-align: center">
        CATEGORIAS
      </div>
      <div class="card-body">
        <ul class="list-group">
          <li
            class="list-group-item"
            v-for="tag in $page.props.tag"
            :key="tag.id"
          >
            <i class="fas fa-tags text-primary"></i>&nbsp;
            <a class="text-dark" :href="'/?tag=' + tag.post">{{ tag.name }}</a>
          </li>
        </ul>
      </div>
      <div class="card-header text-primary" style="text-align: center">
        DESCUBRE
      </div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">
            <i class="fas fa-comments text-primary"></i>&nbsp;
            <a class="text-dark" href="/?type=answer"
              >Temas comentados por ti</a
            >
          </li>
          <li class="list-group-item">
            <i class="fas fa-question text-primary"></i>&nbsp;
            <a class="text-dark" href="/?type=unanswer">Temas por descubrir</a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Sidebar para usuario -->

    <div class="card" v-show="isProfileUrl">
      <div class="card-header text-primary" style="text-align: center">
        CONFIGURACIÓN
      </div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">
            <i class="fas fa-address-book text-primary"></i>
            &nbsp;
            <a class="text-dark" href="/profile/edit">Editar perfil</a>
          </li>
          <li class="list-group-item">
            <i class="fas fa-folder-plus text-primary"></i>
            &nbsp;
            <a class="text-dark" href="/profile/question">Preguntas creadas</a>
          </li>
          <li class="list-group-item">
            <i class="fas fa-folder text-primary"></i>
            &nbsp;
            <a class="text-dark" href="/profile/savequestion"
              >Preguntas guardadas</a
            >
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Sidebar",

  computed: {
    isProfileUrl() {
      var url = location.pathname;
      var exp = "/profile/.*";
      var res = url.match(exp);
      if (res != null) {
        return true;
      }
      return false;
    },
  },
};
</script>
