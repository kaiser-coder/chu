import axios from "axios";
import { defineStore } from "pinia";

export const usePatientStore = defineStore('patients', {
	state() {
		return {
			patients: [],
			active: {}
		}
	},
	actions: {
		fetchPatients() {
			let getUrl = "/api/patients";
			return axios
				.get(getUrl)
				.then(({ data }) => {
					this.patients = data.patients;
				})
				.catch((error) => console.error(error));
		},
		setActivePatient(item) {
			this.active = { ...this.active, ...item };
		},
		submitPatient() {
			console.log("🚀 ~ file: patients.model.js:21 ~ submitPatient ~ patient", this.patient)
		}
	},
	getters: {
		count() { return this.patients.length }
	}
})
