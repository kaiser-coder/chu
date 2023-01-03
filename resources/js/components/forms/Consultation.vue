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
              :items="selectItems"
              required
              name="id_medecin"
              :rules="rules.examiner"
              v-model="newConsultation.id_medecin"
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
              name="date_consul"
              :rules="rules.date"
              v-model="newConsultation.date_consul"
            ></v-text-field>
          </v-col>
          <v-col cols="6" class="px-0 pl-1">
            <v-text-field
              label="Heure de la consultation"
              outlined
              dense
              type="time"
              required
              name="heure"
              :rules="rules.time"
              v-model="newConsultation.heure"
            ></v-text-field>
          </v-col>
        </v-row>
      </section>

      <v-row>
        <v-col cols="12" class="px-0">
          <v-select
            label="Type d'accident"
            outlined
            dense
            name="vehicule"
            :items="cases"
            v-model="newConsultation.type"
            required
          ></v-select>
        </v-col>
      </v-row>

      <div v-show="newConsultation.type === 'A.C'">
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
                name="vehicule"
                :items="['Voiture', 'Moto', 'Bicyclette', 'Aucun']"
                :rules="rules.car"
                v-model="newConsultation.vehicule"
                required
              ></v-select>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="6" class="px-0 pr-1">
              <v-text-field
                label="Nom du conducteur"
                outlined
                dense
                type="text"
                name="nom"
                :rules="rules.name"
                v-model="newConsultation.nom"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="6" class="px-0 pl-1">
              <v-text-field
                label="Prénom du conducteur"
                outlined
                dense
                type="text"
                name="prenom"
                :rules="rules.firstname"
                v-model="newConsultation.prenom"
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
                name="contact"
                :rules="rules.contact"
                v-model="newConsultation.contact"
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
                name="adresse"
                :rules="rules.address"
                v-model="newConsultation.adresse"
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
                name="cin"
                :rules="rules.cin"
                v-model="newConsultation.cin"
                required
              ></v-text-field>
            </v-col>
          </v-row>
        </section>
      </div>
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
              name="victime"
              :rules="rules.victim"
              v-model="newConsultation.victime"
              required
            ></v-select>
          </v-col>
        </v-row>
        <v-row v-show="newConsultation.type === 'A.T'">
          <v-col cols="12" class="pa-0">
            <v-select
              label="Véhicule de la victime"
              outlined
              dense
              :items="['Aucun', 'Voiture', 'Moto', 'Bicyclette']"
              name="vehicule"
              :rules="rules.car"
              v-model="newConsultation.vehicule"
              required
            ></v-select>
          </v-col>
        </v-row>
        <v-row v-show="newConsultation.type === 'A.T'">
          <v-col cols="12" class="pa-0">
            <v-select
              label="Sécurité"
              outlined
              dense
              :items="['Aucun', 'Ceinturé', 'Casqué']"
              :rules="rules.security"
              v-model="newConsultation.securite"
              name="securite"
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
              v-model="newConsultation.autre"
              name="autre"
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
              name="histoire"
              :rules="rules.history"
              v-model="newConsultation.histoire"
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
              name="examen"
              v-model="newConsultation.examen"
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
import { mapState } from "pinia";
import { useExaminerStore } from "../../stores/examiners.model";
export default {
  data() {
    return {
      rules: {
        examiner: [(v) => !!v || "Le champ docteur est requis"],
        date: [(v) => !!v || "Le champ date de consultation est requis"],
        time: [(v) => !!v || "Le champ heure de consultation est requis"],
        car: [(v) => !!v || "Le champ véhicule responsable est requis"],
        name: [(v) => !!v || "Le champ nom du conducteur est requis"],
        firstname: [(v) => !!v || "Le champ prénom du conducteur est requis"],
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
        id_medecin: null,
        date_consul: null,
        heure: null,
        type: null,
        vehicule: null,
        nom: null,
        prenom: null,
        contact: null,
        adresse: null,
        cin: null,
        victime: null,
        vehicule: null,
        securite: null,
        autre: null,
        histoire: null,
        examen: null,
      },
      cases: [
        "A.T",
        "A.Sco",
        "A.D",
        "A.Spo",
        "A.R.C",
        "Eva.San",
        "Cas.Méd",
        "A.V.P",
        "A.C",
      ],
    };
  },
  methods: {
    handleClick() {
      const isValid = this.$refs.form.validate();

      if (isValid) {
        this.$emit("onNextStep", 4, { newConsultation: this.newConsultation });
      }
    },
  },
  computed: {
    ...mapState(useExaminerStore, ["examiners"]),
    selectItems() {
      let items = [];

      this.examiners.map((e) => {
        const { id, name } = e;
        items.push({
          value: id,
          text: name,
        });
      });

      return items;
    },
  },
};
</script>
