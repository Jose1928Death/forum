<template>
  <Master>
    <div v-for="q in this.$page.props.questions" :key="q.id" class="card">
      <div class="card-header bg-dark">
        <span class="badge bg-danger">¿Tema fijado?</span>
        <span class="text-white">{{ q.title }}</span>
        <a href="" class="badge bg-danger float-end" style="margin-right: 1rem"
          >Eliminar</a
        >
        <a href="" class="badge bg-warning float-end" style="margin-right: 1rem"
          >Fijado</a
        >
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <p>
              {{ q.description }}
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <i class="far fa-heart text-primary"></i>
            <small>0</small>
            &nbsp;&nbsp;
            <i class="far fa-comment text-primary"></i>
            <small>{{ q.comment.length }}</small>
            &nbsp;&nbsp;
            <i class="far fa-star text-primary"></i>
            &nbsp;&nbsp;
          </div>
          <div class="col-md-6">
            <a v-for="t in q.tag" :key="t.id" href class="badge bg-dark ml-1">{{t.name}}</a>
          </div>
          <div class="col-md-2">
            <a href="/question/detail" class="btn btn-sm btn-dark float-end"
              >Detalles</a
            >
          </div>
        </div>
      </div>
    </div>
  </Master>
</template>

<script>
import { Link, Head } from "@inertiajs/inertia-vue";
import Master from "./Layout/Master";

export default {
  components: {
    Head,
    Link,
    Master,
  },

  computed: {
    user() {
      return this.$page.props.auth.user;
    },
  },

  methods: {
    //https://sweetalert2.github.io/#download
    getSuccess: function () {
      //if (this.$page.flash.success) {
      Swal.fire({
        icon: "success",
        title: "Bienvenido",
        text: this.user.name,
      });
    },
    //},
  },

  mounted() {
    //this.getSuccess();
  },
};
</script>
