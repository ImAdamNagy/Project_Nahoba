import { createRouter, createWebHistory } from 'vue-router'
import ProductsPageView from "../views/ProductsPageView.vue"
import RegisterPageView from "../views/RegisterPageView.vue"
import CreateProductPageView from "../views/CreateProductPageView.vue"
import LoginPageView from "../views/LoginPageView.vue"
import ShowProductView from '../views/ShowProductView.vue'
import UserProfilePageView from '../views/UserProfilePageView.vue'
import AdminMainPageView from '../views/AdminMainPageView.vue'
import MainPageView from '../views/MainPageView.vue'
import AllMechanicsPageView from '@/views/AllMechanicsPageView.vue'
import ProfileSettingsPageView from '../views/ProfileSettingsPageView.vue'
import ImageUploadPageView from '@/views/ImageUploadPageView.vue';

export const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'MainPage',
      component: MainPageView,
    },
    {
      path: '/file',
      name: 'ImageUpload',
      component: ImageUploadPageView,
    },
    {
      path: '/productsonly',
      name: 'ProductsPage',
      component: ProductsPageView,
    },
    {
      path: '/mechanicsonly',
      name: 'MechanicsPage',
      component: AllMechanicsPageView,
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
      path: '/details/:id',
      name: 'ProductDetails',
      component: ShowProductView
    },
    {
      path: '/user',
      name: 'UserProfile',
      component: UserProfilePageView,
    },
    {
      path: '/adminmainpage',
      name: 'AdminMainPage',
      component: AdminMainPageView,
    },
    {
      path: '/settings',
      name: 'ProfileSettingsPage',
      component: ProfileSettingsPageView,
    }
  ]
});
