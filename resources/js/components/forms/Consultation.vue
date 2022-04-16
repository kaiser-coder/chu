<template>
  <v-container>
    <section>
      <v-row>
        <v-col col="12" class="pa-0">
          <v-select
            label="Docteur"
            outlined
            dense
            :items="['One', 'Two']"
            required
          ></v-select>
        </v-col>
      </v-row>
      <v-row>
        <v-col col="6" class="px-0 pr-1">
          <v-text-field
            label="Date de consultation"
            outlined
            dense
            type="date"
            required
          ></v-text-field>
        </v-col>
        <v-col col="6" class="px-0 pl-1">
          <v-text-field
            label="Heure de la consultation"
            outlined
            dense
            type="time"
            required
          ></v-text-field>
        </v-col>
      </v-row>
    </section>

    <v-row>
      <v-col col="12" class="pa-0 mb-10">
        <h3>Responsable</h3>
        <v-divider></v-divider>
      </v-col>
    </v-row>

    <section>
      <v-row>
        <v-col col="12" class="pa-0">
          <v-select
            label="Véhicule responsable"
            outlined
            dense
            :items="['Voiture', 'Moto', 'Bicyclette', 'Aucun']"
            required
          ></v-select>
        </v-col>
      </v-row>
      <v-row>
        <v-col col="12" class="pa-0">
          <v-text-field
            label="Nom du conducteur"
            outlined
            dense
            type="text"
            required
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col col="12" class="pa-0">
          <v-text-field
            label="Numéro du véhicule"
            outlined
            dense
            type="text"
            required
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col col="12" class="pa-0">
          <v-text-field
            label="Adresse"
            outlined
            dense
            type="text"
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
            required
          ></v-text-field>
        </v-col>
      </v-row>
    </section>

    <v-row>
      <v-col col="12" class="pa-0 mt-3 mb-10">
        <h3>Victime</h3>
        <v-divider></v-divider>
      </v-col>
    </v-row>

    <section>
      <v-row>
        <v-col col="12" class="pa-0">
          <v-select
            label="Catégorie"
            outlined
            dense
            :items="['Aucun', 'Passager', 'Piéton']"
            required
          ></v-select>
        </v-col>
      </v-row>
      <v-row>
        <v-col col="12" class="pa-0">
          <v-select
            label="Véhicule de la victime"
            outlined
            dense
            :items="['Aucun', 'Voiture', 'Moto', 'Bicyclette']"
            required
          ></v-select>
        </v-col>
      </v-row>
      <v-row>
        <v-col col="12" class="pa-0">
          <v-select
            label="Sécurité"
            outlined
            dense
            :items="['Aucun', 'Ceinturé', 'Casqué']"
            required
          ></v-select>
        </v-col>
      </v-row>
      <v-row>
        <v-col col="12" class="pa-0">
          <v-select
            label="Autres"
            outlined
            dense
            :items="['Aucun', 'Alcool', 'Médicaments', 'Stupéfiants']"
            required
          ></v-select>
        </v-col>
      </v-row>
      <v-row>
        <v-col col="12" class="pa-0">
          <v-textarea
            label="Motif et histoire de la maladie"
            outlined
            dense
            type="text"
            required
          ></v-textarea>
        </v-col>
      </v-row>
      <v-row>
        <v-col col="12" class="pa-0">
          <v-textarea
            label="Examen clinique et préscription"
            outlined
            dense
            type="text"
            required
          ></v-textarea>
        </v-col>
      </v-row>
    </section>
  </v-container>
</template>