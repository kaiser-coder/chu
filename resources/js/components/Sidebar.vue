<template>
  <v-navigation-drawer color="primary" dense dark app v-model="drawer">
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title class="text-h6"> Application </v-list-item-title>
        <v-list-item-subtitle> CHU </v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>

    <v-divider></v-divider>

    <v-list dense nav>
      <v-list-item v-for="item in items" :key="item.title" link>
        <v-list-item-content class="pl-10">
          <router-link :to="item.path">
            <v-list-item-title>
              {{ item.title }}
            </v-list-item-title>
          </router-link>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
export default {
  props: {
    items: Array,
    drawer: Boolean,
  },
};
</script>

<style scoped lang="scss">
a {
  text-decoration: none;
  color: white;
}
</style>
