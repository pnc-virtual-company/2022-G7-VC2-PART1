import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
import './assets/tailwind.css'
import FormView from './components/ui/FormLogIn.vue';
import NavView from './components/NavBar.vue';
import NavbarAdmin from './components/Admin/NavBarAdmin.vue'
const app = createApp(App);
app.component('form-view',FormView);
app.component('navbar-view',NavView);
app.component('Navbar-Admin',NavbarAdmin)
loadFonts()

app
  .use(router)
  .use(vuetify)
  .mount('#app')