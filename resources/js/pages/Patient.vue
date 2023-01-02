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

import { usePatientStore } from "../stores/patients";

export default {
  components: { DataTable },
  data() {
    return {
      headers: [
        {
          text: "ID Patient",
          align: "start",
          sortable: true,
          value: "id_patient",
        },
        {
          text: "Genre",
          align: "start",
          sortable: true,
          value: "sexe",
        },
        {
          text: "Nom",
          align: "start",
          sortable: true,
          value: "nom_patient",
        },
        {
          text: "Prenom",
          align: "start",
          sortable: true,
          value: "prenom",
        },
        {
          text: "Date de naissance",
          align: "start",
          sortable: true,
          value: "date_naiss",
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
          value: "adresse",
        },
        {
          text: "Profession",
          align: "start",
          sortable: true,
          value: "profession",
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
