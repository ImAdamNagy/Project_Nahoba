import { createRouter, createWebHistory } from 'vue-router'
import MainPageView from "../views/MainPageView.vue"
import CreateProductPageView from "../views/CreateProductPageView.vue"
import LoginPageView from "../views/LoginPageView.vue"

export const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'MainPage',
      component: MainPageView,
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
  ]
});
