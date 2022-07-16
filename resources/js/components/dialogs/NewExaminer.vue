<template>
  <v-row justify="center">
    <v-dialog v-model="isShown" persistent max-width="600px">
      <v-card>
        <v-form ref="form" lazy-validation>
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
                    :rules="rules.name"
                    v-model="examiner.name"
                  ></v-text-field>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" text @click="handleReset">
              Annuler
            </v-btn>
            <v-btn color="blue darken-1" text @click="handleSubmit">
              Sauvegrader
            </v-btn>
          </v-card-actions>
        </v-form>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  data() {
    return {
      examiner: {
        name: "",
      },
      rules: {
        name: [(v) => !!v || "Le nom de l'examinateur est requis"],
      },
    };
  },
  props: { isShown: Boolean },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      const isValid = this.$refs.form.validate();

      if (isValid) {
        this.$emit("onSubmitExaminer", this.examiner);
      }
    },

    handleReset() {
      this.$refs.form.reset();
      this.$emit("onCloseDialog", false);
    },
  },
};
</script>
