<template>
  <div class="col-md-4">
    <a href="/question/create" class="btn btn-primary btn-block">Escribir un nuevo tema</a>
    <div class="card" v-show="!isProfileUrl">
      <div class="card-header text-primary" style="text-align: center">Tags</div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item" v-for="tag in $page.props.tag" :key="tag.id">
            <i class="fas fa-tags"></i>&nbsp;
            <a :href="'/?tag='+tag.post">{{ tag.name }}</a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Sidebar para usuario -->

    <div class="card" v-show="isProfileUrl">
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">
            <i class="fas text-primary fa-user"></i>
            &nbsp;
            <a>Editar perfil</a>
          </li>
          <li class="list-group-item">
            <i class="fas text-primary fa-question-circle"></i>
            &nbsp;
            <a href='/profile/question'>Preguntas creadas</a>
          </li>
          <li class="list-group-item">
            <i class="fas text-primary fa-question-circle"></i>
            &nbsp;
            <a href='/profile/savequestion'>Preguntas guardadas</a>
          </li>
        </ul>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "Sidebar",

  computed:{
      isProfileUrl(){
          var url = location.pathname;
          var exp = '/profile/.*';
          var res = url.match(exp);
          if(res != null){
              return true;
          }
          return false;
      },
  },
};
</script>
