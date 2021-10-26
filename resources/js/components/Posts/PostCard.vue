<template>
  <div class="card mt-2">
    <div class="card-header d-flex justify-content-between">
      <h5 class="m-0 font-weight-bold">Title: {{ post.title }}</h5>
      <h6 class="m-0">
        Tags:
        {{ post.tags.length > 0 ? getTags(post.tags) : "Nessun Tags" }}
      </h6>
    </div>
    <div class="card-body">
      <p class="m-0">{{ post.content }}</p>
    </div>
    <div class="card-footer d-flex justify-content-between">
      <div class="author d-flex">
        <p class="m-0 mr-5 font-weight-bold">
          {{ post.author ? post.author.name : "Nessun autore" }}
        </p>
        <p class="m-0">Pubblicato il {{ getDate(post.created_at) }}</p>
      </div>
      <span
        class="badge p-2 rounded-pill"
        :class="`badge-${post.category ? post.category.color : 'dark'}`"
        >{{ post.category ? post.category.name : "Nessuna Categoria" }}</span
      >
      <!-- <p class="m-0">
        Categoria: {{ post.category.name ?? "Nessuna categoria" }}
      </p> -->
      <!-- <p v-if="post.category_id" class="m-0">
        Categoria: {{ post.category.name }}
      </p>
      <p v-else class="m-0">Nessuna Categoria</p> -->
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
    getTags(tags) {
      let postTag = "";
      tags.forEach((tag) => {
        postTag += tag.name + "-";
      });
      return postTag;
    },
  },
};
</script>

<style>
</style>