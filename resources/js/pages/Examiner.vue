<template>
  <v-container fluid>
    <v-row>
      <v-col lg="12">
        <v-btn color="warning" @click="$router.push('/app/examiners/new')">Nouveau</v-btn>
      </v-col>
    </v-row>
    <v-row>
      <v-col lg="12">
        <DataTable :headers="table.headers" :items="table.examiners" />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from "axios";
import DataTable from "../components/DataTable.vue";
import NewExaminer from "./NewExaminer.vue";

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
        ],
        examiners: [],
      },
    };
  },
  components: { DataTable, NewExaminer },
  beforeMount() {
    let getUrl = "/api/examiners";
    axios
      .get(getUrl)
      .then((response) => {
        // console.log(response.data);

        response.data.map((d) => {
          this.table.examiners.push({
            id: d.id_medecin,
            name: d.examinateur,
          });
        });
      })
      .catch((error) => console.error(error));
  },
};
</script>
