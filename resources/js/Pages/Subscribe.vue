<template>
    <div>
        <layout/>
        <div class="content flex text-center m-0 flex-col">
          <div class="title mt-10 mb-3">
            <h2>Choisissez la formule qui vous convient.</h2>
          </div>
          <div class="grid grid-cols-3 gap-4 my-20 px-10">
            <div class="card rounded overflow-hidden shadow-lg my-2">
                <div class="months">Abonnement pour 1 mois</div>
                <div class="px-8 py-3">
                    <div class="font-bold text-xl mb-2 text-left">
                      <span class="flex justify-around">
                        <img src="image/money-transfer-64.png" alt="price logo">
                        <span>9.90€</span>
                      </span>
                    </div>
                    <hr>
                   <div class="font-bold text-xs mb-2 text-left">
                      <span class="flex justify-around">
                        <img src="image/log-in-64.png" alt="price logo">
                        <span>Accès aux dossier<br> de vos clients</span>
                      </span>
                    </div>
                </div>
                <div class="flex items-center" id="choose">
                  <button class="shadow text-white font-bold rounded hover:shadow-xl transition-shadow duration-200 ease-in-out" type="button">
                    Créer mon compte
                  </button>
                </div>
            </div>
            <div class="card rounded overflow-hidden shadow-lg my-2">
                <div class="months">Abonnement pour 3 mois</div>
                <div class="px-4 py-2">
                    <div class="font-bold text-xl mb-2 text-left">L'immobilier en 2021</div>
                    <p class="text-grey-darker text-base text-left">
                        Comment vont évoluer les prix de l'immobilier en 2021 en France ?
                    </p>
                </div>
                <div class="px-4 py-2 text-left">
                    <span class="bg-grey-lighter rounded-full text-sm font-semibold text-grey-darker">5/17/2021</span>
                    <span class="bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">Jules TD</span>
                </div>
            </div>
            <div class="card rounded overflow-hidden shadow-lg my-2">
                <div class="months">Abonnement pour 6 mois</div>
                <div class="px-4 py-2">
                    <div class="font-bold text-xl mb-2 text-left">L'immobilier en 2021</div>
                    <p class="text-grey-darker text-base text-left">
                        Comment vont évoluer les prix de l'immobilier en 2021 en France ?
                    </p>
                </div>
                <div class="px-4 py-2 text-left">
                    <span class="bg-grey-lighter rounded-full text-sm font-semibold text-grey-darker">5/17/2021</span>
                    <span class="bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">Jules TD</span>
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
        padding: 1em 0.5em;
        font-size: larger;
        height: 10vh;
      }
      #choose {
        margin: 1.5rem 0 1rem;
        text-align: right;
        button {
          width: 100%;
          height: 2.5rem;
          background-color: #20c997;
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
