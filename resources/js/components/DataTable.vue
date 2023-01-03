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
      :loading="loading"
      loading-text="Chargement ..."
    >
      <template v-slot:top>
        <v-dialog v-model="dialogDelete" max-width="500px">
          <v-card>
            <v-card-title class="text-h5"
              >Voulez-vous supprimer cette ligne?</v-card-title
            >
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="closeDelete"
                >Annuler</v-btn
              >
              <v-btn color="blue darken-1" text @click="deleteItemConfirm"
                >OK</v-btn
              >
              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </template>
      <!-- TODO: Create logic for each button -->
      <template v-slot:item.actions="{ item }">
        <v-btn small class="primary" @click="editItem(item)"> Editer </v-btn>
        <v-btn small color="error" @click="deleteItem(item)"> Supprimer </v-btn>
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      search: "",
      dialogDelete: false,
      activeItem: {},
    };
  },
  props: {
    headers: Array,
    items: Array,
    loading: Boolean,
  },
  methods: {
    editItem(item) {
      console.log("🚀 ~ file: DataTable.vue:35 ~ editItem ~ item", item);
    },
    deleteItem(item) {
      this.dialogDelete = true;
      this.activeItem = item;
      console.log("🚀 ~ file: DataTable.vue:38 ~ deleteItem ~ item", item);
    },
    closeDelete() {
      this.dialogDelete = false;
    },
    deleteItemConfirm() {
      console.log(
        "🚀 ~ file: DataTable.vue:67 ~ deleteItemConfirm ~ activeItem",
        this.activeItem
      );
      this.closeDelete();
    },
  },
};
</script>
