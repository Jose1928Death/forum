<template>
  <div class="container mt-5">
    <div class="col-md-4 offset-4">
      <div class="card">
        <div class="card-header">Inicio de sesión</div>
        <div class="card-body">
          <form @submit.prevent="login">
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
              <span v-show="!loading">Iniciar sesión</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login",
  props: {
    errors: {
      type: Object,
    },
  },
  data() {
    return {
      email: "",
      password: "",
      loading:false,
    };
  },
  methods: {
    login() {
        this.loading=true;
      var data = new FormData();
      data.append('email',this.email);
      data.append('password',this.password);
      this.$inertia.post("/login", data, {
        onFinish: () => (this.loading = false),
      });
    },
  },
};
</script>
