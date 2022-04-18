<template>
  <v-container>
    <v-form lazy-validation ref="form">
      <v-row>
        <v-col cols="12" class="pa-0">
          <v-select
            label="Type"
            outlined
            dense
            name="traitement_type"
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
          ></v-select>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" class="pa-0">
          <v-textarea
            label="Autres examens paracliniques supplémentaires et résultats"
            outlined
            dense
            name="traitement_autre"
            type="text"
            required
            :rules="rules.treatment"
          ></v-textarea>
        </v-col>
      </v-row>
      <v-row class="mb-2">
        <v-col cols="6" class="pa-0">
          <v-btn color="primary" class="mr-1" @click="handleClick">
            Soumettre
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
        type: [(v) => !!v || "Le champ type est requis"],
        treatment: [(v) => !!v || "Le champ autres examen est requis"],
      },
      newTreatment: {
        traitement_type: "",
        traitement_autre: "",
      },
    };
  },
  methods: {
    handleClick() {
      const isValid = this.$refs.form.validate();

      if (isValid) {
        console.log("Final form submit");
        this.$emit("onNextStep", null, newTreatment);
      }
    },
  },
};
</script>