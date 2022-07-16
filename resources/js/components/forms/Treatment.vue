<template>
  <v-container>
    <v-form lazy-validation ref="form">
      <v-row>
        <v-col cols="12" class="pa-0">
          <v-select
            label="Type"
            outlined
            dense
            name="type"
            :items="[
              'Aucun',
              'ECG',
              'Echographie',
              'Scan',
              'Echo abdo',
              'Ech thorax',
              'Echo pelvienne',
              'Radiographie multiple',
              'Radio crâne',
              'Radio membre supérieur',
              'Radio membre inférieur',
              'Radio thorax',
              'Radio ASP',
              'Radio coeur-poumons',
              'Radio épaules',
              'Radio bassin',
              'Radio dorsale',
            ]"
            required
            :rules="rules.type"
            v-model="newTreatment.type"
          ></v-select>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" class="pa-0">
          <v-textarea
            label="Autres examens paracliniques supplémentaires et résultats"
            outlined
            dense
            name="autre"
            type="text"
            required
            :rules="rules.treatment"
            v-model="newTreatment.autre"
          ></v-textarea>
        </v-col>
      </v-row>
      <v-row class="mb-2">
        <v-col cols="6" class="pa-0">
          <v-btn color="primary" class="mr-1" @click="handleSubmit">
            Soumettre
          </v-btn>
          <v-btn @click="handleReset"> Abandonner </v-btn>
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
        // type: [(v) => !!v || "Le champ type est requis"],
        // treatment: [(v) => !!v || "Le champ autres examen est requis"],
      },
      newTreatment: {
        type: null,
        autre: null,
      },
    };
  },
  methods: {
    handleSubmit() {
      const isValid = this.$refs.form.validate();

      if (isValid) {
        console.log("Final form submit");
        this.$emit("onNextStep", null, { newTreatment: this.newTreatment });
      }
    },
    handleReset() {
      console.log("handleReset");
      this.$emit("onResetForm");
    },
  },
};
</script>
