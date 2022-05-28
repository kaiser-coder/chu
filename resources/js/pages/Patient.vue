<template>
  <v-container fluid>
    <v-row>
      <v-col lg="12">
        <v-btn color="warning" @click="isShown = true">Nouveau</v-btn>
        <NewPatient :isShown="isShown" @onCloseDialog="isShown = false" />
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
import NewPatient from "../components/dialogs/NewPatient.vue";

export default {
  components: { DataTable, NewPatient },
  data() {
    return {
      isShown: false,
    };
  },
};
</script>
