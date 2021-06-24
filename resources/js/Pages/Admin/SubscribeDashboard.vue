<template>
    <div>
    <layout/>
    <div class="admin p-5 sm:px-10">
        <div class="titles mt-4 mb-2 text-2xl">
            <div class="text-3xl font-bold">Admin Dashboard</div>
                <div class="mt-5 flex">
                    <inertia-link class="active:bg-red-700" href="/admin/userdashboard">
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
                                <th class="py-3 px-6 text-left">Prix</th>
                                <th class="py-3 px-6 text-left">Durée de l'abonnement</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr v-for="plan in plans" :key="plan" class="hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium"><strong>{{ plan.price/100}} €</strong></span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ plan.name }}</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
      </div>
</template>

<script>
import Layout from '../../Layouts/Layout.vue'
    export default {
        components:{
            Layout
        },
        props: {
            plans: Array
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
        width: 800px;
    }
    #adminDashboard {
        width: 800px;
        border-radius: 4px;
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        background-color: white;
        text-align: left;
        }
    }
</style>
