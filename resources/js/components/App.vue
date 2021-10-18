<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card text-center">
          <Header :welcome="test" />
          <div class="card-body">Work in progress</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Header from "./Header.vue";

export default {
  name: "App",
  components: {
    Header,
  },
  data() {
    return {
      test: "Benvenuto!",
    };
  },
};
</script>
