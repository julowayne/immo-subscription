<template>
    <div>
        <layout/>
        <div class="contact flex grid-cols-2 text-center m-0 md:px-10">
          <div id="contactContent">
            <iframe class="hidden md:block" width="400px" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJg1hVUAlu5kcR7NlQ2Wbq5iU&key=AIzaSyDRkKQuLaaLbmCSl-gqmo0tqC8T0capNjs"></iframe>
            <div>
              <form class="bg-white shadow-md" method="POST" @submit.prevent="contactForm">
                <h1>Contact</h1>
                <div class="mb-3">
                  <label class="block" for="lastName">
                    Nom
                  </label>
                  <input v-model="form.lastName" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="lastName" type="text" placeholder="Nom">
                </div>
                <div class="mb-3">
                  <label class="block" for="firstName">
                    Prénom
                  </label>
                  <input v-model="form.firstName" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="firstName" type="text" placeholder="Prénom">
                </div>
                <div class="mb-3">
                  <label class="block" for="email">
                    Email
                  </label>
                  <input v-model="form.email" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="email" type="text" placeholder="Email">
                </div>
                <div class="mb-3">
                  <label class="block" for="object">
                    Objet
                  </label>
                  <input v-model="form.object" class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="object" type="text" placeholder="Objet du message">
                </div>
                <div class="mb-3">
                  <label class="block" for="message">
                    Message
                  </label>
                  <textarea v-model="form.message" class="resize-none w-full shadow rounded outline-none focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" name="title" id="title" cols="35" rows="2"></textarea>
                </div>
                <div class="flex items-center" id="send">
                  <button class="shadow text-white font-bold rounded hover:shadow-xl transition-shadow duration-200 ease-in-out" type="submit">
                    Envoyer
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
import Layout from '../Layouts/Layout.vue'
import { useForm } from "@inertiajs/inertia-vue3"
export default {
    components:{
        Layout
    },
    data(){
      return {
          form: this.$inertia.form({
            lastName: '',
            firstName: '',
            email: '',
            object: '',
            message: '',
        })
      }
    },
    methods: {
    contactForm(){
      const form = useForm({
        firstName: this.form.firstName,
        lastName: this.form.lastName,
        email: this.form.email,
        object: this.form.object,
        message: this.form.message,
      })
      form.post('/contact')
    }
  }
}
</script>


<style lang="scss">
    body {
        background-color: #e9ecef;
    }
    #map {
      height: 400px;
      width: 100%;
    }
    .contact {
      display: flex;
      height: 85vh;
      width: 100%;
      justify-content: center;
      align-items: center;
      border-radius: 4px;
      #contactContent {
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
              background-color: #20c997;
            }
          }
        }
      }
    }
</style>


