<template>
  <v-container>
    <v-form lazy-validation ref="form">
      <v-row>
        <v-col lg="12" class="pa-0">
          <v-text-field
            label="Nom complet"
            outlined
            dense
            type="text"
            required
            name="accompagnant_nom"
            :rules="rules.fullname"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col lg="12" class="pa-0">
          <v-text-field
            label="Adresse"
            outlined
            dense
            type="text"
            required
            name="accompagnant_adresse"
            :rules="rules.address"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col lg="12" class="pa-0">
          <v-text-field
            label="Contact"
            outlined
            dense
            type="text"
            required
            name="accompagnant_contact"
            :rules="rules.contact"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row class="mb-2">
        <v-col cols="6" class="pa-0">
          <v-btn color="primary" class="mr-1" @click="handleClick">
            Continuer
          </v-btn>
          <v-btn text @click="dialog = false"> Abandonner </v-btn>
        </v-col>
      </v-row>
    </v-form>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      rules: {
        fullname: [(v) => !!v || "Le nom complet est requis"],
        address: [(v) => !!v || "L'adresse de l'accompagnat est requise"],
        contact: [(v) => !!v || "Le contact est requis"],
      },
      newAssistant: {
        accompagnant_nom: "",
        accompagnant_adresse: "",
        accompagnant_contact: "",
      },
    };
  },
  methods: {
    handleClick() {
      const isValid = this.$refs.form.validate();

      if (isValid) {
        this.$emit("onNextStep", 3, newAssistant);
      }
    },
  },
};
</script>