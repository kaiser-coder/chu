<template>
  <v-container>
    <v-form lazy-validation ref="form">
      <section>
        <v-row>
          <v-col cols="12" class="pa-0">
            <v-select
              label="Docteur"
              outlined
              dense
              :items="['One', 'Two']"
              required
              name="consulter_id_medecin"
              :rules="rules.examiner"
            ></v-select>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="6" class="px-0 pr-1">
            <v-text-field
              label="Date de consultation"
              outlined
              dense
              type="date"
              required
              name="consulter_date_consul"
              :rules="rules.date"
            ></v-text-field>
          </v-col>
          <v-col cols="6" class="px-0 pl-1">
            <v-text-field
              label="Heure de la consultation"
              outlined
              dense
              type="time"
              required
              name="consulter_heure"
              :rules="rules.time"
            ></v-text-field>
          </v-col>
        </v-row>
      </section>
      <v-row>
        <v-col cols="12" class="pa-0 mb-10">
          <h3>Responsable</h3>
          <v-divider></v-divider>
        </v-col>
      </v-row>
      <section>
        <v-row>
          <v-col cols="12" class="pa-0">
            <v-select
              label="Véhicule responsable"
              outlined
              dense
              name="conducteur_vehicule"
              :items="['Voiture', 'Moto', 'Bicyclette', 'Aucun']"
              :rules="rules.car"
              required
            ></v-select>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" class="pa-0">
            <v-text-field
              label="Nom du conducteur"
              outlined
              dense
              type="text"
              name="conducteur_nom"
              :rules="rules.name"
              required
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" class="pa-0">
            <v-text-field
              label="Contact du responsable"
              outlined
              dense
              type="text"
              name="conducteur_contact"
              :rules="rules.contact"
              required
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" class="pa-0">
            <v-text-field
              label="Adresse"
              outlined
              dense
              type="text"
              name="conducteur_adresse"
              :rules="rules.address"
              required
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col col="12" class="pa-0">
            <v-text-field
              label="N° du CIN"
              outlined
              dense
              type="text"
              name="conduteur_cin"
              :rules="rules.cin"
              required
            ></v-text-field>
          </v-col>
        </v-row>
      </section>
      <v-row>
        <v-col cols="12" class="pa-0 mt-3 mb-10">
          <h3>Victime</h3>
          <v-divider></v-divider>
        </v-col>
      </v-row>
      <section>
        <v-row>
          <v-col cols="12" class="pa-0">
            <v-select
              label="Victime"
              outlined
              dense
              :items="['Aucun', 'Passager', 'Piéton']"
              name="cause_victime"
              :rules="rules.victim"
              required
            ></v-select>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" class="pa-0">
            <v-select
              label="Véhicule de la victime"
              outlined
              dense
              :items="['Aucun', 'Voiture', 'Moto', 'Bicyclette']"
              name="cause_vehicule"
              :rules="rules.car"
              required
            ></v-select>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" class="pa-0">
            <v-select
              label="Sécurité"
              outlined
              dense
              :items="['Aucun', 'Ceinturé', 'Casqué']"
              :rules="rules.security"
              name="cause_securite"
              required
            ></v-select>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" class="pa-0">
            <v-select
              label="Autres"
              outlined
              dense
              :items="['Aucun', 'Alcool', 'Médicaments', 'Stupéfiants']"
              :rules="rules.others"
              name="cause_autre"
              required
            ></v-select>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" class="pa-0">
            <v-textarea
              label="Motif et histoire de la maladie"
              outlined
              dense
              type="text"
              name="consulter_histoire"
              :rules="rules.history"
              required
            ></v-textarea>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" class="pa-0">
            <v-textarea
              label="Examen clinique et préscription"
              outlined
              dense
              type="text"
              name="consulter_examen"
              :rules="rules.examination"
              required
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
      </section>
    </v-form>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      rules: {
        examiner: [(v) => !!v || "Le champ docteur est requis"],
        date: [(v) => !!v || "Le champ date de consultation est requis"],
        time: [(v) => !!v || "Le champ heure de consultation est requis"],
        car: [(v) => !!v || "Le champ véhicule responsable est requis"],
        name: [(v) => !!v || "Le champ nom du conducteur est requis"],
        contact: [(v) => !!v || "Le champ contact est requis"],
        address: [(v) => !!v || "Le champ adresse est requis"],
        cin: [(v) => !!v || "Le champ cin est requis"],
        victim: [(v) => !!v || "Le champ victime est requis"],
        security: [(v) => !!v || "Le champ sécurité est requis"],
        others: [(v) => !!v || "Le champ autres est requis"],
        history: [(v) => !!v || "Le champ histoire est requis"],
        examination: [(v) => !!v || "Le champ examen est requis"],
      },
      newConsultation: {
        consulter_id_medecin: "",
        consulter_date_consul: "",
        consulter_heure: "",
        conducteur_vehicule: "",
        conducteur_nom: "",
        conducteur_contact: "",
        conducteur_adresse: "",
        conduteur_cin: "",
        cause_victime: "",
        cause_vehicule: "",
        cause_securite: "",
        cause_autre: "",
        consulter_histoire: "",
        consulter_examen: "",
      },
    };
  },
  methods: {
    handleClick() {
      const isValid = this.$refs.form.validate();

      if (isValid) {
        this.$emit("onNextStep", 4);
      }
    },
  },
};
</script>