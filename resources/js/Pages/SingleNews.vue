<template>
    <div>
        <layout/>
        <div class="newsContent flex text-center justify-center m-0 flex-col">
          <div class="my-10 px-20">
            <div class="font-bold text-2xl mb-2 text-center">L'immobilier en 2021</div>
            <div class="news rounded overflow-hidden shadow-lg my-2 p-5">
                <div class="px-4 py-2">
                    <p class="text-grey-darker text-base text-left">
                        Comment vont évoluer les prix de l’immobilier en 2021 en France dans ce contexte de crise économique mondiale dont on n’est pas encore sorti ? Si beaucoup d’experts prédisent une baisse des prix immobiliers en 2021, nous allons voir qu’il y a différents éléments qui vont venir soutenir le marché et limiter les impacts d’une hausse de chômage, des baisses de revenus et d’une crise de confiance en l’avenir. Difficile de faire des prévisions de tendance tant les facteurs qui peuvent influencer les prix à la hausse ou à la baisse sont multiples. Faisons néanmoins le point sur ce qui déterminera l’évolution des prix de l’immobilier en 2021.
                    </p>
                </div>
                <div class="px-4 py-2 text-left">
                    <span class="bg-grey-lighter rounded-full text-sm font-semibold text-grey-darker">5/17/2021</span>
                    <span class="bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker font-bold">Jules TD</span>
                </div>
            </div>
          </div>
        </div>
    </div>
</template>

<style lang="scss">
  body {
    background-color: #e9ecef;
  }
  .newsContent {
    margin-top: 2rem;
    max-height: 50vh;
    .news {
      max-width: 40rem;
      margin: auto;
      background-color: white;
    }
  }
</style>

<script>
import Layout from '../Layouts/Layout.vue'
    export default {
        components:{
            Layout
        }
    }
</script>
