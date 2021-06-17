<template>
    <div>
    <layout/>
    <div class="admin p-5 sm:px-10">
        <div class="titles mt-4 mb-2 text-2xl">
            <div class="text-3xl font-bold">Admin Dashboard</div>
                <div class="mt-5 flex">
                    <inertia-link class="active:transform scale-100 " href="/admin/userdashboard">
                        <span class="mr-16">Utilisateurs</span>
                    </inertia-link>
                    <inertia-link class="mr-16" href="/admin/subscribedashboard">
                        Abonnements
                    </inertia-link>
                    <inertia-link href="/admin/newsdashboard"> 
                        Actualités
                    </inertia-link>
                </div>
        </div>
      <div id="adminDashboard">
            <div class="overflow-x-auto">
                <div class="rounded">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="text-gray-600 bg-green-400 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Titre</th>
                                <th class="py-3 px-6 text-left">Date de publication</th>
                                <th class="py-3 px-6 text-left">Publiée</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">test</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>test</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>test</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <button @click="addNews">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        </button>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div v-if="showSubModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
        <div class="relative w-1/2 my-6 mx-auto max-w-3xl">
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                Voir l'actualité
                </h3>
                <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="addNews">
                <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
                    ×
                </span>
                </button>
            </div>
            <div class="relative p-6 flex-auto">
                <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
                N'oubliez pas: vous pouvez annuler/changer votre abonnement a tout moment
                </p>
                <form action="" method="post" @submit.prevent="submitCheckout">
                <div class="flex items-center justify-center mr-4 mb-4">
                <input id="radio1" type="radio" name="plan" class="hidden" />
                <label for="radio1" class="flex items-center cursor-pointer text-xl font-bold">
                <span class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
                1 mois ( 9.90€)</label>
                </div>
                <div class="flex items-center justify-center mr-4 mb-4">
                <input id="radio2" type="radio" name="plan" class="hidden" />
                <label for="radio2" class="flex items-center cursor-pointer text-xl font-bold">
                <span class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
                3 mois (27.90€)</label>
                </div>
                <div class="flex items-center justify-center mr-4 mb-4">
                <input id="radio3" type="radio" name="plan" class="hidden" />
                <label for="radio3" class="flex items-center cursor-pointer text-xl font-bold">
                <span class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
                6 mois (49.90€)</label>
            </div>
            <div class="mb-3">
                <label for="name" class="block">Nom</label>
                <input class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="name" type="text">
            </div>
            </form>
            </div>
            </div>
        </div>
    </div>
<div v-if="showSubModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
</div>
</template>

<script>
import Layout from '../../Layouts/Layout.vue'
    export default {
        components:{
            Layout
        },
        data(){
            return {
                showSubModal: false,
            }
        },
        methods: {
            addNews(){
                this.showSubModal = !this.showSubModal;
            }
        }
    }
</script>


<style lang="scss">
    body {
        background-color: #e9ecef;
    }
    .admin {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 4px;
    .titles {
        color: #20c997;
        justify-content: start;
        margin-top: 1rem;
        width: 1000px;
    }
    #adminDashboard {
        width: 1000px;
        border-radius: 4px;
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        background-color: white;
        text-align: left;
        }
    }
</style>
