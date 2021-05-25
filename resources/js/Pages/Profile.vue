<template>
    <div>
        <layout/>
        <div class="signin flex grid-cols-2 text-center m-0">
          <div id="content">
            <div id="title">Bonjour Jules, retrouvez ici vos informations</div>
            <div id="account">
              <div id="formule">
                <div class="card rounded overflow-hidden shadow-lg my-2">
                  <div class="months shadow-sm font-bold">Abonnement pour 6 mois</div>
                  <div class="px-6 pt-8 pb-2">
                      <div class="font-bold text-xl mb-2 text-left">
                        <span class="flex justify-around items-center">
                          <img src="image/money-transfer-64.png" alt="price logo">
                          <span class="text-4xl">9.90 €</span>
                        </span>
                      </div>
                      <hr>
                    <div class="font-bold text-xs mb-2 text-left">
                        <span class="flex justify-around items-center">
                          <img src="image/log-in-64.png" alt="price logo">
                          <span class="font-bold text-base">Accès aux dossier<br> de vos clients</span>
                        </span>
                      </div>
                  </div>
                  <div class="flex items-center choose">
                    <button class="bg-blue-500 hover:bg-blue-700 shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out" type="button">
                      Changer ma formule
                    </button>
                  </div>
                  <div class="flex items-center choose">
                    <button class="bg-blue-500 hover:bg-blue-700 shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out" type="button">
                      Annuler / Suspendre
                    </button>
                  </div>
                </div>
              </div>
              <div>
                <form class="bg-white">
                  <div class="mb-3">
                    <label class="block" for="name">
                      NOM
                    </label>
                    <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="name" type="text" placeholder="Jules">
                  </div>
                  <div class="mb-3">
                    <label class="block" for="firstname">
                      PRENOM
                    </label>
                    <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="firstname" type="text" placeholder="Thomas Desessarts">
                  </div>
                  <div class="mb-3">
                    <label class="block" for="email">
                      EMAIL
                    </label>
                    <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="email" type="text" placeholder="thomas.desessarts-jules@hotmail.com">
                  </div>
                  <div class="mb-3">
                    <label class="block" for="siret">
                      N° SIRET
                    </label>
                    <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="siret" type="text" placeholder="14567803938454">
                  </div>
                  <span class="mb-3 flex">
                    Télécharger ma dernière facture <img src="/image/telecharger.png" alt="">
                  </span>
                  <div class="mb-3">
                    Entrer un code promo: <span><input type="text" class="ml-1 w-1/2 h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent"></span>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</template>

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
      #content {
        width: 1000px;
        border-radius: 4px;
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        background-color: white;
        padding: 3em;
        text-align: left;
        #title {
          letter-spacing: 0.5px;
          color: #007BFF;
          margin-bottom: 2rem;
          font-size: x-large;
        }
        #account {
          overflow: hidden;
          display: flex;
          justify-content: space-around;
          padding: 0.5rem;
          #formule {
            .card {
              max-width: 30rem;
              margin: auto;
              .months {
                background-color: #007BFF;
                color: white;
                padding: 1em 1.5em;
                font-size: larger;
              }
              hr {
                background-color: #007bff;
                border: 1px solid #007bff;
                margin: 1em;
              }
              .choose {
                margin: 1.5rem 1rem;
                text-align: right;
                button {
                  width: 100%;
                  height: 2rem;
                }
              }
            }
          }
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

<script>
import Layout from '../Layouts/Layout.vue'
    export default {
        components:{
            Layout
        }
    }
</script>
