<template>
  <v-container fluid>
    <v-row>
      <v-col lg="12">
        <v-btn color="warning">Nouveau</v-btn>
        <NewExaminer />
      </v-col>
    </v-row>
    <v-row>
      <v-col lg="12">
        <DataTable />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import DataTable from "../components/DataTable.vue";
import NewExaminer from "../components/dialogs/NewExaminer.vue";

export default {
  components: { DataTable, NewExaminer },
};
</script>