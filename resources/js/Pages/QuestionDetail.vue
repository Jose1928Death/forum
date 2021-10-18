<template>
  <Master>
    <div class="card">
      <div class="card-header">
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
                  printer took a galley of type and scrambled it to make a type
                  specimen book. It has survived not only five centuries, but
                  also the leap into electronic typesetting, remaining
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
        <div class="row">
            <div class="col-md-12">
                <div class="card text-white">
                    <div class="card-header bg-dark">
                        <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50"
                        width="30px" style="border-radius:50%" alt=""/>
                        MTK
                        <small>commented 1 min ago</small>
                    </div>
                    <div class="card-body text-dark">
                        <p>Its nice</p>
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
export default {
  components: { Master },
  name: "QuestionDetail",
};
</script>
