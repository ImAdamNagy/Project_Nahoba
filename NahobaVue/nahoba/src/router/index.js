import { createRouter, createWebHistory } from 'vue-router'
import MainPageView from "../views/MainPageView.vue"
import RegisterPageView from "../views/RegisterPageView.vue"

export const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'MainPage',
      component: MainPageView,
    },
    {
      path: '/register',
      name: 'RegisterPage',
      component: RegisterPageView,
    },
  ]
});
