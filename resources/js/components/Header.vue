<template>
  <div class="card-header text-center">{{ welcome }}</div>
</template>

<script>
export default {
  name: "Header",
  data() {
    return {
      test: "test",
    };
  },
  props: ["welcome"],
};
</script>

<style>
</style>