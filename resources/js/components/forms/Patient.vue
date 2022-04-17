<template>
  <v-container>
    <v-form lazy-validation ref="form">
      <v-row>
        <v-col lg="12" class="pa-0"
          ><v-text-field
            label="Numéro"
            outlined
            dense
            type="text"
            required
            name="number"
            :rules="rules.number"
          ></v-text-field
        ></v-col>
      </v-row>
      <v-row>
        <v-col lg="12" class="pa-0"
          ><v-select
            label="Civilité"
            outlined
            dense
            :items="['Monsieur', 'Madame']"
            required
            name="gender"
            :rules="rules.gender"
          ></v-select
        ></v-col>
      </v-row>
      <v-row>
        <v-col lg="12" class="pa-0"
          ><v-text-field
            label="Nom"
            outlined
            dense
            type="text"
            required
            name="firstname"
            :rules="rules.firstname"
          ></v-text-field
        ></v-col>
      </v-row>
      <v-row>
        <v-col lg="12" class="pa-0"
          ><v-text-field
            label="Prénom"
            outlined
            dense
            type="text"
            name="lastname"
            :rules="rules.lastname"
          ></v-text-field
        ></v-col>
      </v-row>
      <v-row>
        <v-col lg="6" class="px-0 pr-1"
          ><v-text-field
            label="Date de naissance"
            outlined
            dense
            type="date"
            required
            name="birthdate"
            :rules="rules.birthdate"
          ></v-text-field
        ></v-col>
        <v-col lg="6" class="px-0 pl-1"
          ><v-text-field
            label="Age"
            outlined
            dense
            type="number"
            required
            name="age"
            :rules="rules.age"
          ></v-text-field
        ></v-col>
      </v-row>
      <v-row>
        <v-col lg="12" class="pa-0">
          <v-text-field
            label="Adresse"
            outlined
            dense
            type="text"
            required
            name="adress"
            :rules="rules.adress"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col lg="12" class="pa-0">
          <v-text-field
            label="Profession"
            outlined
            dense
            type="text"
            required
            name="job"
            :rules="rules.job"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col lg="12" class="pa-0">
          <v-textarea
            label="* Remarque"
            outlined
            dense
            type="text"
            required
            name="notice"
            :rules="rules.notice"
          ></v-textarea>
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
        number: [(v) => !!v || "Le numéro est requis"],
        gender: [(v) => !!v || "Le champ civilité est requis"],
        firstname: [(v) => !!v || "Le nom est requis"],
        lastname: [(v) => !!v || "Le prénom est requis"],
        birthdate: [(v) => !!v || "La date de naissance est requise"],
        age: [(v) => !!v || "Le champ âge est requis"],
        adress: [(v) => !!v || "L'adresse est requise"],
        job: [(v) => !!v || "La profession est requise"],
        // notice: [(v) => !!v || "Le champ remarque est requis"],
      },
    };
  },
  methods: {
    handleClick() {
      const isValid = this.$refs.form.validate();

      if (isValid) {
        this.$emit("onNextStep", 2);
      }
    },
  },
};
</script>
