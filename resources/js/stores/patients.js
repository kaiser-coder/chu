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
					// console.log(data);
					this.patients = [...data, this.patients];
				})
				.catch((error) => console.error(error));
		}
	}
})
