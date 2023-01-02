<template>
  <v-app>
    <Sidebar :items="items" :drawer="drawer" />

    <Appbar :title="title" @onToggleNavigationBar="() => (drawer = !drawer)" />
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

import { mapActions, mapState } from "pinia";
import { usePatientStore } from "../stores/patients";
import { useExaminerStore } from "../stores/examiners";

export default {
  data() {
    return {
      items: [
        { title: "Tableau de bord", path: "/app/dashboard" },
        { title: "Patients", path: "/app/patients" },
        { title: "Examinateurs", path: "/app/examiners" },
      ],
      title: "Tableau de bord",
      drawer: true,
    };
  },
  components: { Sidebar, Appbar },
  methods: {
    ...mapActions(usePatientStore, ["fetchPatients"]),
  },
  computed: {
    ...mapState(useExaminerStore, ["fetchExaminers"]),
  },
  beforeMount() {
    this.fetchPatients();
    this.fetchExaminers();
  },
};
</script>
