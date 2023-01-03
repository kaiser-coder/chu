import axios from "axios";
import { defineStore } from "pinia";

export const useExaminerStore = defineStore('examiners', {
	state() {
		return {
			examiners: [],
		}
	},
	actions: {
		fetchExaminers() {
			let getUrl = "/api/examiners";
			return axios
				.get(getUrl)
				.then(({ data }) => {
					this.examiners = data.examiners;
				})
				.catch((error) => console.error(error))
		},
		submitExaminer(examiner) {
			let postUrl = "/api/examiners/new";
			const formdata = new FormData();

			Object.entries(examiner).map(([key, value]) => {
				formdata.append(key, value);
			});

			return axios
				.post(postUrl, formdata)
				.then((response) => {
					this.examiners.push(response.data.examiner);
					return response
				})
				.catch((error) => {
					return error.response;
				});
		},
	},
	getters: {
		count() { return this.examiners.length }
	}
})
