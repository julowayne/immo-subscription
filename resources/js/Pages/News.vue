<template>
    <div>
        <layout/>
        <div class="content flex text-center m-2 flex-col">
          <div class="xl:grid xl:grid-cols-3 xl:gap-6 xl:my-10 xl:px-20 md:grid md:grid-cols-2 md:gap-4 md:my-10 md:px-20 sm:grid sm:grid-cols-2 sm:gap-4 sm:my-10 sm:px-20">
              <!-- foreach for cards -->
            <inertia-link v-for="news in Allnews" :key="news" href="/actualites/1">
                <div class="news rounded overflow-hidden shadow-lg my-2">
                    <img :src="news.image" class="mx-auto" alt="Sunset in the mountains">
                    <div class="px-4 py-2">
                        <div class="font-bold text-xl mb-2 text-left">{{ news.title }}</div>
                        <p v-html="news.body" class="text-grey-darker text-base text-left">
                        </p>
                    </div>
                    <div class="px-4 py-2 text-left">
                        <span class="bg-grey-lighter rounded-full text-sm font-semibold text-grey-darker">{{ moment(news.date).format("DD-MM-YYYY") }}</span>
                        <span class="bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">Jules TD</span>
                        <span class="ml-16 border-gray-400"><inertia-link href="*"><strong>Lire la suite</strong></inertia-link></span>
                    </div>
                </div>
            </inertia-link>
            <!-- endforeach for cards -->
          </div>
        </div>
    </div>
</template>

<style lang="scss">
  body {
    background-color: #e9ecef;
  }
  .news {
    max-width: 22rem;
    margin: auto;
    background-color: #f8f9fa;

  }
</style>

<script>
import Layout from '../Layouts/Layout.vue'
import moment from 'moment'
    export default {
        components:{
            Layout
        },
        props:{
            Allnews: Array
        },
        methods: {
            moment() {
                return moment();
            }
        }
    }
</script>
