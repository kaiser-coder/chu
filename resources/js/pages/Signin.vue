<template>
  <v-row>
    <v-col class="mr-auto ml-auto" lg="8">
      <v-card :loading="isLoading" elevation="3">
        <v-row class="ma-0">
          <v-col class="pa-0" lg="7"><div class="full-bg"></div></v-col>
          <v-col class="pa-0" lg="5">
            <v-form class="pa-10" lazy-validation ref="form">
              <v-card-title class="pl-0 mb-5 d-flex flex-column justify-center">
                <v-img
                  src="../img/saina.jpg"
                  class="mb-2"
                  height="100%"
                ></v-img>
                <h5>Connectez vous à votre compte</h5>
              </v-card-title>
              <v-card-text>
                <v-row>
                  <v-col class="pa-0" cols="12">
                    <v-text-field
                      label="Adresse email"
                      name="email"
                      filled
                      dense
                      rounded
                      required
                      v-model="formInputs.email"
                      :rules="rules.email"
                    ></v-text-field>
                  </v-col>
                </v-row>
                <v-row>
                  <v-col class="pa-0" cols="12">
                    <v-text-field
                      label="Mot de passe"
                      name="password"
                      filled
                      dense
                      rounded
                      required
                      type="password"
                      v-model="formInputs.password"
                      :rules="rules.password"
                    ></v-text-field>
                  </v-col>
                </v-row>
              </v-card-text>
              <v-card-actions>
                <v-row>
                  <v-col cols="12">
                    <v-btn width="100%" color="primary" @click="sign">
                      Me connecter
                    </v-btn>
                  </v-col>
                </v-row>
              </v-card-actions>
            </v-form>
          </v-col>
        </v-row>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      formInputs: {
        email: "",
        password: "",
      },
      isLoading: false,
      rules: {
        email: [
          (v) => !!v || "L'adresse email est requise",
          (v) => /.+@.+\..+/.test(v) || "L'adresse email doit être valide",
        ],
        password: [
          (v) => !!v || "Le mot de passe est requis",
          (v) =>
            v.length > 4 ||
            "Le mot de passe doit comporter 04 caractères au minimum",
        ],
      },
    };
  },
  methods: {
    sign() {
      const isValid = this.$refs.form.validate();

      if (isValid) {
        const formData = new FormData();

        Object.entries(this.formInputs).forEach(([key, value]) => {
          // console.log(key, value);
          formData.append(key, value);
        });

        this.isLoading = true;
        axios
          .post("/api/auth", formData)
          .then((result) => {
            console.log(result);
            this.$router.push("/dashboard");
          })
          .catch((error) => {
            console.error(error);
          })
          .finally(() => {
            this.isLoading = false;
          });
      }
    },
  },
};
</script>

<style scoped lang="scss">
.full-bg {
  background-color: #3f51b5;
  height: 100%;
}
</style>
