<template>
  <main>
    <section id="postlist">
      <div class="header postlist d-flex justify-content-between pointer mt-3">
        <h3 class="font-italic">Posts</h3>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li v-if="currentPage > 1" class="page-item">
              <a class="page-link" @click="getPosts(currentPage - 1)"
                >Previous</a
              >
            </li>
            <li
              v-for="n in lastPage"
              :key="n"
              class="page-item"
              :class="currentPage == n ? 'active' : ''"
            >
              <a class="page-link" @click="getPosts(n)">{{ n }}</a>
            </li>
            <li v-if="currentPage < lastPage" class="page-item">
              <a class="page-link" @click="getPosts(currentPage + 1)">Next</a>
            </li>
          </ul>
        </nav>
      </div>
      <Loader v-if="isLoading" />
      <PostCard v-else v-for="post in posts" :key="post.id" :post="post" />
    </section>
  </main>
</template>

<script>
import PostCard from "../Posts/PostCard";
import Loader from "../Loader";

export default {
  name: "PostList",
  components: {
    PostCard,
    Loader,
  },
  data() {
    return {
      baseUri: "http://127.0.0.1:8000",
      posts: [],
      currentPage: "",
      lastPage: "",
      isLoading: false,
    };
  },
  methods: {
    getPosts(page) {
      this.isLoading = true;
      axios
        .get(`${this.baseUri}/api/posts?page=${page}`)
        .then((res) => {
          const { data, current_page, last_page } = res.data;
          this.posts = data;
          this.currentPage = current_page;
          this.lastPage = last_page;
        })
        .catch((err) => {
          console.log(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },
  },
  created() {
    this.getPosts(1);
  },
};
</script>

<style scoped lang="scss">
.pointer {
  cursor: pointer;
}
</style>