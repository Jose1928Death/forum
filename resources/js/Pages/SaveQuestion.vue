<template>
  <Master>
    <div class="container">
      <div class="card" v-for="(q, index) in questions" :key="index">
        <div class="card-body">
          <i class="fas fa-save text-primary"></i>&nbsp;Título:
          <a :href="route('question.detail', q.question.post)">{{
            q.question.title
          }}</a>
          <br>
          <label>{{
            q.question.description
          }}</label>
        </div>
      </div>
    </div>
  </Master>
</template>
<script>
import Master from "./Layout/Master";
import Vue from "vue";
Vue.mixin({ methods: { route: window.route } });
export default {
  name: "SaveQuestion",
  components: { Master },
  data() {
    return {
      questions: [],
    };
  },
  created() {
    this.questions = this.$page.props.questions;
  },
};
</script>
