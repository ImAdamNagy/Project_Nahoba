import { createRouter, createWebHistory } from 'vue-router'
import MainPageView from "../views/MainPageView.vue"
<<<<<<< HEAD
import RegisterPageView from "../views/RegisterPageView.vue"
=======
import CreateProductPageView from "../views/CreateProductPageView.vue"
import LoginPageView from "../views/LoginPageView.vue"
>>>>>>> 5d848de14d86f39d589fed72cef192d54c6cd5f7

export const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'MainPage',
      component: MainPageView,
    },
    {
<<<<<<< HEAD
      path: '/register',
      name: 'RegisterPage',
      component: RegisterPageView,
=======
      path: '/newproduct',
      name: 'CreateProduct',
      component: CreateProductPageView,
    },
    {
      path: '/login',
      name: 'LoginPage',
      component: LoginPageView,
>>>>>>> 5d848de14d86f39d589fed72cef192d54c6cd5f7
    },
  ]
});
