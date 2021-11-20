<template>
  <Master>
    <div class="container">
      <div class="col-md-12">
        <div class="card" v-for="(q, index) in questions" :key="index">
          <div class="card-body">
            <i
              v-on:click="deleteQuestion(index, q.id)"
              class="far fa-trash-alt float-right text-danger float-end"
            ></i>
            <a>{{ q.title }}</a>
          </div>
        </div>
      </div>
    </div>
  </Master>
</template>
<script>
import Master from "./Layout/Master";
import axios from "axios";
export default {
  components: { Master },
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
          Swal.fire("Borrado", "Tu tema ha sido eliminado exitosamente", "success");
          axios.get(`/question/delete/${q_id}`).then((res) => {
            if (res.data.success) {
              this.questions.splice(index, 1);
            }
          });
        }
      });
    },
  },
};
</script>
