<template>
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
    <!-- <div v-for="button in buttons" :key="button">
      <div class="flex items-center choose">
        <button class="bg-blue-500 hover:bg-blue-700 focus:outline-none shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out" type="button" @click="toggleModal()">
          {{ button.title }}
        </button>
      </div>
    </div> -->
      <div class="flex items-center choose">
        <button class="bg-blue-500 hover:bg-blue-700 focus:outline-none shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out" type="button" @click="toggleModal()">
          {{ buttons[0].title }}
        </button>
      </div>
      <div class="flex items-center choose">
        <button class="bg-blue-500 hover:bg-blue-700 focus:outline-none shadow text-white font-bold rounded hover:shadow-lg transition-shadow duration-200 ease-in-out" type="button" @click="toggleCancel()">
          {{ buttons[1].title }}
        </button>
      </div>
  </div>
</div>

<div v-if="showCancel" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
  <div class="relative w-auto my-6 mx-auto max-w-3xl">
    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
      <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
        <h3 class="text-3xl font-semibold">
          {{ buttons[1].title }}
        </h3>
        <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="toggleCancel()">
          <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
            ×
          </span>
        </button>
      </div>
      <div class="relative p-6 flex-auto">
        <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
          {{ buttons[1].content }}
        </p>
      </div>
      <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
        <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="toggleCancel()">
          Annuler
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="toggleCancel()">
          Valider
        </button>
      </div>
    </div>
  </div>
</div>
<div v-if="showCancel" class="opacity-25 fixed inset-0 z-40 bg-black"></div>

<div v-if="showModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
  <div class="relative w-auto my-6 mx-auto max-w-3xl">
    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
      <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
        <h3 class="text-3xl font-semibold">
          {{ buttons[0].title }}
        </h3>
        <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="toggleModal()">
          <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
            ×
          </span>
        </button>
      </div>
      <div class="relative p-6 flex-auto">
        <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
          {{ buttons[0].content }}
        </p>
      </div>
      <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
        <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="toggleModal()">
          Annuler
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="toggleModal()">
          Valider
        </button>
      </div>
    </div>
  </div>
</div>
<div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
</template>

<script>
  export default {
    name: 'Formule',
    props: {
      buttons: Array
    },
    data() {
      return {
        showModal: false,
        showCancel: false,
      }
    },
    methods: {
      toggleModal(){
        this.showModal = !this.showModal
      },
      toggleCancel(){
        this.showCancel = !this.showCancel
      }
    }
  }
</script>

<style lang="scss" scoped>
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
</style>