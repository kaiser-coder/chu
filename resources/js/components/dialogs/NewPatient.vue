<template>
  <v-row justify="center">
    <v-dialog v-model="isShown" persistent max-width="750px">
      <v-stepper v-model="e1">
        <v-stepper-header>
          <template v-for="step in steps">
            <v-stepper-step
              editable
              :key="`${step.key}-step`"
              :step="step.key"
              :complete="e1 > step.key"
            >
              {{ step.title }}
            </v-stepper-step>

            <v-divider
              v-if="step.key !== steps.length"
              :key="step.key"
            ></v-divider>
          </template>
        </v-stepper-header>

        <v-card>
          <v-stepper-items>
            <!-- Patient form -->
            <v-stepper-content step="1">
              <v-card-text>
                <Patient @onNextStep="nextStep" />
              </v-card-text>
            </v-stepper-content>

            <!-- Assistant form -->
            <v-stepper-content step="2">
              <v-card-text>
                <Assistant @onNextStep="nextStep" />
              </v-card-text>
            </v-stepper-content>

            <!-- Consultation form -->
            <v-stepper-content step="3">
              <v-card-text>
                <Consultation @onNextStep="nextStep" />
              </v-card-text>
            </v-stepper-content>

            <!-- Treatment form -->
            <v-stepper-content step="4">
              <v-card-text>
                <Treatment @onNextStep="nextStep" @onResetForm="resetForm" />
              </v-card-text>
            </v-stepper-content>
          </v-stepper-items>
        </v-card>
      </v-stepper>
    </v-dialog>
  </v-row>
</template>

<script>
import Patient from "../forms/Patient.vue";
import Assistant from "../forms/Assistant.vue";
import Consultation from "../forms/Consultation.vue";
import Treatment from "../forms/Treatment.vue";

import axios from "axios";

export default {
  data() {
    return {
      e1: 1,
      steps: [
        {
          key: 1,
          title: "Nouveau patient",
        },
        { key: 2, title: "Accompagnant" },
        { key: 3, title: "Consultation" },
        { key: 4, title: "Traitement" },
      ],
      form: {},
    };
  },
  props: {
    isShown: Boolean,
  },
  components: { Patient, Assistant, Consultation, Treatment },
  methods: {
    nextStep(n, data) {
      Object.entries(data).forEach(([key, value]) => (this.form[key] = value));
      this.submit();

      if (n) this.e1 = n;
      else this.submit();
    },
    submit() {
      const postPatientUrl = "/api/patients";

      console.log(this.form);

      axios
        .post(postPatientUrl, this.form)
        .then((result) => {
          console.log(result);
          this.e1 = 1;
          this.dialog = false;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    resetForm() {
      console.log("resetForm");
      this.form.reset();
      this.$emit("onCloseDialog");
    },
  },
};
</script>
