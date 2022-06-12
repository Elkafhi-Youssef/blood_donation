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
import Donate from '../views/user/Donate.vue'
import ProfileD from '../views/user/ProfileD.vue'
import ProfileUser from '../views/user/ProfileUser.vue'
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
  {
    path: '/profileuser',
    name: 'profileuser',
    component: ProfileUser
  },
  {
    path: '/donate',
    name: 'donate',
    component: Donate
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to, from) => {
  if (
    to.name === "profiled" ||
    to.name === "donors" ||
    to.name === "donate") {
    if (!localStorage.getItem("token")) {
      router.push("/LoginUser");
    }
  }
  // if (to.name === "Login" ||  to.name === "Register" | to.name === "Role") {
  //   if (localStorage.getItem("Role")) {
  //     router.push("/");
  //   }
  // }
  // if (to.name === "Dashboard") {
  //   if (localStorage.getItem("Role") !== "Admin") {
  //     router.push("/");
  //   }
  // }
});

export default router
