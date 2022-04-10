export const routes = [
   {
      path: '/',
      component: () => import('./layouts/EmptyLayout.vue'),
      children: [
         { path: 'signin', component: () => import('./pages/Signin.vue') }
      ]
   },
   {
      path: '/',
      component: () => import('./layouts/MainLayout.vue'),
      children: [
         { path: 'dashboard', component: () => import('./pages/Dashboard.vue') }
      ]
   }
];
