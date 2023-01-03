import axios from "axios";
import { defineStore } from "pinia";

const createFormData = (examiner) => {
	const formdata = new FormData();

	Object.entries(examiner).map(([key, value]) => {
		formdata.append(key, value);
	});

	return formdata;
};

export const useExaminerStore = defineStore('examiners', {
	state() {
		return {
			examiners: [],
			activeExaminerToEdit: {},
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
			const formdata = createFormData(examiner);

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
		setActiveExaminerToEdit(item) {
			this.activeExaminerToEdit = item;
		},
		editExaminer(examiner) {
			let editUrl = `/api/examiners/update/${this.activeExaminerToEdit.id}`

			console.log("🚀 ~ file: examiners.model.js:51 ~ editExaminer ~ activeExaminerToEdit", this.activeExaminerToEdit)

			/* const formdata = createFormData(examiner);

			return axios
				.post(editUrl, formdata)
				.then((response) => {
					let examinerIndex = this.examiners.findIndex((e) => e === examiner);
					if (examinerIndex !== -1) this.examiners[examinerIndex] = examiner;

					return response
				})
				.catch((error) => {
					return error.response;
				}); */
		}
	},
	getters: {
		count() { return this.examiners.length }
	}
})
