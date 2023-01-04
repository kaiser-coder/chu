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
        <DataTable :items="items" :headers="headers" :loading="loading" />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import DataTable from "../components/DataTable.vue";
import { mapActions, mapState } from "pinia";

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
          value: "lastname",
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
      loading: false,
    };
  },
  computed: {
    ...mapState(usePatientStore, { items: "patients" }),
  },
  methods: {
    ...mapActions(usePatientStore, ["fetchPatients"]),
  },
  mounted() {
    this.loading = true;
    this.fetchPatients().then(() => (this.loading = false));
  },
};
</script>
