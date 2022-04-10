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
         { path: 'home', component: () => import('./pages/Home.vue') }
      ]
   }
];
