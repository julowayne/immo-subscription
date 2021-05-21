<template>
    <div>
        <layout/>
        <div class="content flex text-center m-0 flex-col">
          <div class="title mt-10 mb-3">
            <h2>Choisissez la formule qui vous convient.</h2>
          </div>
          <div class="grid grid-cols-3 my-20 px-32">
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
                <div class="flex items-center" id="choose">
                  <button class="bg-blue-500 hover:bg-blue-700 shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out" type="button">
                    Choisir
                  </button>
                </div>
            </div>
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
                <div class="flex items-center" id="choose">
                  <button class="bg-blue-500 hover:bg-blue-700 shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out" type="button">
                    Choisir
                  </button>
                </div>
            </div>
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
                <div class="flex items-center" id="choose">
                  <button class="bg-blue-500 hover:bg-blue-700 shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out" type="button">
                    Choisir
                  </button>
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
  .content {
    .card {
      max-width: 30rem;
      margin: auto;
      hr {
        background-color: #007bff;
        border: 1px solid #007bff;
        margin: 1em;
      }
      .months {
        background-color: blue;
        color: white;
        padding: 1em 1.5em;
        font-size: larger;
      }
      #choose {
        margin: 1.5rem 1rem;
        text-align: right;
        button {
          width: 100%;
          height: 2.5rem;
        }
      }
    }
    .title {
      h2 {
        font-size: 2rem;
        font-style: italic;
        font-weight: lighter;
        color: grey;
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
