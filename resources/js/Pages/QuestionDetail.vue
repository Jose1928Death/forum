<template>
  <Master>
    <div class="card">
      <div class="card-header">
        <div class="card">
          <div class="card-header bg-dark">
            <button
              v-if="q.fiexed == 'false'"
              class="badge bg-primary"
            ></button>
            <span v-else class="badge bg-success">Fijado</span>
            &nbsp;
            <i class="fas fa-comments text-white"></i>
            &nbsp;
            <span class="text-white">{{ q.title }}</span>
            <button
              v-show="isOwn(q.user_id)"
              v-on:click="deleteQuestion(index, q.id)"
              href=""
              class="badge bg-danger float-end"
              style="margin-right: 1rem"
            >
              Eliminar
            </button>
            <a
              v-show="isOwn(q.user_id) && q.fiexed !== 'true'"
              v-on:click="setFixed(index, q.id)"
              href=""
              class="badge bg-warning float-end"
              style="margin-right: 1rem"
              >Favorito</a
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
                <i
                  v-show="q.is_like != 'true'"
                  @click="like(q.id, index)"
                  class="far fa-heart text-primary"
                ></i>
                <i v-show="q.is_like == 'true'" class="fas fa-heart"></i>
                <small>{{ q.is_count }}</small>
                &nbsp;&nbsp;
                <i class="far fa-comment text-success"></i>
                <small>{{ q.comment.length }}</small>
                &nbsp;&nbsp;
              </div>
              <div class="col-md-6">
                <a
                  v-for="t in q.tag"
                  :key="t.id"
                  :href="'/?tag='+t.post"
                  class="badge bg-dark ml-1"
                  style="margin-right: 5px"
                  >{{ t.name }}</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <!-- Crear comentario -->
                <form @submit.prevent="createComment(q.id)">
                  <div class="form-group">
                    <textarea
                      class="form-control"
                      placeholder="Escribir comentario"
                      v-model="comment"
                    ></textarea>
                  </div>
                  <br />
                  <button class="btn btn-primary float-end">Enviar</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card text-white" v-for="c in q.comment" :key="c.id">
              <div class="card-header bg-dark">
                <img
                  :src="c.user.image"
                  width="30px"
                  style="border-radius: 50%"
                  alt=""
                />
                {{ c.user.name }}
                <small>comento {{ c.date }}</small>
              </div>
              <div class="card-body text-dark">
                <p>{{ c.comment }}</p>
              </div>
            </div>
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
  name: "QuestionDetail",
  props: { question: Object },
  data() {
    return {
      q: "",
      comment: "",
    };
  },
  created() {
    this.q = this.question;
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
            window.location.href = '/';
          });
        }
      });
    },
    setFixed(index, q_id) {
      var data = new FormData();
      data.append("id", q_id);
      axios.post("/question/set/fix", data).then((res) => {
        if (res.data.success) {
          this.questions.data[index].setFixed = "true";
        }
      });
    },
    isOwn(user_id) {
      var auth_user_id = this.$page.props.auth_user.id;
      if (user_id == auth_user_id) {
        return true;
      }
      return false;
    },
    createComment(q_id) {
      var data = new FormData();
      data.append("question_id", q_id);
      data.append("comment", this.comment);
      axios.post("/question/comment/create", data).then((res) => {
        const { success, comment } = res.data;
        if (success) {
          this.q.comment.push(comment);
        }
      });
    },
  },
};
</script>
