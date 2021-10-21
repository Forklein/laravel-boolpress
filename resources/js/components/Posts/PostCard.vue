<template>
  <div class="card mt-2">
    <div class="card-header">
      <h3 class="m-0">{{ post.title }}</h3>
    </div>
    <div class="card-body">
      <p class="m-0">{{ post.content }}</p>
    </div>
    <div class="card-footer d-flex justify-content-between">
      <p class="m-0">Pubblicato il {{ getDate(post.created_at) }}</p>
      <p v-if="post.category_id" class="m-0">
        Categoria: {{ post.category.name }}
      </p>
      <p v-else class="m-0">Nessuna Categoria</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["post"],
  methods: {
    getDate(date) {
      let postDate = new Date(date);
      let day = postDate.getDate();
      if (day < 10) {
        day = "0" + day;
      }
      let month = postDate.getMonth();
      if (month < 10) {
        month = "0" + month;
      }
      const year = postDate.getFullYear();
      return `${day}-${month}-${year}`;
    },
  },
};
</script>

<style>
</style>