<template>
  <v-container>
    <v-row>
      <v-col cols="12" class="pa-0">
        <v-select
          label="Type"
          outlined
          dense
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
        ></v-select>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" class="pa-0">
        <v-textarea
          label="Autres examens paracliniques supplémentaires et résultats"
          outlined
          dense
          type="text"
          required
        ></v-textarea>
      </v-col>
    </v-row>
  </v-container>
</template>