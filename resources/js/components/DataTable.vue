<template>
  <v-card class="mt-5">
    <v-card-title>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Rechercher..."
        outlined
        dense
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="items"
      :search="search"
    ></v-data-table>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      search: "",
    };
  },
  props: {
    headers: Array,
    items: Array,
  },
};
</script>
