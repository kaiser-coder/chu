<template>
  <v-app>
    <Sidebar :items="items" :drawer="drawer" @onChangePageTitle="setPageTitle" />

    <Appbar :title="title" @onToggleNavigationBar="drawer = !drawer" />
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
  data() {
    return {
      items: [
        { title: "Tableau de bord", path: "/app/dashboard" },
        { title: "Patients", path: "/app/patients" },
        { title: "Examinateurs", path: "/app/examiners" },
      ],
      title: "Tableau de bord",
      drawer: false,
    };
  },
  components: { Sidebar, Appbar },
};
</script>
