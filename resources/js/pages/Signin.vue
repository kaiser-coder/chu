<template>
  <v-row>
    <v-col class="mr-auto ml-auto" lg="8">
      <v-card loading elevation="3">
        <v-row class="ma-0">
          <v-col class="pa-0" lg="7"><div class="full-bg"></div></v-col>
          <v-col class="pa-0" lg="5">
            <v-form class="pa-10">
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
                      v-model="email"
                      label="Adresse email"
                      filled
                      dense
                      rounded
                      required
                    ></v-text-field>
                  </v-col>
                </v-row>
                <v-row>
                  <v-col class="pa-0" cols="12">
                    <v-text-field
                      v-model="password"
                      label="Mot de passe"
                      filled
                      dense
                      rounded
                      required
                    ></v-text-field>
                  </v-col>
                </v-row>
              </v-card-text>
              <v-card-actions>
                <v-row>
                  <v-col cols="12">
                    <v-btn width="100%" color="primary"> Me connecter </v-btn>
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

<style scoped lang="scss">
.full-bg {
  background-color: #3f51b5;
  height: 100%;
}
</style>