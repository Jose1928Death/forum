<template>
  <Master>
    <div class="card">
      <div class="card-header">
        <div class="card">
          <div class="card-header bg-dark">
            <span class="badge bg-primary">¿Tema fijado?</span>
            <span class="text-white">{{ q.title }}</span>
            <a
              href=""
              class="badge bg-danger float-end"
              style="margin-right: 1rem"
              >Eliminar</a
            >
            <a
              href=""
              class="badge bg-warning float-end"
              style="margin-right: 1rem"
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
                <i class="far fa-heart text-danger"></i>
                <small>10</small>
                &nbsp;&nbsp;
                <i class="far fa-comment text-success"></i>
                <small>10</small>
                &nbsp;&nbsp;
              </div>
              <div class="col-md-6">
                <a href class="badge bg-dark ml-1">Android</a>
                <a href class="badge bg-dark ml-1">Web</a>
              </div>
              <!--
              <div class="col-md-2">
                <a href="" class="btn btn-sm btn-dark float-end">Read</a>
              </div>
              -->
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
    createComment(q_id) {
      var data = new FormData();
      data.append("question_id", q_id);
      data.append("comment", this.comment);
      axios.post("/question/comment/create", data).then(res => {
        const {success, comment} = res.data;
        if(success){
            this.q.comment.push(comment);
        }
      });
    },
  },
};
</script>
