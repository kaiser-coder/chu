import { defineStore } from "pinia";

export const useStepperStore = defineStore('stepper', {
	state() {
		return {
			active: 1
		}
	},
	actions: {
		switchStep(step) {
			this.active = step;
		}
	}
})
