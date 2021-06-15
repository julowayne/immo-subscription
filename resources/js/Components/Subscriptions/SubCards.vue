<template>
<div class="justify-center">
  <button class="w-1/4 bg-blue-500 hover:bg-blue-700 bg-transparent border shadow border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="chooseSub()">
    Choisir
</button>
</div>
<div class="xl:grid xl:grid-cols-3 xl:my-20 xl:px-32 lg:grid lg:grid-cols-3 lg:my-10 lg:px-20 sm:grid sm:grid-cols-1 sm:my-10 sm:gap-6 sm:px-20">
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
          <div class="font-bold text-xs text-left">
              <span class="flex justify-around items-center">
                <img src="image/log-in-64.png" alt="price logo">
                <span class="font-bold text-base">Accès aux dossier<br> de vos clients</span>
              </span>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- modal -->
<div v-if="showSubModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
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
        <form action="" method="post" @submit.prevent="submitCheckout">
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
      <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
        <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="chooseSub()">
          Annuler
        </button>
        <inertia-link href="/checkout">
          <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
            Payer
          </button>
        </inertia-link>
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
        showSubModal: false,
        name: '',
        card: {
          cvc: '',
          number: '',
          expiry: ''
        },
        //elements
        cardNumber: '',
        cardExpiry: '',
        cardCvc: '',
        stripe: null,
        // errors
        stripeError: '',
        cardCvcError: '',
        cardExpiryError: '',
        cardNumberError: '',
        loading: false,
      }
    },
    methods: {
      chooseSub(){
        this.showSubModal = !this.showSubModal;
      },
      submitCheckout(){
        this.$inertia.post('/services', {
          name: this.name,
          // email: this.email,
          _token: this.$page.props.csrf_token,
        })
      }
  }
  }
</script>

<style lang="scss" scoped>
  .card {
    max-width: 20rem;
    margin: auto;
    min-height: 40vh;
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
  input[type="radio"] + label span {
    transition: background .2s,
      transform .2s;
  }

  input[type="radio"] + label span:hover,
  input[type="radio"] + label:hover span{
    transform: scale(1.2);
  } 

  input[type="radio"]:checked + label span {
    background-color: #3490DC; //bg-blue
    box-shadow: 0px 0px 0px 2px white inset;
  }

  input[type="radio"]:checked + label{
    color: #3490DC; //text-blue
  }
</style>