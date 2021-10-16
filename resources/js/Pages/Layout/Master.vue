<template>
  <div>
    <!-- Navbar -->
    <Nav />
    <!-- Navbar -->
    <div class="container">
      <div class="row">
        <Sidebar />
        <div class="col-md-8">
            <!--
          <div class="card">
            <div class="card-header bg-dark">
              <span class="badge bg-danger">Need fixed</span>
              <span class="text-white">What is html?</span>
              <a
                href=""
                class="badge bg-danger float-end"
                style="margin-right: 1rem"
                >Delete</a
              >
              <a
                href=""
                class="badge bg-warning float-end"
                style="margin-right: 1rem"
                >Fixed</a
              >
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <p>
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a
                    type specimen book. It has survived not only five centuries,
                    but also the leap into electronic typesetting, remaining
                    essentially unchanged. It was popularised in the 1960s with
                    the release of Letraset sheets containing Lorem Ipsum
                    passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
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
                <div class="col-md-2">
                  <a href="" class="btn btn-sm btn-dark float-end">Read</a>
                </div>
              </div>
            </div>
          </div>
          -->
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
  components: { Nav, Sidebar },
  name: "Master",
};
</script>

