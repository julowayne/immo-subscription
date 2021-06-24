<template>
<div class="justify-center">
  <button class="w-1/4 bg-blue-500 hover:bg-blue-700 bg-transparent border shadow border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="displayStripeModal()">
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
<div v-if="showSubModal">
  <StripeCheckout           
  v-if="!requires_action && !payment_processed"
  :card="card"
  :stripe="stripe"
  :secret="secret"
  :token="token"
  @requiresAction="requires_action = $event"
  @paymentIntent="payment_intent = $event"
  @paymentMethod="payment_method = $event"
  @paymentProcessed="payment_processed = $event"
  @messageProcessed="message_processed = $event" />
</div>
<div v-if="showSubModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>

</template>

<script>
import axios from 'axios'
import StripeCheckout from './StripeCheckout.vue'
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

  export default {
    name: "SubcriptionCards",
    components:{
      StripeCheckout
    },
    props: {
      subscriptions: Array
    },
    data(){
      return {
        showSubModal: false,
        token: process.env.VUE_APP_AUTH_TOKEN,
        secret: null,
        stripe: null,
        payment_method: null,
        requires_action: null,
        payment_intent: null,
        card: null,
        payment_processed: false,
        message_processed: "",
      }
    },
    methods: {
      chooseSub(){
        this.showSubModal = !this.showSubModal;
      },
      submitCheckout(){
        this.$inertia.post('/services', {
          name: this.name,
          _token: this.$page.props.csrf_token,
        })
      },
      displayStripeModal() {
        this.showSubModal = true;
        this.$nextTick(function () {
            this.stripe = window.Stripe(this.stripeKey);
            const elements = this.stripe.elements();
            this.card = elements.create("card");
            this.card.mount("#card-element");
            axios
                .post("/stripe/intent")
                .then((response) => {
                    this.secret = response.data.client_secret;
                })
                .catch((error) => {
                    console.log(error);
                });
        });
      }
    },
    setup() {
      const stripeKey = computed(() => usePage().props.value.STRIPE_KEY);
      return { stripeKey };
    },
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