<template>
<div class="grid grid-cols-3 my-20 px-32">
  <div v-for="sub in subscriptions" :key="sub">
    <div class="card rounded overflow-hidden shadow-lg my-2">
        <div class="months shadow-sm font-bold">Abonnement pour {{sub.months}} mois</div>
        <div class="px-6 pt-8 pb-2">
            <div class="font-bold text-xl mb-2 text-left">
              <span class="flex justify-around items-center">
                <img src="image/money-transfer-64.png" alt="price logo">
                <span class="text-4xl">{{ sub.price }} €</span>
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
          <button class="bg-blue-500 hover:bg-blue-700 focus:outline-none shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out" type="button" @click="chooseSub()">
            Choisir
          </button>
        </div>
    </div>
  </div>
</div>
<div v-if="subscriptions.indexOf() !== 0">
  <div v-if="showSubModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
      <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
        <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
          <h3 class="text-3xl font-semibold">
            {{ subscriptions[0].price }}
          </h3>
          <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="chooseSub()">
            <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
              ×
            </span>
          </button>
        </div>
        <div class="relative p-6 flex-auto">
          <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
            {{ subscriptions[0].informations }}
          </p>
        </div>
        <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
          <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="chooseSub()">
            Annuler
          </button>
          <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="chooseSub()">
            Valider
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div v-else-if="subscriptions.indexOf() === 1">
  <div v-if="showSubModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
      <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
        <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
          <h3 class="text-3xl font-semibold">
            {{ subscriptions[1].price }} €
          </h3>
          <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="chooseSub()">
            <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
              ×
            </span>
          </button>
        </div>
        <div class="relative p-6 flex-auto">
          <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
            {{ subscriptions[1].informations }}
          </p>
        </div>
        <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
          <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="chooseSub()">
            Annuler
          </button>
          <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="chooseSub()">
            Valider
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div v-else>
  <div v-if="showSubModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
      <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
        <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
          <h3 class="text-3xl font-semibold">
            {{ subscriptions[2].price }} €
          </h3>
          <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="chooseSub()">
            <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
              ×
            </span>
          </button>
        </div>
        <div class="relative p-6 flex-auto">
          <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
            {{ subscriptions[2].informations }}
          </p>
        </div>
        <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
          <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="chooseSub()">
            Annuler
          </button>
          <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="chooseSub()">
            Valider
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div v-if="showSubModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
</template>

<script>
  export default {
    name: "SubcriptionCards",
    props: {
      subscriptions: Array
    },
    data(){
      return {
        showSubModal: false
      }
    },
    methods: {
      chooseSub(){
        this.showSubModal = !this.showSubModal;
      }
    }
  }
</script>

<style lang="scss" scoped>
  .card {
    max-width: 20rem;
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
</style>