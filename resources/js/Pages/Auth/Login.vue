<template>
<layout />
    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>
  <div>
    <div class="signup flex grid-cols-2 text-center m-0 md:px-10">
      <div id="content">
        <div id="logo" class="hidden md:block">
          <img src="image/alfred-logo-teal-600.png" alt="logo alfred" />
        </div>
        <div>
          <form class="bg-white shadow-md" method="POST" @submit.prevent="submit">
            <h1>Indentifiez-vous</h1>
            <div class="mb-3">
              <label class="block" for="email">
                EMAIL
              </label>
              <input v-model="form.email" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="email" type="text" placeholder="Email">
              <div class="text-red-700 font-bold" v-if="errors.email">{{ errors.email }}</div>
            </div>
            <div class="mb-3">
              <label class="block" for="password">
                Password
              </label>
              <input v-model="form.password" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="password" type="password" placeholder="***********">
              <div class="text-red-700 font-bold" v-if="errors.password">{{ errors.password }}</div>
            </div>
            <div class="flex items-center" id="login">
              <breeze-button class="bg-blue-500 hover:bg-blue-700 focus:outline-none shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out" type="submit">
                Connexion
              </breeze-button>
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
    import BreezeCheckbox from '@/Components/Checkbox'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'

  export default {
    components: {
        BreezeButton,
        BreezeInput,
        BreezeCheckbox,
        BreezeLabel,
        BreezeValidationErrors,
        Layout
    },

    props: {
        auth: Object,
        canResetPassword: Boolean,
        errors: Object,
        status: String,
    },
    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false
            })
        }
    },
    methods: {
      submit() {
        this.form
          .transform(data => ({
              ... data,
              remember: this.form.remember ? 'on' : ''
          }))
          .post(this.route('login'), {
              onFinish: () => this.form.reset('password'),
          })
        }
      },
      computed:{
        errors() {
            return this.$page.props.errors
        }
    }
  }
</script>
<style lang="scss">
    body {
        background-color: #e9ecef;
    }
    .signup {
      display: flex;
      height: 70vh;
      width: 100%;
      justify-content: center;
      align-items: center;
      #content {
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
          #login {
            margin: 1.5rem 0 1rem;
            text-align: right;
            button {
              width: 100%;
              height: 2.5rem;
              display: block;
            }
          }
        }
      }
    }
</style>