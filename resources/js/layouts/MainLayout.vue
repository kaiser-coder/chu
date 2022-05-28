<template>
  <v-app>
    <Sidebar :items="items" :drawer="drawer" />

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
        { title: "Tableau de bord", path: "dashboard" },
        { title: "Patients", path: "patients" },
        { title: "Examinateurs", path: "examiners" },
      ],
      title: "Tableau de bord",
      drawer: true,
    };
  },
  components: { Sidebar, Appbar },
  updated() {
    const { path } = this.$router.history.current;
    this.setTitle(path);
  },
  mounted() {
    const { path } = this.$router.history.current;
    this.setTitle(path);
  },
  methods: {
    setTitle(path) {
      this.title = this.items.filter(
        (d) => d.path === path.replace("/", "")
      )[0].title;
    },
  },
};
</script>
