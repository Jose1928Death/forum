<template>
  <Master>
    <div class="container">
      <div class="card" v-for="(q, index) in questions" :key="index">
          <div class="card">
          <div class="card-header bg-dark">
            &nbsp;
            <i class="fas fa-comments text-white"></i>
            &nbsp;
            <a class="text-white" :href="route('question.detail', q.question.post)">{{
            q.question.title
          }}</a>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <p>
                  {{
            q.question.description
          }}
                </p>
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
