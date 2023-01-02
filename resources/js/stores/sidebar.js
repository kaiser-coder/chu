import { defineStore } from "pinia";

export const useSidebarStore = defineStore('sidebar', {
	state() {
		return {
			navigationDrawer: false,
			activePageName: "Tableau de bord"
		}
	},
	actions: {
		setNavigationDrawer() {
			this.navigationDrawer = !this.navigationDrawer;
		},
		setActivePageName(pageName) {
			this.activePageName = pageName
		}
	}
})
