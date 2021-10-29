<template>
  <div class="col-md-4">
    <a href="/question/create" class="btn btn-primary btn-block">Escribir un nuevo tema</a>
    <div class="card">
      <div class="card-header">Tags</div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item" v-for="tag in $page.props.tag" :key="tag.id">
            <a>{{ tag.name }}</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Sidebar",
};
</script>
