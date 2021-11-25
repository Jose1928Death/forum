<template>
  <Master>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <form @submit.prevent='createQuestion'>
            <div class="form-group">
              <input
                type="text"
                placeholder="Enviar titulo"
                class="form-control"
                v-model="title"
              />
            </div>
            <br />
            <div class="form-group">
              <div v-for="t in $page.props.tag" :key="t.id">
                <label for="">{{ t.name }}</label>
                <input
                  :value="t.id"
                  type="checkbox"
                  placeholder="Enviar pregunta"
                  v-model="tag"
                />
              </div>
            </div>
            <br />
            <div class="form-group">
              <textarea
                class="form-control"
                placeholder="Enviar pregunta"
                v-model="description"
              ></textarea>
            </div>
            <br />
            <button
              class="btn btn-sm btn-primary float-end"
              :disabled="loading"
            >
              <div
                v-show="loading"
                class="spinner-border spinner-border-sm"
                role="status"
              >
                <span class="sr-only">Cargando...</span>
              </div>

              <span v-show="loading">Espera</span>
              <span v-show="!loading">Enviar</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </Master>
</template>

<script>
import Master from "./Layout/Master";
export default {
  name: "CreateQuestion",
  components: { Master },
  data() {
    return {
      loading: false,
      title: "",
      tag: [],
      description: "",
    };
  },
  methods:{
      createQuestion(){
          this.loading=true;
          if(this.title=="" || this.tag=="" || this.description==""){
            Swal.fire({
            icon: "error",
            title: "Error",
            html:
              "Rellene todos los campos"
          }).then(()=>(this.loading=false));
          }else{
            var data = new FormData();
            data.append('title',this.title);
            data.append('tag',this.tag);
            data.append('description',this.description);
            this.$inertia.post('/question/create',data).then(()=>(this.loading=false));
          }
      }
  }
};
</script>
