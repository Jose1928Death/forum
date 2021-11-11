<template>
  <div class="body1">
    <div class="containerInicio">
      <input type="checkbox" id="flip" />
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
        <div class="back">
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
                      errors.email ? 'fas fa-envelope' : 'fas fa-envelope',
                    ]"
                  ></i>
                  <input
                    type="text"
                    :class="[errors.email ? '' : '']"
                    id="email"
                    v-model="email"
                    placeholder="Correo electrónico"
                  />
                </div>
                <div class="input-box">
                  <i
                    :class="[errors.password ? 'fas fa-lock' : 'fas fa-lock']"
                  ></i>
                  <input
                    type="password"
                    :class="[errors.password ? '' : '']"
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
                  Únete a <label for="flip">Alandal</label>
                </div>
              </div>
            </form>
          </div>
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
                  <i :class="[errors.name ? 'fas fa-user' : 'fas fa-user']"></i>
                  <input
                    type="text"
                    :class="[errors.name ? '' : '']"
                    id="name"
                    v-model="name"
                    placeholder="Nombre de usuario"
                  />
                </div>
                <div class="input-box">
                  <i
                    :class="[
                      errors.email ? 'fas fa-envelope' : 'fas fa-envelope',
                    ]"
                  ></i>
                  <input
                    type="text"
                    :class="[errors.email ? '' : '']"
                    id="email1"
                    v-model="email1"
                    placeholder="Correo electrónico"
                  />
                </div>
                <div class="input-box">
                  <i
                    :class="[errors.password ? 'fas fa-lock' : 'fas fa-lock']"
                  ></i>
                  <input
                    type="password"
                    :class="[errors.password ? '' : '']"
                    id="password1"
                    v-model="password1"
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
                      errors.image ? '' : '',
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
                  ¿Ya tienes una cuenta? <label for="flip">Inicia sesión</label>
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

      name: "",
      email1: "",
      password1: "",
      image: "",

      loading: false,
      image1: ["https://mapio.net/images-p/621666.jpg"],
      image2: [
        "https://static.ideal.es/www/pre2017/multimedia/noticias/201606/21/media/almeria/ies-andalus_xoptimizadax.jpg",
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
        onFinish: () => Swal.fire({
          icon: "error",
          title: "Error",
          html: (this.$page.props.errors.email ? "Se requiere un email" : "")+"<br>"+
          (this.$page.props.errors.password? "Se requiere una contraseña" : "")
        })
        (this.loading = false),
      });
    },
    selectImage(e) {
      this.image = e.target.files[0];
    },
    register() {
      this.loading = true;
      var data = new FormData();
      data.append("name", this.name);
      data.append("email1", this.email1);
      data.append("password1", this.password1);
      data.append("image", this.image);
      this.$inertia.post("/register", data, {
        onFinish: () => Swal.fire({
          icon: "error",
          title: "Error",
          html: (this.$page.props.errors.name ? "Se requiere un nombre" : "")+"<br>"+
          (this.$data.email1!="" ? "" : "Se requiere un email")+"<br>"+
          (this.$data.password1!="" ? "" : "Se requiere una contraseña")+"<br>"+
          (this.$page.props.errors.image ? "Se requiere una imagen" : "")
        })
        (this.loading = false),
      });
    },
  },
};
</script>
