import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import './index.css'

////////////////
// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAicSSQ4BXhwtGeGYn9IIBiNxdiVWE7YgI",
  authDomain: "blood-43a7b.firebaseapp.com",
  projectId: "blood-43a7b",
  storageBucket: "blood-43a7b.appspot.com",
  messagingSenderId: "950311364280",
  appId: "1:950311364280:web:550203907da9f0313ef64d",
  measurementId: "G-T0RTJ74YV0"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);

createApp(App).use(store).use(router).mount('#app')
