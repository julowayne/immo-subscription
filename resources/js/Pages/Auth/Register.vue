<template>
    <layout/>
    <breeze-validation-errors class="mb-4" />

    <div>
        <div class="signin flex grid-cols-2 text-center m-0">
          <div id="signinContent">
            <div id="logo">
              <img src="image/alfred-logo-teal-600.png" alt="logo alfred" />
            </div>
            <div>
              <form class="bg-white shadow-md" @submit.prevent="submit">
                <h1>Bienvenue</h1>
                <div class="mb-3">
                  <label class="block" for="name">
                    NOM
                  </label>
                  <input v-model="lastName" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="name" type="text" placeholder="Jules">
                </div>
                <div class="mb-3">
                  <label class="block" for="firstname">
                    PRENOM
                  </label>
                  <input v-model="firstName"  class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="firstname" type="text" placeholder="Thomas Desessarts">
                </div>
                <div class="mb-3">
                  <label class="block" for="email">
                    EMAIL
                  </label>
                  <input v-model="email"  class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="email" type="text" placeholder="thomas.desessarts-jules@hotmail.com">
                </div>
                <div class="mb-3">
                  <label class="block" for="siret">
                    N° SIRET
                  </label>
                  <input v-model="siret" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="siret" type="text" placeholder="14567803938454">
                </div>
                <div class="mb-3">
                  <label class="block" for="password">
                    Password
                  </label>
                  <input v-model="password" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="password" type="password" placeholder="***********">
                </div>
                <div class="flex items-center" id="send">
                  <button class="bg-blue-500 hover:bg-blue-700 shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out" type="button">
                    Créer mon compte
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
    import Layout from '@/Layouts/Layout.vue'
    import BreezeButton from '@/Components/Button'
    import BreezeInput from '@/Components/Input'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'

    export default {

        components: {
            BreezeButton,
            BreezeInput,
            BreezeLabel,
            BreezeValidationErrors,
            Layout
        },

        props: {
            auth: Object,
            errors: Object,
        },

        data() {
            return {
                form: this.$inertia.form({
                    lastName: '',
                    firstName: '',
                    email: '',
                    password: '',
                    siret: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
<style lang="scss">
    body {
        background-color: #e9ecef;
    }
    .signin {
      display: flex;
      height: 85vh;
      width: 100%;
      justify-content: center;
      align-items: center;
      border-radius: 4px;
      #signinContent {
        max-width: 800px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        border-radius: 4px;
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        #logo {
          width: 400px;
          background-color: #20c997;
          img {
            margin-top: 3.5em;
            width: 100%;
          }
        }
        form {
          width: 400px;
          height: 100%;
          text-align: left;
          padding: 1rem 2rem;
          background-color: white;
          h1 {
            margin-bottom: 1rem;
            font-size: 2rem;
            border-bottom: 1px solid #20c997;
            padding: 1rem 0;
            letter-spacing: 0.5px;
            color: #20c997;
          }
          #send {
            margin: 1.5rem 0 1rem;
            text-align: right;
            button {
              width: 100%;
              height: 2.5rem;
            }
          }
        }
      }
    }
</style>
