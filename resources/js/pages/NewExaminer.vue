<template>
  <v-container fluid>
    <v-row :class="{ 'd-none': !alert.status }">
      <v-col class="pa-0 mr-auto ml-auto" lg="8" md="12"
        ><div class="full-bg pa-10">
          <v-alert
            class="alert"
            border="left"
            transition="scale-transition"
            dense
            dismissible
            :color="alert.color"
            :type="alert.type"
            :value="alert.state"
          >
            {{ alert.message }}
          </v-alert>
        </div>
      </v-col>
    </v-row>
    <v-row justify="center">
      <v-col>
        <v-card>
          <v-form ref="form" lazy-validation>
            <v-card-title>
              <span class="text-h5">Nouvel examinateur</span>
            </v-card-title>
            <v-card-text>
              <v-container>
                <v-row>
                  <v-col lg="12" class="pa-0">
                    <v-text-field
                      label="Nom"
                      outlined
                      dense
                      type="text"
                      required
                      :rules="rules.name"
                      v-model="examiner.name"
                    ></v-text-field>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="handleReset">
                Annuler
              </v-btn>
              <v-btn color="blue darken-1" text @click="handleSubmit">
                Sauvegrader
              </v-btn>
            </v-card-actions>
          </v-form>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { useExaminerStore } from "../stores/examiners.model";
import { mapActions } from "pinia";

export default {
  name: "NewExaminer",
  data() {
    return {
      examiner: {
        name: "Jacob",
      },
      rules: {
        name: [(v) => !!v || "Le nom de l'examinateur est requis"],
      },
      alert: {
        state: false,
        message: "",
        color: "",
        type: "warning",
      },
    };
  },
  methods: {
    ...mapActions(useExaminerStore, ["submitExaminer"]),

    displayAlert(statusText, message) {
      switch (statusText) {
        case "success":
          this.alert = {
            status: true,
            message,
            color: "green",
            type: statusText,
          };
          break;

        case "warning":
          this.alert = {
            status: true,
            message,
            color: "warning",
            type: statusText,
          };

        case "error":
          this.alert = {
            status: true,
            message,
            color: "red",
            type: "danger",
          };
          break;

        default:
          break;
      }
    },

    async handleSubmit(e) {
      e.preventDefault();
      const isValid = this.$refs.form.validate();

      if (isValid) {
        const { data, status } = await this.submitExaminer(this.examiner);

        if (status === 201)
          this.displayAlert("success", "Ajout du nouvel examinateur réussi");
        else if (status === 409)
          this.displayAlert("warning", "Ce médecin existe déjà");
        else this.displayAlert("error", data.message);
      }
    },

    handleReset() {
      this.$refs.form.reset();
    },
  },
};
</script>
