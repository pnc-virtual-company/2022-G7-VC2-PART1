import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './assets/tailwind.css'
import FormView from './components/UI/FormLogIn.vue';
import NavView from './components/UI/NavBar.vue';

const app = createApp(App);
app.component('form-view',FormView);
app.component('navbar-view',NavView);

app
  .use(router)

  .mount('#app')