<template>
<layout />
<div>
    <div class="checkout">

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
    data() {
      return {
        token: process.env.VUE_APP_AUTH_TOKEN,
        secret: null,
        stripe: null,
        payment_method: null,
        requires_action: null,
        payment_intent: null,
        card: null,
        payment_processed: false,
        message_processed: "",
      };
    },
    methods: {
        displayStripeModal() {
            this.show = true;
            this.$nextTick(function () {
                // console.log(this.stripeKey);
                this.stripe = window.Stripe(this.stripeKey);
                const elements = this.stripe.elements();
                this.card = elements.create("card");
                this.card.mount("#card-element");
                axios
                    .post("/stripe/intent")
                    .then((response) => {
                        console.log(response.data);
                        this.secret = response.data.client_secret;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            });
        },
    },
    mounted() {},
    setup() {
        const stripeKey = computed(() => usePage().props.value.stripe_key);
        return { stripeKey };
    },
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