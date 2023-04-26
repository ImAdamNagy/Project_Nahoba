import { createRouter, createWebHistory } from 'vue-router'
import ProductsView from "../views/ProductsView.vue"
import RegisterView from "../views/RegisterView.vue"
import CreateProductView from "../views/CreateProductView.vue"
import LoginView from "../views/LoginView.vue"
import ShowProductView from '../views/ShowProductView.vue'
import UserProfileView from '../views/UserProfileView.vue'
import AdminMainView from '../views/AdminMainView.vue'
import MainView from '../views/MainView.vue'
import MechanicsView from '@/views/MechanicsView.vue'
import ProfileSettingsView from '../views/ProfileSettingsView.vue'
import OtherUserProductsView from '../views/OtherUserProductsView.vue'
import MechanicFormView from '../views/MechanicFormView.vue'
import AdminEnabledProducts from '../views/AdminEnabledProducts.vue'
import AdminUsersView from '../views/AdminUsersView.vue'
export const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'MainPage',
      component: MainView,
    },
    {
      path: '/productsonly',
      name: 'ProductsPage',
      component: ProductsView,
    },
    {
      path: '/mechanicsonly',
      name: 'MechanicsPage',
      component: MechanicsView,
    },
    {
      path: '/register',
      name: 'RegisterPage',
      component: RegisterView,
    },
    {
      path: '/newproduct',
      name: 'CreateProduct',
      component: CreateProductView,
    },
    {
      path: '/login',
      name: 'LoginPage',
      component: LoginView,
    },
    {
      path: '/details/:id',
      name: 'ProductDetails',
      component: ShowProductView
    },
    {
      path: '/user',
      name: 'UserProfile',
      component: UserProfileView,
    },
    {
      path: '/adminmain',
      name: 'AdminMain',
      component: AdminMainView,
    },
    {
      path: '/enabledproducts',
      name: 'EnableProductsView',
      component: AdminEnabledProducts,
    },
    {
      path: '/users',
      name: 'Users',
      component: AdminUsersView,
    },
    {
      path: '/settings',
      name: 'ProfileSettingsPage',
      component: ProfileSettingsView,
    },
    {
      path: '/otherUserProducts/:id',
      name: 'OtherUserProducts',
      component: OtherUserProductsView,
    },
    {
      path: '/mechanicregister',
      name: 'MechanicFormPage',
      component: MechanicFormView,
    }
  ]
});
