<template>
  <div class="container">
    <div class="row">
      <div class="col-8 mx-auto">
        <Header />
        <PostList />
      </div>
    </div>
  </div>
</template>

<script>
import Header from "./Header";
import PostList from "./Posts/PostList";

export default {
  name: "App",
  components: {
    Header,
    PostList,
  },
};
</script>
