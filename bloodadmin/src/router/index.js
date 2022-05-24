import { createRouter, createWebHistory } from 'vue-router'
import Loginadmin from '../views/admin/Loginadmin.vue'
import Dashboardusers from '../views/admin/Dashboardusers.vue'
import Dashboard from '../views/admin/Dashboard.vue'
import Dashboardhospitals from '../views/admin/Dashboardhospitals.vue'
import Home from '../views/user/Home.vue'
const routes = [
  

  {
    path: '/',
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
    path: '/home',
    name: 'home',
    component: Home
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
