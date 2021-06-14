<template>
    <div>
        <layout/>
        <div class="content flex text-center m-0 flex-col">
            <div class="title mt-5 mb-3">
                <h2>Qui est Alfred ?</h2>
            </div>
            <div id="service" class="sm:px-24">
                <div>
                    Alfred est un service qui propose aux agences immobilières de pouvoir<br>
                    retrouver les dossiers des personnes souhaitant louer un bien qu'ils proposent.
                </div>
                <div>
                    <inertia-link href="/services">
                        <button type="submit" class="md:w-1/4 sm:w-2/4 mt-3 bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                            Découvrir les offres
                        </button>
                    </inertia-link>
                </div>
            </div>
            <!-- Foreach for cards -->
            <div class="xl:flex xl:px-20 mt-8 lg:grid lg:grid-cols-3 lg:gap-6 lg:px-44 md:grid md:grid-cols-2 md:gap-6 md:px-24 md:pb-4 sm:gap-6 sm:grid sm:grid-cols-2">
                <div class="card rounded overflow-hidden shadow-lg xl:my-2 lg:my-2">
                    <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
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
                <!-- endforeach for cards  -->
                <div class="card rounded overflow-hidden shadow-lg my-2">
                    <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
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
                <div class="card rounded overflow-hidden shadow-lg my-2">
                    <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
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
                <div class="card rounded overflow-hidden shadow-lg my-2">
                    <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
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
                <div class="card rounded overflow-hidden shadow-lg my-2">
                    <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
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
            </div>

        </div>
    </div>
</template>

<style lang="scss">
    body {
        background-color: #e9ecef;
    }
    .content {
        height: 90vh;
        .title {
            h2 {
                font-size: 2rem;
                font-style: italic;
                font-weight: lighter;
                color: grey;
            }
    }
    #service {
        div {
            font-size: 1.5rem;  
        }
    }
    .card {
        max-width: 15rem;
        margin: auto;
        }
    }
    //mediaqueries :
    // @media (min-width: 1024px) { 
    //     .card {
    //         max-width: 15rem !important;
    //         margin: O !important;
    //     }
    //  }
</style>

<script>
import Layout from '../Layouts/Layout.vue'
    export default {
        components:{
            Layout
        }
    }
</script>
