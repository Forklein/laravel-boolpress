<template>
  <div class="card my-3">
    <div class="card-header">{{ posts.title }}</div>
    <div class="card-body">{{ posts.content }}</div>
    <div class="card-footer">{{ posts.created_at }}</div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["posts"],
};
</script>

<style>
</style>