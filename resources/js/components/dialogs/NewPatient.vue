<template>
  <v-form>
    <v-row justify="center">
      <v-dialog v-model="dialog" persistent max-width="800px">
        <v-stepper value="1">
          <v-stepper-header>
            <template v-for="step in steps">
              <v-stepper-step
                editable
                :key="`${step.key}-step`"
                :step="step.key"
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
              <v-stepper-content :step="1">
                <v-card-text>
                  <Patient />
                </v-card-text>
              </v-stepper-content>

              <!-- Assistant form -->
              <v-stepper-content :step="2">
                <v-card-text>
                  <Assistant />
                </v-card-text>
              </v-stepper-content>

              <!-- Consultation form -->
              <v-stepper-content :step="3">
                <v-card-text>
                  <Consultation />
                </v-card-text>
              </v-stepper-content>

              <!-- Treatment form -->
              <v-stepper-content :step="4">
                <v-card-text>
                  <Treatment />
                </v-card-text>
              </v-stepper-content>

              <v-card-actions class="pb-4 px-10 justify-end">
                <v-btn color="primary"> Continuer </v-btn>

                <v-btn text> Abandonner </v-btn>
              </v-card-actions>
            </v-stepper-items>
          </v-card>
        </v-stepper>
      </v-dialog>
    </v-row>
  </v-form>
</template>

<script>
import Patient from "../forms/Patient.vue";
import Assistant from "../forms/Assistant.vue";
import Consultation from "../forms/Consultation.vue";
import Treatment from "../forms/Treatment.vue";

export default {
  data() {
    return {
      dialog: true,
      steps: [
        {
          key: 1,
          title: "Nouveau patient",
        },
        { key: 2, title: "Accompagnant" },
        { key: 3, title: "Consultation" },
        { key: 4, title: "Traitement" },
      ],
    };
  },
  components: { Patient, Assistant, Consultation, Treatment },
};
</script>
