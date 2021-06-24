<template>
    <div>
        <layout/>
        <div class="newsContent flex text-center justify-center m-0 flex-col">
          <div class="my-10 px-20">
            <div class="font-bold text-2xl mb-2 text-center">{{ singleNews.title }}</div>
            <div class="news rounded overflow-hidden shadow-lg my-2 p-5">
                <div class="px-4 py-2">
                    <p v-html="singleNews.body" class="text-grey-darker text-base text-left">
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
        },
        props: {
          singleNews: Object
        }
    }
</script>
