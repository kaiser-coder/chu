<template>
  <!-- FIXME - Can't open sidebar -->
  <v-navigation-drawer
    color="primary"
    dense
    dark
    app
    v-model="navigationDrawer"
  >
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title class="text-h6"> Application </v-list-item-title>
        <v-list-item-subtitle> CHU </v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>

    <v-divider></v-divider>

    <v-list dense nav>
      <v-list-item
        v-for="item in items"
        :key="item.title"
        link
        @click="setActivePageName(item.title)"
      >
        <v-list-item-content class="pl-10">
          <v-list-item-title>
            <router-link :to="item.path">
              {{ item.title }}
            </router-link>
          </v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
import { mapState, mapActions } from "pinia";
import { useSidebarStore } from "../stores/sidebar";

export default {
  props: {
    items: Array,
  },
  computed: {
    ...mapState(useSidebarStore, ["navigationDrawer"]),
  },
  methods: {
    ...mapActions(useSidebarStore, ["setActivePageName"]),
  },
};
</script>

<style scoped lang="scss">
a {
  text-decoration: none;
  color: white;
}
</style>
