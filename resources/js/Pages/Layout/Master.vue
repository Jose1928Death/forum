<template>
  <div>
    <!-- Navbar -->
    <Nav />
    <!-- Navbar -->
    <div class="container">
      <div class="row">
        <Sidebar />
        <div class="col-md-8">
          <slot></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Nav from "./Nav";
import Sidebar from "./Sidebar"
export default {
  components: { Nav, Sidebar, Footer },
  name: "Master",
};
</script>

