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
        <DataTable :headers="table.headers" :items="examiners" />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import DataTable from "../components/DataTable.vue";

import { mapState } from "pinia";
import { useExaminerStore } from "../stores/examiners";

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
    };
  },
  components: { DataTable },
  computed: {
    ...mapState(useExaminerStore, ["examiners"]),
  },
};
</script>
