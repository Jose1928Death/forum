<template>
  <Master>
        <div class="card">
          <div class="card-header">Bienvenido mg</div>
          <div class="card-body">
            <form action="">
              <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" value="Mg" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" value="Mg" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="text" value="Mg" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Nombre</label>
                <input type="file" class="form-control" />
              </div>
            </form>
          </div>
        </div>
  </Master>
</template>

<script>
import Master from "./Layout/Master";
export default {
  components: {
    Master,
  },
  name: "EditUser",
};
</script>
