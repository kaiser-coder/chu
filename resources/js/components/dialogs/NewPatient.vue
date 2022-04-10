<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="600px">
      <v-card>
        <v-card-title>
          <span class="text-h5">Nouveau patient</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col lg="12" class="pa-0"
                ><v-text-field
                  label="Numéro"
                  outlined
                  dense
                  type="text"
                ></v-text-field
              ></v-col>
            </v-row>
            <v-row>
              <v-col lg="12" class="pa-0"
                ><v-select
                  label="Civilité"
                  outlined
                  dense
                  type="text"
                  :items="['Monsieur', 'Madame']"
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
                ></v-text-field
              ></v-col>
              <v-col lg="6" class="px-0 pr-1"
                ><v-text-field
                  label="Age"
                  outlined
                  dense
                  type="number"
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
                ></v-textarea>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="dialog = false">
            Annuler
          </v-btn>
          <v-btn color="blue darken-1" text @click="dialog = false">
            Sauvegrader
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  data() {
    return {
      dialog: true,
    };
  },
};
</script>
