<template>
  <v-container fluid>
    <v-row>
      <v-col lg="12">
        <v-btn color="warning" @click="$router.push('/app/examiners/new')"
          >Nouveau</v-btn
        >
      </v-col>
    </v-row>
    <v-row>
      <v-col lg="12">
        <DataTable
          :headers="table.headers"
          :items="examiners"
          :loading="loading"
        />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import DataTable from "../components/DataTable.vue";

import { mapActions, mapState } from "pinia";
import { useExaminerStore } from "../stores/examiners.model";

export default {
  data() {
    return {
      table: {
        headers: [
          {
            text: "ID",
            align: "start",
            sortable: true,
            value: "id",
          },
          {
            text: "Nom de l'examinateur",
            align: "start",
            sortable: true,
            value: "name",
          },
          {
            text: "Actions",
            align: "start",
            value: "actions",
            sortable: false,
          },
        ],
      },
      loading: false,
    };
  },
  components: { DataTable },
  computed: {
    ...mapState(useExaminerStore, ["examiners"]),
  },
  methods: {
    ...mapActions(useExaminerStore, ["fetchExaminers"]),
  },
  mounted() {
    this.loading = true;
    this.fetchExaminers().then(() => (this.loading = false));
  },
};
</script>
