<template>
  <Master>
    <div class="card">
      <div class="card-header">Bienvenido</div>
      <div class="card-body">
        <!-- <div class="alert alert-success" v-show="this.$page.props.flash">
           {{ $page.flash.success }}
        </div>  -->
        <form @submit.prevent="update">
          <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" v-model="name" class="form-control" />
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input
              type="text"
              v-model="email"
              value="Mg"
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="text" v-model="password" class="form-control" />
          </div>
          <div class="form-group">
            <label for="">Imagen</label>
            <input type="file" class="form-control" @change="selectImage" />
            <br />
            <img :src="this.$page.props.auth_user.image" width="20%" alt="" />
          </div>
          <br />
          <button class="btn btn-sm btn-primary float-end" :disabled="loading">
            <div
              v-show="loading"
              class="spinner-border spinner-border-sm"
              role="status"
            >
              <span class="sr-only">Cargando...</span>
            </div>

            <span v-show="loading">Espera</span>
            <span v-show="!loading">Actualizar</span>
          </button>
        </form>
      </div>
    </div>
  </Master>
</template>

<script>
import Master from "./Layout/Master";
export default {
  components: {
    Master,
  },
  name: "EditUser",
  data() {
    return {
      name: "",
      password: "",
      email: "",
      image: "",
      loading: false,
    };
  },
  created() {
    const { name, email } = this.$page.props.auth_user;
    this.name = name;
    this.email = email;
  },
  methods: {
    selectImage(e) {
      this.image = e.target.files[0];
    },

    getSuccess: function () {
      //if (this.$page.flash.success) {
      Swal.fire({
        icon: "success",
        title: "Actualizado",
        text: "Tu perfil ha sido actualizado correctamente",
      });
    },

    update() {
      if (
        (/^[a-zA-Z ]+$/.test(this.name) ==
            false ||
          /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email) ==
            false ||
          /^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/.test(
            this.password
          ) == false)
      ) {
        Swal.fire({
          icon: "error",
          title: "Error",
          html: "Rellene los campos"+"<br>"+
          "Nombre: Jose Antonio"+"<br>"+
          "Correo: ejemplo01@correo.es"+"<br>"+
          "Contraseña: G145JSABCDeee!"+"<br>"+
          "Imagen: png, jpg"
        }).then(() => (this.loading = false));
      } else {
        this.loading = true;
        var data = new FormData();
        data.append("name", this.name);
        data.append("email", this.email);
        data.append("password", this.password);
        data.append("image", this.image);
        this.$inertia.post("/profile/edit", data, {
          onFinish: () => (this.loading = false),
        });
        this.getSuccess();
        //.then(() => (this.loading = false));
      }
    },
  },
};
</script>
