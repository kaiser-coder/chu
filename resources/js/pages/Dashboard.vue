<template>
  <v-container fluid>
    <v-row>
      <v-col lg="6">
        <v-card color="warning" dark>
          <v-card-title class="d-flex flex-column align-start">
            <div class="text-h6 font-weight-light">Nb. de patients</div>
            <div>{{ patientsCount }}</div>
          </v-card-title>
        </v-card>
      </v-col>
      <v-col lg="6">
        <v-card color="primary" dark>
          <v-card-title class="d-flex flex-column align-start">
            <div class="text-h6 font-weight-light">Nb. d'examinateurs</div>
            <div>{{ examinersCount }}</div>
          </v-card-title>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapState } from "pinia";
import { usePatientStore } from "../stores/patients";
import { useExaminerStore } from "../stores/examiners";

export default {
  name: "Dashboard",
  computed: {
    ...mapState(usePatientStore, { patientsCount: "count" }),
    ...mapState(useExaminerStore, { examinersCount: "count" }),
  },
};
</script>
