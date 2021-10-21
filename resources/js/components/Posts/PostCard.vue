<template>
  <div class="card mt-2">
    <div class="card-header">
      <h3 class="m-0">{{ posts.title }}</h3>
    </div>
    <div class="card-body">
      <p class="m-0">{{ posts.content }}</p>
    </div>
    <div class="card-footer d-flex justify-content-between">
      <p class="m-0">Pubblicato il {{ getDate(posts.created_at) }}</p>
      <p class="m-0">
        Category {{ posts.category.name || "Nessuna categoria" }}
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["posts"],
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