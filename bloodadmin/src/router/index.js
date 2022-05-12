import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Dashboardusers from '../views/Dashboardusers.vue'
import Dashboard from '../views/Dashboard.vue'
import Dashboardhospitals from '../views/Dashboardhospitals.vue'
const routes = [
  

  {
    path: '/',
    name: 'home',
    component: HomeView
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
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
