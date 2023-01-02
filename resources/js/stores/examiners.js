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
					this.examiners = [...data.examiners, this.examiners];
				})
				.catch((error) => console.error(error))
		}
	},
	getters: {
		count() { return this.examiners.length }
	}
})