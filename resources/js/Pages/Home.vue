<template>
  <Master>
    <Link href="/logout">Logout</Link>
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

  methods: {
      //https://sweetalert2.github.io/#download
    getSuccess: function () {
      Swal.fire({
        icon: "success",
        title: "Oops...",
        text: "Something went wrong!"
      })
    },
  },

  mounted() {
    this.getSuccess();
  },

};
</script>
