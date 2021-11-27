<template>
  <Master>
    <div class="container">
      <Pagination :links="questions.links" />
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="card" v-for="(q, index) in questions.data" :key="index">
          <div class="card-body bg-dark">
            <i class="fas fa-save text-white"></i>&nbsp;
            <a class="text-white" :href="route('question.detail', q.post)">{{ q.title }}</a>
            <i
              v-on:click="deleteQuestion(index, q.id)"
              class="far fa-trash-alt float-right text-danger float-end"
            ></i>
          </div>
          <br>
        </div>
      </div>
    </div>
  </Master>
</template>
<script>
import Master from "./Layout/Master";
import axios from "axios";
import Pagination from "./Component/Pagination";
import Vue from "vue";
Vue.mixin({ methods: { route: window.route } });
export default {
  components: { Master, Pagination },
  name: "UserQuestion",
  data() {
    return {
      questions: [],
    };
  },
  created() {
    this.questions = this.$page.props.questions;
  },
  methods: {
    deleteQuestion(index, q_id) {
      Swal.fire({
        title: "¿Estás seguro?",
        text: "Vas a borrar un tema con sus comentarios",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, quiero borrarlo",
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            "Borrado",
            "Tu tema ha sido eliminado exitosamente",
            "success"
          );
          axios.get(`/question/delete/${q_id}`).then((res) => {
            if (res.data.success) {
              this.questions.data.splice(index, 1);
            }
          });
        }
      });
    },
  },
};
</script>
