<template>
  <div>
  <div class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
  <div class="relative w-1/2 my-6 mx-auto max-w-3xl">
    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
      <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
        <h3 class="text-3xl font-semibold">
          Choisir mon abonnement
        </h3>
        <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="chooseSub()">
          <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
            ×
          </span>
        </button>
      </div>
      <div class="relative p-6 flex-auto">
        <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
          N'oubliez pas: vous pouvez annuler/changer votre abonnement a tout moment
        </p>
        <form action="POST" method="post" @submit.prevent="submitCheckout">
          <div class="flex items-center justify-center mr-4 mb-4">
            <input id="radio1" type="radio" name="plan" class="hidden" />
            <label for="radio1" class="flex items-center cursor-pointer text-xl font-bold">
            <span class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
            1 mois ( 9.90€)</label>
          </div>
          <div class="flex items-center justify-center mr-4 mb-4">
            <input id="radio2" type="radio" name="plan" class="hidden" />
            <label for="radio2" class="flex items-center cursor-pointer text-xl font-bold">
            <span class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
            3 mois (27.90€)</label>
          </div>
          <div class="flex items-center justify-center mr-4 mb-4">
            <input id="radio3" type="radio" name="plan" class="hidden" />
            <label for="radio3" class="flex items-center cursor-pointer text-xl font-bold">
            <span class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
            6 mois (49.90€)</label>
        </div>
      <div class="mb-3">
        <label for="name" class="block">Nom</label>
        <input class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="name" type="text">
      </div>
      </form>
      </div>
      <div id="card-element" class="p-2"></div>
      <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
        <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="chooseSub()">
          Annuler
        </button>
        <inertia-link>
          <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
            Payer
          </button>
        </inertia-link>
      </div>
    </div>
  </div>
</div>
</div>
</template>

<script>
  export default {
    props:
    [ 
      "card",
      "stripe",
      "secret",
      "token"
    ],
    data(){
      return {
        modal: false,
      }
    },
    methods: {
      chooseSub(){
        this.modal = !this.modal;
      },
    }
    }
</script>

<style lang="scss" scoped>
#card-element {
  width: 100%;
  margin: O auto;
}
</style>