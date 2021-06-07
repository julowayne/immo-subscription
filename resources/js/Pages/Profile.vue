<template>
    <div>
        <layout/>
        <div class="signin flex grid-cols-2 text-center m-0">
          <div id="profilContent">
            <div id="title">Bonjour Jules, retrouvez ici vos informations</div>
            <div id="account">
              <formule :buttons="buttons" />
              <div>
                <form class="bg-white">
                  <div class="mb-3">
                    <label class="block" for="name">
                      NOM
                    </label>
                    <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="name" type="text" placeholder="Jules">
                  </div>
                  <div class="mb-3">
                    <label class="block" for="firstname">
                      PRENOM
                    </label>
                    <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="firstname" type="text" placeholder="Thomas Desessarts">
                  </div>
                  <div class="mb-3">
                    <label class="block" for="email">
                      EMAIL
                    </label>
                    <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="email" type="text" placeholder="thomas.desessarts-jules@hotmail.com">
                  </div>
                  <div class="mb-3">
                    <label class="block" for="siret">
                      N° SIRET
                    </label>
                    <input class="w-full h-8 shadow border rounded focus:outline-none focus:ring-1 focus:border-transparent" id="siret" type="text" placeholder="14567803938454">
                  </div>
                  <span class="mb-3 flex">
                    Télécharger ma dernière facture <img src="/image/telecharger.png" alt="">
                  </span>
                  <!-- <div class="mb-3">
                    Entrer un code promo: <span><input type="text" class="ml-1 w-1/2 h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent"></span>
                  </div> -->
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
import Layout from '../Layouts/Layout.vue'
import Formule from '../Components/Profile/Formule.vue'
  export default {
    components:{
        Layout,
        Formule
    },
    data() {
      return {
        buttons: [{
          title: 'Changer ma formule',
          content: 'Vous désirez changer votre formule'
        },
        {
          title: 'Annuler / Suspendre',
          content: 'Vous désirez annuler ou changer votre formule'
        }],
      }
    },
  }
</script>

<style lang="scss">
body {
    background-color: #e9ecef;
}
.signin {
  display: flex;
  height: 85vh;
  width: 100%;
  justify-content: center;
  align-items: center;
  border-radius: 4px;
  #profilContent {
    width: 1000px;
    border-radius: 4px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    background-color: white;
    padding: 3em;
    text-align: left;
    #title {
      letter-spacing: 0.5px;
      color: #007BFF;
      margin-bottom: 2rem;
      font-size: x-large;
    }
    #account {
      display: flex;
      justify-content: space-around;
      padding: 0.5rem;
      form {
        width: 400px;
        height: 100%;
        text-align: left;
        background-color: white;
        img {
          width: 25px;
          margin-left: 10px;
        }
        label {
          color: #007BFF;
        }
        input:focus {
          color:#007BFF;
        }
      }
    }
  }
}
</style>
