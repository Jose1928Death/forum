<template>
  <Master>
    <div v-for="(q, index) in questions" :key="q.id" class="card">
      <div class="card-header bg-dark">
        <span v-if="q.fiexed == 'false'" class="badge bg-primary">¿Tema fijado?</span>
        <span v-else class="badge bg-success">Fijado</span>
        <span class="text-white">{{ q.title }}</span>
        <a v-show="isOwn(q.user_id)" href="" class="badge bg-danger float-end" style="margin-right: 1rem"
          >Eliminar</a
        >
        <a v-show="isOwn(q.user_id)" href="" class="badge bg-warning float-end" style="margin-right: 1rem"
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
            <!-- Like -->
            <i v-show="q.is_like !='true'" @click="like(q.id, index)" class="far fa-heart text-primary"></i>
            <i v-show="q.is_like == 'true'" class="fas fa-heart"></i>
            <small>{{q.like_count}}</small>
            &nbsp;&nbsp;
            <!-- Comentario -->
            <i class="far fa-comment text-primary"></i>
            <small>{{ q.comment.length }}</small>
            &nbsp;&nbsp;
            <!-- Favorito -->
            <i class="far fa-star text-primary"></i>
            &nbsp;&nbsp;
          </div>
          <div class="col-md-6">
            <a v-for="t in q.tag" :key="t.id" href class="badge bg-dark ml-1">{{t.name}}</a>
          </div>
          <div class="col-md-2">
            <a :href="route('question.detail',q.post)" class="btn btn-sm btn-dark float-end"
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
import axios from 'axios';
import Vue from 'vue'

Vue.mixin({methods:{route:window.route}});

export default {
  components: {
    Head,
    Link,
    Master,
  },

  data(){
      return {
        questions:""//this.$page.props.questions,
      }
  },

  created(){
      this.questions = this.$page.props.questions;
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
    like(q_id, index){
        this.questions[index].is_like = "true";
        this.questions[index].like_count++;
        this.questions;
        axios.get(`/question/like/${q_id}`).then(res=>{});
    },
    isOwn(user_id){
        var auth_user_id = this.$page.props.auth_user.id;
        if(user_id == auth_user_id){
            return true;
        }
        return false;
    }
    //},
  },

  mounted() {
    //this.getSuccess();
  },
};
</script>
