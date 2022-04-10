<template>
  <v-app-bar color="primary" dark app>
    <v-toolbar-title>{{ title }}</v-toolbar-title>

    <v-spacer></v-spacer>

    <a href="" id="link">Se déconnecter</a>
  </v-app-bar>
</template>

<script>
export default {
  props: ["title"],
};
</script>


<style scoped lang="scss">
#link {
  color: white;
  text-decoration: none;

  &:hover {
    text-decoration: underline;
  }
}
</style>