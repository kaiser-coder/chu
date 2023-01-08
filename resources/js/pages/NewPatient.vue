<template>
  <v-row justify="center">
    <v-col>
      <v-stepper v-model="active">
        <v-stepper-header>
          <template v-for="step in steps">
            <v-stepper-step
              editable
              :key="`${step.key}-step`"
              :step="step.key"
              :complete="active > step.key"
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
                <Patient />
              </v-card-text>
            </v-stepper-content>

            <!-- Assistant form -->
            <v-stepper-content step="2">
              <v-card-text>
                <Assistant />
              </v-card-text>
            </v-stepper-content>

            <!-- Consultation form -->
            <v-stepper-content step="3">
              <v-card-text>
                <Consultation />
              </v-card-text>
            </v-stepper-content>

            <!-- Treatment form -->
            <v-stepper-content step="4">
              <v-card-text>
                <Treatment @onResetForm="resetForm" />
              </v-card-text>
            </v-stepper-content>
          </v-stepper-items>
        </v-card>
      </v-stepper>
    </v-col>
  </v-row>
</template>

<script>
import Patient from "../components/forms/Patient.vue";
import Assistant from "../components/forms/Assistant.vue";
import Consultation from "../components/forms/Consultation.vue";
import Treatment from "../components/forms/Treatment.vue";

import { useStepperStore } from "../stores/stepper";
import { mapState } from "pinia";

export default {
  name: "NewPatient",
  data() {
    return {
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
  computed: {
    ...mapState(useStepperStore, ["active"]),
  },
  methods: {
    resetForm() {
      console.log("resetForm");
      this.form.reset();
    },
  },
};
</script>
