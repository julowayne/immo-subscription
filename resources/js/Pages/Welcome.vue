<template>
    <div>
        <layout/>
        <div class="content flex text-center m-0 flex-col">
            <div class="title mt-5 mb-3">
                <h2>Qui est Alfred ?</h2>
            </div>
            <div id="service" class="sm:px-24 font-bold">
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
            <div v-if="Allnews">
                <div class="xl:flex xl:px-20 mt-8 lg:grid lg:grid-cols-3 lg:gap-6 lg:px-44 md:grid md:grid-cols-2 md:gap-6 md:px-24 md:pb-4 sm:gap-6 sm:grid sm:grid-cols-2">
                    <inertia-link v-for="news in Allnews" :key="news" :href="`/actualites/${news.id}`">
                        <div class="card rounded overflow-hidden shadow-lg xl:my-2 lg:my-2">
                            <img :src="news.image" class="mx-auto" alt="Sunset in the mountains">
                            <div class="px-4 py-2">
                                <div class="font-bold text-xl mb-2 text-left">{{ news.title }}</div>
                                <p v-html="news.body" class="text-grey-darker text-base text-left">
                                </p>
                                <span class="flex justify-start border-gray-400"><inertia-link :href="`/actualites/${news.id}`"> <strong>Lire la suite</strong></inertia-link></span>
                            </div>
                            <div class="px-4 py-2 flex justify-between">
                                <span class="bg-grey-lighter rounded-full text-sm font-semibold text-grey-darker">{{ moment(news.date).format("DD-MM-YYYY") }}</span>
                            </div>
                        </div>
                    </inertia-link>
                </div>
            </div>
            <div v-else class="p-4 text-2xl font-bold">
                Il n'y a pas d'actualités pour le moment. <br> Demandez en via <inertia-link id="contact" href="/contact"> le formulaire de contact</inertia-link> ou allez directement en ajouter si vous êtes admin !
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
        max-width: 22rem;
        margin: auto;
        background-color: #f8f9fa;
        }
    }
    #contact {
      color: #20c997;
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
            },
        }
    }
</script>
