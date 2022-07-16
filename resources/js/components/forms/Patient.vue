<template>
  <v-container>
    <v-form lazy-validation ref="form">
      <v-row>
        <v-col lg="12" class="pa-0"
          ><v-select
            label="Genre"
            outlined
            dense
            :items="['Homme', 'Femme']"
            required
            name="sexe"
            :rules="rules.gender"
            v-model="newPatient.sexe"
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
            name="nom_patient"
            :rules="rules.firstname"
            v-model="newPatient.nom_patient"
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
            name="prenom"
            :rules="rules.lastname"
            v-model="newPatient.prenom"
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
            name="date_naiss"
            :rules="rules.birthdate"
            v-model="newPatient.date_naiss"
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
            v-model="newPatient.age"
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
            name="adresse"
            :rules="rules.adress"
            v-model="newPatient.adresse"
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
            name="profession"
            :rules="rules.job"
            v-model="newPatient.profession"
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
            name="remarque"
            :rules="rules.notice"
            v-model="newPatient.remarque"
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
        gender: [(v) => !!v || "Le champ civilité est requis"],
        firstname: [(v) => !!v || "Le nom est requis"],
        lastname: [(v) => !!v || "Le prénom est requis"],
        birthdate: [(v) => !!v || "La date de naissance est requise"],
        age: [(v) => !!v || "Le champ âge est requis"],
        adress: [(v) => !!v || "L'adresse est requise"],
        job: [(v) => !!v || "La profession est requise"],
        // notice: [(v) => !!v || "Le champ remarque est requis"],
      },
      newPatient: {
        sexe: null,
        nom_patient: null,
        prenom: null,
        date_naiss: null,
        age: null,
        adresse: null,
        profession: null,
        remarque: null,
      },
    };
  },
  methods: {
    handleClick() {
      const isValid = this.$refs.form.validate();

      if (isValid) {
        this.$emit("onNextStep", 2, { newPatient: this.newPatient });
      }
    },
  },
};
</script>
