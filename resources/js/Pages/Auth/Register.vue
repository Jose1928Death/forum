<template>
  <div class="body1">
    <div class="containerInicio">
      <div class="cover">
        <div class="front">
          <img class="backImg" v-for="img in image2" v-bind:src="img" alt="" />
          <div class="text">
            <span class="text-1">Únete a nuestro foro</span>
            <span class="text-2"
              >Gran cantidad de contenido<br />para los estudiantes y los
              docentes</span
            >
          </div>
        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="signup-form">
            <div class="title">
              Crear tu cuenta
              <div
                v-show="loading"
                class="spinner-border text-primary spinner-border-sm"
                role="status"
              ></div>
            </div>
            <form @submit.prevent="register">
              <div class="input-boxes">
                <div class="input-box">
                  <i
                    :class="[
                      errors.name ? 'fas fa-user text-danger' : 'fas fa-user',
                    ]"
                  ></i>
                  <input
                    type="text"
                    :class="[errors.name ? 'border-danger' : '']"
                    id="name"
                    v-model="name"
                    placeholder="Nombre de usuario"
                  />
                </div>
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
                <div class="form-group">
                  <div style="line-height: 50%">
                    <br />
                  </div>
                  <label for="image">Foto de perfil</label>
                  <input
                    type="file"
                    :class="[
                      'form-control form-control-sm',
                      errors.image ? 'border-danger' : '',
                    ]"
                    id="image"
                    @change="selectImage"
                  />
                </div>
                <div v-show="loading" class="button input-box">
                  <input type="submit" value="Espera" :disabled="loading" />
                </div>

                <div v-show="!loading" class="button input-box">
                  <input type="submit" value="Registrar" :disabled="loading" />
                </div>
                <div class="text sign-up-text">
                  ¿Ya tienes una cuenta? <a href="/login">Inicia sesión</a>
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
      image2: [
        "https://static.ideal.es/www/pre2017/multimedia/noticias/201606/21/media/almeria/ies-andalus_xoptimizadax.jpg",
      ],
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
        onError: (errors) => {
          Swal.fire({
            icon: "error",
            title: "Error",
            html:
              (this.$page.props.errors.name ? "Se requiere un nombre" : "") +
              "<br>" +
              (this.$page.props.errors.email ? "Se requiere un correo" : "") +
              "<br>" +
              (this.$page.props.errors.password ? "Se requiere una contraseña" : "") +
              "<br>" +
              (this.$page.props.errors.image
                ? "Se requiere una imagen png, jpg"
                : ""),
          });
        },
      });
    },
  },
};
</script>
