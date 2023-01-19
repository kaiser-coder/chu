<template>
  <v-container>
    <v-form lazy-validation ref="form">
      <v-row>
        <v-col lg="12" class="pa-0">
          <v-text-field label="Nom complet" outlined dense type="text" required name="nom" :rules="rules.fullname" v-model="assistant.fullname"></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col lg="12" class="pa-0">
          <v-text-field label="Adresse" outlined dense type="text" required name="adresse" v-model="assistant.address" :rules="rules.address"></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col lg="12" class="pa-0">
          <v-text-field label="Contact" outlined dense type="text" required name="contact" v-model="assistant.contact" :rules="rules.contact"></v-text-field>
        </v-col>
      </v-row>
      <v-row class="mb-2">
        <v-col cols="6" class="pa-0">
          <v-btn color="primary" class="mr-1" @click="handleClick"> Continuer </v-btn>
          <v-btn text @click="dialog = false"> Abandonner </v-btn>
        </v-col>
      </v-row>
    </v-form>
  </v-container>
</template>

<script>
import { mapActions } from "pinia"
import { useStepperStore } from "../../stores/stepper"
import { usePatientStore } from "../../stores/patients.model"

export default {
  data() {
    return {
      rules: {
        fullname: [(v) => !!v || "Le nom complet est requis"],
        address: [(v) => !!v || "L'adresse de l'accompagnat est requise"],
        contact: [(v) => !!v || "Le contact est requis"],
      },
      assistant: {},
    }
  },
  methods: {
    ...mapActions(useStepperStore, ["switchStep"]),
    ...mapActions(usePatientStore, ["setActivePatient"]),

    handleClick() {
      const isValid = this.$refs.form.validate()

      this.switchStep(3)
      this.setActivePatient({ assistant: this.assistant })
    },
  },
}
</script>
