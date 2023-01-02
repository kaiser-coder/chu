import axios from "axios";
import { defineStore } from "pinia";

export const useExaminerStore = defineStore('examiners', {
	state() {
		return {
			examiners: []
		}
	},
	actions: {
		fetchExaminers() {
			let getUrl = "/api/examiners";
			axios
				.get(getUrl)
				.then(({ data }) => {
					data.map((d) => {
						this.examiners.push({
							id: d.id_medecin,
							name: d.examinateur,
						});
					});
				})
				.catch((error) => console.error(error))
		}
	}
})
