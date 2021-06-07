<template>
    <div>
        <layout/>
        <div class="content flex text-center m-0 flex-col">
          <div class="title mt-10 mb-3">
            <h2>Choisissez la formule qui vous convient.</h2>
          </div>
          <sub-cards :subscriptions="subscriptions" />
        </div>
    </div>
</template>

<script>
import SubCards from '../Components/Subscriptions/SubCards.vue';
import Layout from '../Layouts/Layout.vue'
    export default {
      components:{
          Layout,
          SubCards
      },
      name: "Subscribe",
      data() {
        return {
          subscriptions: [{
            months: 1,
            price: "9.90",
            informations: "Accès aux dossiers de vos clients"
          },
          {
            months: 3,
            price: "27.90",
            informations: "Accès aux dossiers de vos clients"
          },
          {
            months: 6,
            price: "49.90",
            informations: "Accès aux dossiers de vos clients"
          }]
        }
      }
    }
</script>

<style lang="scss">
  body {
    background-color: #e9ecef;
  }
  .content {
    // .card {
    //   max-width: 20rem;
    //   margin: auto;
    //   hr {
    //     background-color: #007bff;
    //     border: 1px solid #007bff;
    //     margin: 1em;
    //   }
    //   .months {
    //     background-color: blue;
    //     color: white;
    //     padding: 1em 1.5em;
    //     font-size: larger;
    //   }
    //   #choose {
    //     margin: 1.5rem 1rem;
    //     text-align: right;
    //     button {
    //       width: 100%;
    //       height: 2.5rem;
    //     }
    //   }
    // }
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
