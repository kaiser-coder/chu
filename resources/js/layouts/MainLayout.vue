<template>
  <v-app>
    <Sidebar />

    <Appbar />
    <v-main>
      <v-container>
        <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Sidebar from "../components/Sidebar.vue";
import Appbar from "../components/Appbar.vue";

export default {
  components: { Sidebar, Appbar },
};
</script>