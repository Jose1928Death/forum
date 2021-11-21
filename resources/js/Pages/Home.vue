<template>
  <Master>
    <Pagination :links="questions.links" />
    <div v-for="(q, index) in questions.data" :key="q.id" class="card">
      <div class="card-header bg-dark">
        <button v-if="q.fiexed == 'false'" class="badge bg-primary"
          ></button
        >
        <span v-else class="badge bg-success">Fijado</span>
        <span class="text-white">{{ q.title }}</span>
        <button
          v-show="isOwn(q.user_id)"
           v-on:click="deleteQuestion(index, q.id)"
          href=""
          class="badge bg-danger float-end"
          style="margin-right: 1rem"
          >Eliminar</button
        >
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
            <!-- Like -->
            <i
              v-show="q.is_like != 'true'"
              @click="like(q.id, index)"
              class="far fa-heart text-primary"
            ></i>
            <i v-show="q.is_like == 'true'" class="fas fa-heart"></i>
            <small>{{ q.like_count }}</small>
            &nbsp;&nbsp;
            <!-- Comentario -->
            <i class="far fa-comment text-primary"></i>
            <small>{{ q.comment.length }}</small>
            &nbsp;&nbsp;
            <!-- Favorito -->
            <i @click="saveQuestion(index,q.id)" v-show="!q.is_save" class="far fa-star text-primary"></i>
            <i v-show="q.is_save" class="fas fa-star text-primary"></i>
            &nbsp;&nbsp;
          </div>
          <div class="col-md-6">
            <a v-for="t in q.tag" :key="t.id" href class="badge bg-dark ml-1">{{
              t.name
            }}</a>
          </div>
          <div class="col-md-2">
            <a
              :href="route('question.detail', q.post)"
              class="btn btn-sm btn-dark float-end"
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
import axios from "axios";
import Vue from "vue";
import Pagination from "./Component/Pagination";

Vue.mixin({ methods: { route: window.route } });

export default {
  components: {
    Head,
    Link,
    Master,
    Pagination,
  },

  data() {
    return {
      questions: "", //this.$page.props.questions,
    };
  },

  created() {
    this.questions = this.$page.props.questions;
    this.$forceUpdate();
  },

  computed: {
    user() {
      return this.$page.props.auth_user;
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
    like(q_id, index) {
      this.questions.data[index].is_like = "true";
      this.questions.data[index].like_count++;
      axios.get(`/question/like/${q_id}`).then((res) => {});
    },
    isOwn(user_id) {
      var auth_user_id = this.$page.props.auth_user.id;
      if (user_id == auth_user_id) {
        return true;
      }
      return false;
    },
    setFixed(index, q_id) {
        var data = new FormData();
        data.append("id",q_id);
        axios.post('/question/set/fix',data)
        .then((res)=>{
            if(res.data.success){
                this.questions.data[index].setFixed = 'true';
            }
        })
    },
    //Borrar preguntas
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
    saveQuestion(index, q_id){
        var data = new FormData();
        data.append('question_id',q_id);
        axios.post("/question/save",data).then((res)=>{
            if(res.data.success){
                this.questions.data[index].is_save=true;
            }
        })
    }
  },
};
</script>
