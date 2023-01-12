<template>
  <v-app>
    <Sidebar :items="items" />

    <Appbar
      :title="activePageName"
      @onToggleNavigationBar="setNavigationDrawer"
    />
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
import { useSidebarStore } from "../stores/sidebar";
import { useExaminerStore } from "../stores/examiners.model";
import { usePatientStore } from "../stores/patients.model";

export default {
  data() {
    return {
      items: [
        { title: "Tableau de bord", path: "/app/dashboard" },
        { title: "Patients", path: "/app/patients" },
        { title: "Examinateurs", path: "/app/examiners" },
      ],
    };
  },
  components: { Sidebar, Appbar },
  computed: {
    ...mapState(useSidebarStore, ["activePageName"]),
  },
  methods: {
    ...mapActions(useSidebarStore, [
      "setNavigationDrawer",
      "setActivePageName",
    ]),
    ...mapActions(useExaminerStore, ["fetchExaminers"]),
    ...mapActions(usePatientStore, ["fetchPatients"]),

    definePageName() {
      // TODO: Try to fix page title when on main page after reload
      /* const path = this.$router.history.current.path;
      const pageName = this.items.filter((i) => {
        return i.path === path;
      })[0];

      this.setActivePageName(pageName.title); */
    },
    init() {
      const token = this.$session.get("app_token");

      this.fetchExaminers(token);
      this.fetchPatients(token);
    },
  },
  beforeMount() {
    this.init();
  },
};
</script>
