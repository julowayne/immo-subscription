<template>
    <div>
        <layout/>
        <div class="signin flex grid-cols-2 text-center m-0">
          <div id="contactContent">
            <iframe width="400px" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJg1hVUAlu5kcR7NlQ2Wbq5iU&key=AIzaSyDRkKQuLaaLbmCSl-gqmo0tqC8T0capNjs"></iframe>
            <div>
              <form class="bg-white shadow-md">
                <h1>Contact</h1>
                <div class="mb-3">
                  <label class="block" for="name">
                    NOM
                  </label>
                  <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="name" type="text" placeholder="Nom">
                </div>
                <div class="mb-3">
                  <label class="block" for="firstname">
                    PRENOM
                  </label>
                  <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="firstname" type="text" placeholder="Prénom">
                </div>
                <div class="mb-3">
                  <label class="block" for="email">
                    EMAIL
                  </label>
                  <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="email" type="text" placeholder="Email">
                </div>
                <div class="mb-3">
                  <label class="block" for="objet">
                    OBJET
                  </label>
                  <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="objet" type="text" placeholder="Objet du message">
                </div>
                <div class="mb-3">
                  <label class="block" for="password">
                    MESSAGE
                  </label>
                  <textarea class="w-full shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" name="message" id="message" cols="35" rows="2"></textarea>
                </div>
                <div class="flex items-center" id="send">
                  <button class="shadow text-white font-bold rounded hover:shadow-xl transition-shadow duration-200 ease-in-out" type="button">
                    Envoyer
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</template>

<style lang="scss">
    body {
        background-color: #e9ecef;
    }
    #map {
      height: 400px;
      width: 100%;
    }
    .signin {
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
<script>
import Layout from '../Layouts/Layout.vue'
    export default {
        components:{
            Layout
        }
    }
</script>

