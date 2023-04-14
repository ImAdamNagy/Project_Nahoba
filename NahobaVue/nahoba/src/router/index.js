import { createRouter, createWebHistory } from 'vue-router'
import AllProductsPageView from "../views/AllProductsPageView.vue"
import RegisterPageView from "../views/RegisterPageView.vue"
import CreateProductPageView from "../views/CreateProductPageView.vue"
import LoginPageView from "../views/LoginPageView.vue"
import ShowProductView from '../views/ShowProductView.vue'
import UserProfilePageView from '../views/UserProfilePageView.vue'
import MyProductsPageView from '@/views/MyProductsPageView.vue'

export const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'MainPage',
      component: AllProductsPageView,
    },
    {
      path: '/register',
      name: 'RegisterPage',
      component: RegisterPageView,
    },
    {
      path: '/newproduct',
      name: 'CreateProduct',
      component: CreateProductPageView,
    },
    {
      path: '/login',
      name: 'LoginPage',
      component: LoginPageView,
    },
    {
      path: '/details',
      name: 'ProductDetails',
      component: ShowProductView
    },
    {
      path: '/user',
      name: 'UserProfile',
      component: UserProfilePageView,
    },
    {
      path: '/myproducts',
      name: 'myProducts',
      component: MyProductsPageView,
    }
  ]
});
