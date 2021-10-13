<template>
  <div class="container mt-5">
    <div class="col-md-4 offset-4">
      <div class="card">
        <div class="card-header">Registro</div>
        <div class="card-body">
          <form @submit.prevent="register">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input
                type="text"
                :class="[
                  'form-control',
                  errors.name ? 'border border-danger' : '',
                ]"
                id="name"
                v-model="name"
              />
              <small v-if="errors.name" class="text text-danger">{{
                errors.name
              }}</small>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="text"
                :class="[
                  'form-control',
                  errors.email ? 'border border-danger' : '',
                ]"
                id="email"
                v-model="email"
              />
              <small v-if="errors.email" class="text text-danger">{{
                errors.email
              }}</small>
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input
                type="password"
                :class="[
                  'form-control',
                  errors.password ? 'border border-danger' : '',
                ]"
                id="password"
                v-model="password"
              />
              <small v-if="errors.password" class="text text-danger">{{
                errors.password
              }}</small>
            </div>
            <div class="form-group">
              <label for="image">Foto de perfil</label>
              <input
                type="file"
                :class="[
                  'form-control',
                  errors.image ? 'border border-danger' : '',
                ]"
                id="image"
                @change="selectImage"
              />
              <small v-if="errors.image" class="text text-danger">{{
                errors.image
              }}</small>
            </div>
            <br>
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
              <span v-show="!loading">Registrar</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    errors: {
      type: Object,
    },
  },
  name: "Register",
  data() {
    return {
      name: "",
      email: "",
      password: "",
      image: "",
      loading: false,
    };
  },
  //metodos
  methods: {
    selectImage(e) {
      this.image = e.target.files[0];
    },
    register() {
      this.loading = true;
      var data = new FormData();
      data.append("name", this.name);
      data.append("email", this.email);
      data.append("password", this.password);
      data.append("image", this.image);
      this.$inertia.post("/register", data, {
        onFinish: () => (this.loading = false),
      });
    },
  },
};
</script>
