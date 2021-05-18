<template>
    <div>
        <layout/>
        <div class="content flex text-center m-0 flex-col">
          <div class="grid grid-cols-3 gap-4 my-20 px-20">
              <!-- foreach for cards -->
            <a href="" target="_blank">
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
    max-width: 25rem;
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
