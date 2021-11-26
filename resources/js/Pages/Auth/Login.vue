<template>
  <div class="body1">
    <div class="containerInicio">
      <div class="cover">
        <div class="front">
          <img v-for="img in image1" v-bind:src="img" alt="" />
          <div class="text">
            <span class="text-1">Bienvenido a<br />ALANDAL</span>
            <span class="text-2"
              >Un foro educativo para <br />
              nuestros alumnos y profesores</span
            >
          </div>
        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">
              Iniciar sesión
              <div
                v-show="loading"
                class="spinner-border text-primary spinner-border-sm"
                role="status"
              ></div>
            </div>
            <form @submit.prevent="login">
              <div class="input-boxes">
                <div class="input-box">
                  <i
                    :class="[
                      errors.email
                        ? 'fas fa-envelope text-danger'
                        : 'fas fa-envelope',
                    ]"
                  ></i>
                  <input
                    type="text"
                    :class="[errors.email ? 'border-danger' : '']"
                    id="email"
                    v-model="email"
                    placeholder="Correo electrónico"
                  />
                </div>
                <div class="input-box">
                  <i
                    :class="[
                      errors.password
                        ? 'fas fa-lock text-danger'
                        : 'fas fa-lock',
                    ]"
                  ></i>
                  <input
                    type="password"
                    :class="[errors.password ? 'border-danger' : '']"
                    id="password"
                    v-model="password"
                    placeholder="Contraseña"
                  />
                </div>
                <div class="text sign-up-text">
                  <div v-show="loading" class="button input-box">
                    <input type="submit" value="Espera" :disabled="loading" />
                  </div>

                  <div v-show="!loading" class="button input-box">
                    <input type="submit" value="Iniciar" :disabled="loading" />
                  </div>
                  Únete a <a href="/register">Alandal</a>
                </div>
              </div>
            </form>
          </div>
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
      loading: false,

      image1: ["/images/web/ies.jpg"],
      image2: [
        "/images/web/ies2.jpg",
      ],
    };
  },
  methods: {
    login() {
      this.loading = true;
      var data = new FormData();
      data.append("email", this.email);
      data.append("password", this.password);

      this.$inertia.post("/login", data, {
        onFinish: () => (this.loading = false),
        onError: (errors) => {
          Swal.fire({
            icon: "error",
            title: "Error",
            html:
              (this.$page.props.errors.email ? "Se requiere un correo" : "") +
              "<br>" +
              (this.$page.props.errors.password
                ? "Se requiere una contraseña"
                : ""),
          });
        },
      });
    },
  },
};
</script>
