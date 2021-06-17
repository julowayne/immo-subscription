<template>
    <div>
        <layout/>
        <div class="content flex text-center m-2 flex-col">
          <div class="xl:grid xl:grid-cols-3 xl:gap-6 xl:my-10 xl:px-20 md:grid md:grid-cols-2 md:gap-4 md:my-10 md:px-20 sm:grid sm:grid-cols-2 sm:gap-4 sm:my-10 sm:px-20">
              <!-- foreach for cards -->
            <inertia-link href="/actualites/1">
                <div class="news rounded overflow-hidden shadow-lg my-2">
                    <img src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
                    <div class="px-4 py-2">
                        <div class="font-bold text-xl mb-2 text-left">L'immobilier en 2021</div>
                        <p class="text-grey-darker text-base text-left">
                            Comment vont évoluer les prix de l'immobilier en 2021 en France ?
                        </p>
                    </div>
                    <div class="px-4 py-2 text-left">
                        <span class="bg-grey-lighter rounded-full text-sm font-semibold text-grey-darker">5/17/2021</span>
                        <span class="bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">Jules TD</span>
                        <span class="ml-20 border-b border-gray-400"><inertia-link href="actualites/1">Lire la suite</inertia-link></span>
                    </div>
                </div>
            </inertia-link>
            <!-- endforeach for cards -->
            <a href="">
                <div class="news rounded overflow-hidden shadow-lg my-2">
                    <img src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
                    <div class="px-4 py-2">
                        <div class="font-bold text-xl mb-2 text-left">L'immobilier en 2021</div>
                        <p class="text-grey-darker text-base text-left">
                            Comment vont évoluer les prix de l'immobilier en 2021 en France ?
                        </p>
                    </div>
                    <div class="px-4 py-2 text-left">
                        <span class="bg-grey-lighter rounded-full text-sm font-semibold text-grey-darker">5/17/2021</span>
                        <span class="bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">Jules TD</span>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="news rounded overflow-hidden shadow-lg my-2">
                    <img src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
                    <div class="px-4 py-2">
                        <div class="font-bold text-xl mb-2 text-left">L'immobilier en 2021</div>
                        <p class="text-grey-darker text-base text-left">
                            Comment vont évoluer les prix de l'immobilier en 2021 en France ?
                        </p>
                    </div>
                    <div class="px-4 py-2 text-left">
                        <span class="bg-grey-lighter rounded-full text-sm font-semibold text-grey-darker">5/17/2021</span>
                        <span class="bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">Jules TD</span>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="news rounded overflow-hidden shadow-lg my-2">
                    <img src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
                    <div class="px-4 py-2">
                        <div class="font-bold text-xl mb-2 text-left">L'immobilier en 2021</div>
                        <p class="text-grey-darker text-base text-left">
                            Comment vont évoluer les prix de l'immobilier en 2021 en France ?
                        </p>
                    </div>
                    <div class="px-4 py-2 text-left">
                        <span class="bg-grey-lighter rounded-full text-sm font-semibold text-grey-darker">5/17/2021</span>
                        <span class="bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">Jules TD</span>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="news rounded overflow-hidden shadow-lg my-2">
                    <img src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
                    <div class="px-4 py-2">
                        <div class="font-bold text-xl mb-2 text-left">L'immobilier en 2021</div>
                        <p class="text-grey-darker text-base text-left">
                            Comment vont évoluer les prix de l'immobilier en 2021 en France ?
                        </p>
                    </div>
                    <div class="px-4 py-2 text-left">
                        <span class="bg-grey-lighter rounded-full text-sm font-semibold text-grey-darker">5/17/2021</span>
                        <span class="bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">Jules TD</span>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="news rounded overflow-hidden shadow-lg my-2">
                    <img src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
                    <div class="px-4 py-2">
                        <div class="font-bold text-xl mb-2 text-left">L'immobilier en 2021</div>
                        <p class="text-grey-darker text-base text-left">
                            Comment vont évoluer les prix de l'immobilier en 2021 en France ?
                        </p>
                    </div>
                    <div class="px-4 py-2 text-left">
                        <span class="bg-grey-lighter rounded-full text-sm font-semibold text-grey-darker">5/17/2021</span>
                        <span class="bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">Jules TD</span>
                    </div>
                </div>
            </a>
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
