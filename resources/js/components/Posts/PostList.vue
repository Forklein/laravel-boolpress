<template>
  <main>
    <section id="postlist">
      <h2>I miei Post</h2>
      <PostCard v-for="post in posts" :key="post.id" :posts="post" />
    </section>
  </main>
</template>

<script>
import PostCard from "../Posts/PostCard";

export default {
  name: "PostList",
  components: {
    PostCard,
  },
  data() {
    return {
      posts: [],
    };
  },
  created() {
    axios
      .get("http://127.0.0.1:8000/api/posts")
      .then((res) => {
        this.posts = res.data;
      })
      .catch((err) => {
        console.log(err);
      });
  },
};
</script>

<style scoped lang="scss">
</style>