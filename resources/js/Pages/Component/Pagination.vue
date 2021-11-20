<template>
  <div class="card">
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-between">
        <li class="page-item" :class="{active:l.active}" v-for='(l,index) in links' :key="index">
          <a class="page-link" :href='l.url'>
            {{l.label}}
          </a>
          </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Pagination",
  props: { links: Array },
  created() {
    var array = this.$page.props.questions.links;
    array[0].label = "Anterior";

    var array = this.$page.props.questions.links;
    array.slice(-1)[0].label = "Siguiente";
  },
};

</script>
