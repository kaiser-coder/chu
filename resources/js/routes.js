export const routes = [
	{
		path: '/',
		component: () => import('./layouts/EmptyLayout.vue'),
		children: [
			{ path: 'signin', component: () => import('./pages/Signin.vue') }
		]
	},
	{
		path: '/app',
		component: () => import('./layouts/MainLayout.vue'),
		children: [
			{ path: 'dashboard', name: 'dashboard', component: () => import('./pages/Dashboard.vue') },
			{ path: 'examiners', name: 'examiners_list', component: () => import('./pages/Examiner.vue') },
			{ path: 'examiners/new', name: 'examiner_create', component: () => import('./pages/NewExaminer.vue') },
			{ path: 'examiners/edit', name: 'examiner_edit', component: () => import('./pages/NewExaminer.vue') },
			{ path: 'patients', name: 'patients_list', component: () => import('./pages/Patient.vue') },
			{ path: 'patients/new', name: 'patient_create', component: () => import('./pages/NewPatient.vue') },
		]
	}
];
