import axios from "axios";
import { defineStore } from "pinia";

export const usePatientStore = defineStore('patients', {
	state() {
		return {
			patients: []
		}
	},
	actions: {
		fetchPatients() {
			let getUrl = "/api/patients";
			axios
				.get(getUrl)
				.then(({ data }) => {
					this.patients = data.patients;
				})
				.catch((error) => console.error(error));
		}
	},
	getters: {
		count() { return this.patients.length }
	}
})
