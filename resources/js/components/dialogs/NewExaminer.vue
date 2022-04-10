<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="600px">
      <v-card>
        <v-card-title>
          <span class="text-h5">Nouvel examinateur</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col lg="12" class="pa-0">
                <v-text-field
                  label="Nom"
                  outlined
                  dense
                  type="text"
                  required
                ></v-text-field>
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
