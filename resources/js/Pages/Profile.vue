<template>
    <div>
    <layout/>
    <div class="profile p-5 sm:px-10">
      <div id="profilContent">
        <div v-if="user" id="title" class="sm:text-center flex justify-between">
          Bonjour {{ user.firstname }}, retrouvez ici vos informations
          <span>
             <inertia-link v-if="user.isAdmin" href="/admin/userdashboard">
               <breeze-button class="hover:bg-gray-700">Admin Dashboard</breeze-button>
              </inertia-link>
            </span>
          </div>
        <div id="account" class="lg:flex lg:flex-row sm:flex sm:flex-col">
          <formule :buttons="buttons" />
          <div class="sm:mx-14">
            <form class="bg-white" method="POST" @submit.prevent="updateUser">
              <div class="mb-3">
                <label class="block" for="name">
                  Nom
                </label>
                <input v-model="form.firstName" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="name" type="text">
              </div>
              <div class="mb-3">
                <label class="block" for="firstname">
                  Prénom
                </label>
                <input v-model="form.lastName" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="firstname" type="text" placeholder="Thomas Desessarts">
              </div>
              <div class="mb-3">
                <label class="block" for="email">
                  Email
                </label>
                <input v-model="form.email" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="email" type="text" placeholder="thomas.desessarts-jules@hotmail.com">
              </div>
              <div class="mb-3">
                <label class="block" for="password">
                  Mot de passe
                </label>
                <input v-model="form.password" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="password" type="password">
              </div>
              <div class="mb-3">
                <label class="block" for="siret">
                  N° SIRET
                </label>
                <input v-model="form.siret" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="siret" type="text" placeholder="14567803938454">
              </div>
              <div class="mb-3">
                <label class="block" for="siret">
                  Photo de profil
                </label>
                <div>
                  <label class="flex flex-row items-center px-2 py-3 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 ml-2 text-base leading-normal" v-if="!form.avatar">Choisir un fichier</span>
                      <span class="mt-2 ml-2 text-base leading-normal" v-else> {{ form.avatar.name }}</span>
                      <input type='file' class="hidden" @input="form.avatar = $event.target.files[0]" />
                  </label>
                </div>
              </div>
              <breeze-button type="submit" class="w-full p-2 text-center cursor-pointer bg-blue-500 hover:bg-blue-700 focus:outline-none shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out">
                enregistrer les modifications
              </breeze-button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
</template>

<script>
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { useForm } from "@inertiajs/inertia-vue3"
import Layout from '../Layouts/Layout.vue'
import BreezeButton from '@/Components/Button'
import Formule from '../Components/Profile/Formule.vue'
  export default {
    components:{
        BreezeButton,
        Layout,
        Formule
    },
    setup() {
      const user = computed(() => usePage().props.value.auth.user)
      return { user }
    },
    data() {
      return {
        buttons: [{
          title: 'Changer ma formule',
          content: 'Vous désirez changer votre formule'
        },
        {
          title: 'Annuler / Suspendre',
          content: 'Vous désirez annuler ou changer votre formule'
        }],
        form: {
          firstName: '',
          lastName: '',
          password: '',
          email: '',
          siret: '',
          avatar: '',
        }
      }
    },
    methods: {
      updateUser(){
        const form = useForm({
          firstName: this.form.firstName,
          lastName: this.form.lastName,
          password: this.form.password,
          email: this.form.email,
          siret: this.form.siret,
          avatar: this.form.avatar,
        })
        form.post('/profile')
      }
    },
    mounted(){
      this.form.firstName = this.user.firstname
      this.form.lastName = this.user.lastname
      this.form.email = this.user.email
      this.form.siret = this.user.siret
      this.form.password = this.user.password
    }
  }
</script>

<style lang="scss">
body {
    background-color: #e9ecef;
}
.profile {
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 4px;
  #profilContent {
    width: 1000px;
    border-radius: 4px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    background-color: white;
    padding: 1em;
    // overflow: hidden;
    text-align: left;
    #title {
      letter-spacing: 0.5px;
      color: #007BFF;
      margin-bottom: 1rem;
      font-size: x-large;
      text-align: start;
    }
    #account {
      display: flex;
      justify-content: space-around;
      padding: 0.5rem;
      form {
        width: 400px;
        height: 100%;
        text-align: left;
        background-color: white;
        img {
          width: 25px;
          margin-left: 10px;
        }
        label {
          color: #007BFF;
        }
        input:focus {
          color:#007BFF;
        }
      }
    }
  }
}
</style>
