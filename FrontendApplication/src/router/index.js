import { createRouter, createWebHistory } from 'vue-router'
import { AuthGuard } from './guards/AuthGuard.mjs';
import { RoleGuard } from './guards/RoleGuard.mjs';
export const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'MainPage',
      component: () => import('@/views/MainView.vue'),
      meta:{
        requiresAuth: false
      }
    },
    {
      path: '/productsonly',
      name: 'ProductsPage',
      component: () => import('@/views/ProductsView.vue'),
      meta:{
        requiresAuth: false
      }
    },
    {
      path: '/mechanicsonly',
      name: 'MechanicsPage',
      component: () => import('@/views/MechanicsView.vue'),
      meta:{
        requiresAuth: false
      }
    },
    {
      path: '/register',
      name: 'RegisterPage',
      component: () => import('@/views/RegisterView.vue'),
      meta:{
        requiresAuth: false,
        requiresGuest: true
      }
    },
    {
      path: '/messages',
      name: 'MessagesPage',
      component: () => import('@/views/MessagesView.vue'),
      meta:{
        requiresAuth: true
      }
    },
    {
      path: '/newproduct',
      name: 'CreateProduct',
      component: () => import('@/views/CreateProductView.vue'),
      meta:{
        requiredRole: ['mechanic','seller'],
        requiresAuth: true
      }
    },
    {
      path: '/login',
      name: 'LoginPage',
      component: () => import('@/views/LoginView.vue'),
      meta:{
        requiresAuth: false,
        requiresGuest: true
      }
    },
    {
      path: '/details/:id',
      name: 'ProductDetails',
      component: () => import('@/views/ShowProductView.vue'),
      meta:{
        requiresAuth: false
      }
    },
    {
      path: '/mech/details/:id',
      name: 'MechDetails',
      component: () => import('@/views/ShowMechView.vue'),
      meta:{
        requiresAuth: false
      }
    },
    {
      path: '/user',
      name: 'UserProfile',
      component: () => import('@/views/UserProfileView.vue'),
      meta:{
        requiresAuth: true
      }
    },
    {
      path: '/adminmain',
      name: 'AdminMain',
      component: () => import('@/views/AdminMainView.vue'),
      meta:{
        requiredRole: ['admin'],
        requiresAuth: true
      }
    },
    {
      path: '/enabledproducts',
      name: 'EnabledProductsView',
      component: () => import('@/views/AdminEnabledProductsView.vue'),
      meta:{
        requiredRole: ['admin'],
        requiresAuth: true
      }
    },
    {
      path: '/users',
      name: 'Users',
      component: () => import('@/views/AdminUsersView.vue'),
      meta:{
        requiredRole: ['admin'],
        requiresAuth: true
      }
    },
    {
      path: '/settings',
      name: 'ProfileSettingsPage',
      component: () => import('@/views/ProfileSettingsView.vue'),
      meta:{
        requiredRole: ['mechanic','seller'],
        requiresAuth: true
      }
    },
    {
      path: '/otherUserProducts/:id',
      name: 'OtherUserProducts',
      component: () => import('@/views/OtherUserProductsView.vue'),
      meta:{
        requiresAuth: false
      }
    },
    {
      path: '/mechanicregister',
      name: 'MechanicFormView',
      component: () => import('@/views/MechanicFormView.vue'),
      meta:{
        requiredRole: ['mechanic'],
        requiresAuth: true
      }
    },
    {
      path: '/forbidden',
      name: 'ForbiddenView',
      component: () => import('@/views/ForbiddenView.vue'),
      meta:{
        requiresAuth: false
      }
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'Notfound',
      component: () => import('@/views/NotFoundView.vue'),
      meta:{
        requiresAuth: false
      }
    }
  ]
});

router.beforeEach(AuthGuard);
router.beforeEach(RoleGuard);

