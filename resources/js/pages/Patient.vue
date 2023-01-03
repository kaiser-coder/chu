<template>
  <v-container fluid>
    <v-row>
      <v-col lg="12">
        <v-btn color="warning" @click="$router.push('/app/patients/new')"
          >Nouveau</v-btn
        >
      </v-col>
    </v-row>
    <v-row>
      <v-col lg="12">
        <DataTable :items="items" :headers="headers" />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapState } from "pinia";
import DataTable from "../components/DataTable.vue";

import { usePatientStore } from "../stores/patients.model";

export default {
  components: { DataTable },
  data() {
    return {
      headers: [
        {
          text: "ID Patient",
          align: "start",
          sortable: true,
          value: "id",
        },
        {
          text: "Genre",
          align: "start",
          sortable: true,
          value: "gender",
        },
        {
          text: "Nom",
          align: "start",
          sortable: true,
          value: "name",
        },
        {
          text: "Prenom",
          align: "start",
          sortable: true,
          value: "firstname",
        },
        {
          text: "Date de naissance",
          align: "start",
          sortable: true,
          value: "birthdate",
        },
        {
          text: "Age",
          align: "start",
          sortable: true,
          value: "age",
        },
        {
          text: "Adresse",
          align: "start",
          sortable: true,
          value: "address",
        },
        {
          text: "Profession",
          align: "start",
          sortable: true,
          value: "job",
        },
        {
          text: "Actions",
          align: "start",
          value: "actions",
          sortable: false,
        },
      ],
    };
  },
  computed: {
    ...mapState(usePatientStore, { items: "patients" }),
  },
};
</script>
