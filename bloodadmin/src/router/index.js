import { createRouter, createWebHistory } from 'vue-router'
import Loginadmin from '../views/admin/Loginadmin.vue'
import Dashboardusers from '../views/admin/Dashboardusers.vue'
import Dashboard from '../views/admin/Dashboard.vue'
import Dashboardhospitals from '../views/admin/Dashboardhospitals.vue'
import Home from '../views/user/Home.vue'
import LoginUser from '../views/user/LoginUser.vue'
import RegisterUser from '../views/user/RegisterUser.vue'
import Request from '../views/user/Request.vue'
import Donors from '../views/user/Donors.vue'
import ProfileD from '../views/user/ProfileD.vue'
const routes = [
  

  {
    path: '/loginadmin',
    name: 'loginadmin',
    component: Loginadmin
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
    children: [
      {
        path: '/dashboard/users',
        component: Dashboardusers,
      },
      {
        path: '/dashboard/hospitals',
        component: Dashboardhospitals,
      },
    ],
  },
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/loginuser',
    name: 'loginuser',
    component: LoginUser
  },
  {
    path: '/registeruser',
    name: 'registeruser',
    component: RegisterUser
  },
  {
    path: '/request',
    name: 'request',
    component: Request
  },
  {
    path: '/donors',
    name: 'donors',
    component: Donors
  },
  {
    path: '/profiled',
    name: 'profiled',
    component: ProfileD
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
