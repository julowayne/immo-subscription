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
        <form  method="post" @submit.prevent="submit">
            <div class="flex items-center justify-center mr-4 mb-4">
              <input class="mr-3" type="radio" id="radio1" name="plans" v-model="choice" :value="id.oneMonth">
              <label for="radio1" class="flex items-center cursor-pointer text-xl font-bold">
                1 mois ( 9.90€)
              </label>
            </div>
            <div class="flex items-center justify-center mr-4 mb-4">
              <input class="mr-3" type="radio" id="radio2" name="plans" v-model="choice" :value="id.threeMonth">
              <label for="radio2" class="flex items-center cursor-pointer text-xl font-bold">
                3 mois (27.90€)
              </label>
            </div>
            <div class="flex items-center justify-center mr-4 mb-4">
              <input class="mr-3" type="radio" id="radio3" name="plans" v-model="choice" :value="id.sixMonth">
              <label for="radio3" class="flex items-center cursor-pointer text-xl font-bold">
                6 mois (49.90€)
              </label>
            </div>
        <div class="mb-3">
          <label for="name" class="block">Nom</label>
          <input v-model="name" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="name" type="text">
        </div>
      <div id="card-element" class="p-2"></div>
        <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
          <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="chooseSub()">
            Annuler
          </button>
          <!-- <inertia-link href="/services/abonnement/confirmation"> -->
            <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
              Payer
            </button>
          <!-- </inertia-link> -->
      </div>
      </form>
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
      "token",
      "showSubModal"
    ],
    data(){
      return {
        modal: false,
        name: '',
        choice: [],
        id: {
         oneMonth: "price_1J00BLLMxSjiMnMkbaTaaduq",
         threeMonth: "price_1J00BXLMxSjiMnMkcI8OdJv1",
         sixMonth: "price_1J00BgLMxSjiMnMktyFnYgXg"
        }
      }
    },
    methods: {
      chooseSub(){
        this.modal = !this.modal;
      },
      async submit() {
            this.payment_processing = true;
            const { setupIntent, error } = await this.stripe.confirmCardSetup(
                this.secret,
                {
                    payment_method: {
                        card: this.card,
                        billing_details: { name: this.name },
                    },
                }
            );
            if (error) {
                console.log(error);
            } else {
                console.log(setupIntent);
                this.payment_method = setupIntent.payment_method;
                await axios
                    .post(
                        "/services/abonnement",
                        {
                            plan: this.choice,
                            name: this.name,
                            payment_method: this.payment_method,
                            coupon: this.coupon,
                        },
                        {
                            headers: {
                                Authorization: `Bearer ${this.token}`,
                            },
                        }
                    )
                    .then((response) => {
                        console.log(response.data);
                        if (
                            response.data.status &&
                            response.data.status == "requires_action"
                        ) {
                            this.requiresAction = true;
                        } else {
                            this.paymentProcessed = true;

                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
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