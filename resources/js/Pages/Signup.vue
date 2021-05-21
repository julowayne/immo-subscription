<template>
    <div>
        <layout/>
        <div class="signup flex grid-cols-2 text-center m-0">
          <div id="content">
            <div id="logo">
              <img src="image/alfred-logo-teal-600.png" alt="logo alfred" />
            </div>
            <div>
              <form class="bg-white shadow-md">
                <h1>Indentifiez-vous</h1>
                <div class="mb-3">
                  <label class="block" for="email">
                    EMAIL
                  </label>
                  <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="email" type="text" placeholder="Email">
                </div>
                <div class="mb-3">
                  <label class="block" for="password">
                    Password
                  </label>
                  <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="password" type="password" placeholder="***********">
                </div>
                <div class="flex items-center" id="send">
                  <button class="bg-blue-500 hover:bg-blue-700 shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out" type="button">
                    Connexion
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

<script>
import Layout from '../Layouts/Layout.vue'
    export default {
        components:{
            Layout
        }
    }
</script>
