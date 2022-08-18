import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
import './assets/tailwind.css'
import FormView from './components/FormLogIn.vue';
import NavView from './components/NavBar.vue';
const app = createApp(App);
app.component('form-view',FormView);
app.component('navbar-view',NavView);
loadFonts()

app
  .use(router)
  .use(vuetify)
  .mount('#app')