<template>
  <v-container>
    <v-row>
      <v-col lg="12" class="pa-0"
        ><v-text-field
          label="Numéro"
          outlined
          dense
          type="text"
          required
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
        ></v-text-field
      ></v-col>
    </v-row>
    <v-row>
      <v-col lg="12" class="pa-0"
        ><v-text-field label="Prénom" outlined dense type="text"></v-text-field
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
        ></v-text-field
      ></v-col>
      <v-col lg="6" class="px-0 pl-1"
        ><v-text-field
          label="Age"
          outlined
          dense
          type="number"
          required
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
        ></v-text-field>
      </v-col>
    </v-row>
    <v-row>
      <v-col lg="12" class="pa-0">
        <v-textarea
          label="Remarque"
          outlined
          dense
          type="text"
          required
        ></v-textarea>
      </v-col>
    </v-row>
  </v-container>
</template>