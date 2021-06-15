<template>
<layout />
<div>
    <div class="checkout">
      <form class="shadow">
        <h1 class="text-2xl font-bold text-center pb-4">Payement</h1>
        <div>
          <p class="stripeError" v-if="stripeError">
              {{stripeError}}
          </p>
        </div>
        <div>
          <breeze-label class="pt-1 font-bold" for="Card Number">
              N° de carte
          </breeze-label>
          <div>
            <div id="card-number"></div>
            <hr>
            <!-- <span class="text" v-if="cardNumberError">
              {{cardNumberError}}
            </span> -->
            <div class="pt-1">
              <div v-if="cardNumberError" class="bg-red-100 border border-red-400 text-red-700 px-2 py-1 rounded relative" role="alert">
                <span class="block sm:inline">{{cardNumberError}}</span>
              </div>
            </div>
          </div>
        </div>
        <div class="pt-1">
          <div>
              <breeze-label class="font-bold" for="Card CVC">
                CVC
              </breeze-label>
              <div>
                  <div id="card-cvc"></div>
                  <hr>
                  <div class="pt-1">
                    <div v-if="cardCvcError" class="bg-red-100 border border-red-400 text-red-700 px-2 py-1 rounded relative" role="alert">
                      <span class="block sm:inline">{{cardCvcError}}</span>
                    </div>
                  </div>
              </div>
          </div>
          <div class="pt-1">
              <breeze-label class="font-bold" for="Expiry Month">
                Expire le
              </breeze-label>
              <div >
                <div id="card-expiry"></div>
                <hr>
                <div class="pt-1">
                  <div v-if="cardExpiryError" class="bg-red-100 border border-red-400 text-red-700 px-2 py-1 rounded relative" role="alert">
                    <span class="block sm:inline">{{cardExpiryError}}</span>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="pt-3 buttons flex items-center">
          <breeze-button class="items-center w-full bg-blue-500 hover:bg-blue-700 rounded cursor shadow text-center text-white font-bold hover:shadow-lg transition-shadow duration-200 ease-in-out" type="submit" @click.prevent="reset()">
            Supprimer les informations
          </breeze-button>
        </div>
        <div class="buttons">  
          <breeze-button class="  w-full bg-blue-500 hover:bg-blue-700 rounded shadow text-center text-white font-bold hover:shadow-lg transition-shadow duration-200 ease-in-out" type="submit"  @click.prevent="submitFormToCreateToken()">
            <span v-if="loading">processing...</span>
            <span v-if="!loading">Payer</span>
          </breeze-button>
        </div>
      </form>
  </div>
</div>
</template>

<script>
import Layout from '../Layouts/Layout.vue'

  export default {
    name: "SubcriptionCards",
    components: {
      Layout
    },
    props: {
      subscriptions: Array
    },
    data(){
      return {
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
      },
      setUpStripe() {
          if (window.Stripe === undefined) {
            alert('Stripe V3 library not loaded!');
          } else {
            const stripe = window.Stripe('public_key');
            this.stripe = stripe;
            const elements = stripe.elements();
            this.cardCvc = elements.create('cardCvc');
            this.cardExpiry = elements.create('cardExpiry');
            this.cardNumber = elements.create('cardNumber');
            this.cardCvc.mount('#card-cvc');
            this.cardExpiry.mount('#card-expiry');
            this.cardNumber.mount('#card-number');
            this.listenForErrors();
        }
      },
      listenForErrors: function () {
        const vm = this;
        this.cardNumber.addEventListener('change', function (event) {
            vm.toggleError(event);
            vm.cardNumberError = ''
            vm.card.number = event.complete ? true : false
        });
        this.cardExpiry.addEventListener('change', function (event) {
            vm.toggleError(event);
            vm.cardExpiryError = ''
            vm.card.expiry = event.complete ? true : false
        });
        this.cardCvc.addEventListener('change', function (event) {
            vm.toggleError(event);
            vm.cardCvcError = ''
            vm.card.cvc = event.complete ? true : false
        });
      },
      toggleError: function (event) {
        if (event.error) {
            this.stripeError = event.error.message;
        } else {
          this.stripeError = '';
        }
      },
      submitFormToCreateToken() {
        this.clearCardErrors();
        let valid = true;
        if (!this.card.number) {
          valid = false;
          this.cardNumberError = "Card Number is Required";
        }
        if (!this.card.cvc) {
          valid = false;
          this.cardCvcError = "CVC is Required";
        }
        if (!this.card.expiry) {
          valid = false;
          this.cardExpiryError = "Month is Required";
        }
        if (this.stripeError) {
          valid = false;
        }
        if (valid) {
          this.createToken()
        }
      },
         createToken() {
      this.loading = true
      this.stripe.createToken(this.cardNumber).then((result) => {
          this.loading = false
          if (result.error) {
            this.stripeError = result.error.message;
          } else {
            const token = result.token.id
            //send the token to your server
            //clear the inputs
          }
      })
    },
    reset() {
      this.clearElementInputs()
      this.clearCardErrors()
    },
    clearElementInputs() {
      this.cardCvc.clear()
      this.cardExpiry.clear()
      this.cardNumber.clear()
    },
    clearCardErrors() {
      this.stripeError = ''
      this.cardCvcError = ''
      this.cardExpiryError = ''
      this.cardNumberError = ''
    },
    },
    mounted(){
      this.setUpStripe();
    }
  }
</script>

<style lang="scss">
  body {
      background-color: #e9ecef;
  }
.checkout {
    display: flex;
    width: 500px;
    justify-content: center;
    align-items: center;
    border-radius: 4px;
    margin: 4rem auto;
    form {
      width: 500px;
      height: 100%;
      padding: 2rem 3rem;
      border-radius: 4px;
      background-color: white;
      .buttons {
        margin: 0.2rem 0;
        breeze-button {
          width: 100%;
          padding: 0.3rem;
        }
      }
    }
}
</style>