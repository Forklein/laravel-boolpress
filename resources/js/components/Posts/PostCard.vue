<template>
  <div class="card mt-3">
    <div class="card-header">{{ posts.title }}</div>
    <div class="card-body">{{ posts.content }}</div>
    <div class="card-footer">Pubblicato il {{ getDate(posts.created_at) }}</div>
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