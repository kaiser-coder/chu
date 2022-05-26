<template>
  <v-container fluid>
    <v-row>
      <v-col class="pa-0 mr-auto ml-auto" lg="8" md="12"
        ><div class="full-bg pa-10">
          <v-alert
            class="alert"
            border="left"
            :color="alert.color"
            dense
            :type="alert.type"
            transition="scale-transition"
            :value="alert.state"
            dismissible
          >
            {{ alert.message }}
          </v-alert>
        </div>
      </v-col>
    </v-row>
    <v-row>
      <v-col lg="12">
        <v-btn color="warning" @click="isShown = true">Nouveau</v-btn>
        <NewExaminer
          :isShown="isShown"
          @onSubmitExaminer="handleSubmitExaminer"
          @onCloseDialog="handleCloseDialog"
        />
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
import NewExaminer from "../components/dialogs/NewExaminer.vue";

export default {
  data() {
    return {
      isShown: false,
      alert: {
        state: false,
        message: "",
        color: "",
        type: "",
      },
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
  mounted() {
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
  methods: {
    handleSubmitExaminer(examiner) {
      let postUrl = "/api/examiners";
      const formdata = new FormData();

      Object.entries(examiner).map(([key, value]) => {
        formdata.append(key, value);
      });

      axios
        .post(postUrl, formdata)
        .then((response) => {
          // console.log(response);
          const { id, examinateur } = response.data;

          this.table.examiners.push({
            id: id,
            name: examinateur,
          });

          this.alert = {
            status: true,
            message: "Ajout du nouvel examinateur réussi",
            color: "green",
            type: "success",
          };
        })
        .catch((error) => {
          // console.log(error.response);
          if (error.response.status == 409) {
            this.alert = {
              status: true,
              message: "Ce médecin existe déjà",
              color: "red",
              type: "danger",
            };
          } else {
            this.alert = {
              status: true,
              message: error,
              color: "red",
              type: "danger",
            };
          }
        })
        .finally(() => (this.isShown = false));
    },
    handleCloseDialog(bool) {
      this.isShown = bool;
    },
  },
};
</script>
