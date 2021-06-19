<template>
    <div>
    <layout/>
    <div class="admin p-5 sm:px-10">
        <div class="titles mt-4 mb-2 text-2xl">
            <div class="text-3xl font-bold">Admin Dashboard</div>
                <div class="mt-5 flex">
                    <inertia-link class="mr-16" href="/admin/userdashboard">
                        Utilisateurs
                    </inertia-link >
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
                                <th class="py-3 px-6 text-left">Nom</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Siret</th>
                                <th class="py-3 px-6 text-center">Status</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr v-for="user in users" :key="user" class="hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ user.lastname }} - {{ user.firstname }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ user.email }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ user.siret }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <button class="focus:outline-none" @click="addUser">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        </button>
                                        <button class="focus:outline-none " @click.prevent="editNews">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        </button>
                                        <button class="focus:outline-none" @click.prevent="deleteNews">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <div v-if="newUser" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
        <div class="relative w-1/2 my-6 mx-auto max-w-3xl">
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                Ajouter un utilisateur
                </h3>
                <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="newUser">
                <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
                    ×
                </span>
                </button>
            </div>
            <div class="relative p-6 flex-auto">
                <form method="POST" @submit.prevent="createUser">
                    <div class="mb-3">
                        <breeze-label class="block mb-2" for="lastname">
                            Nom
                        </breeze-label>
                        <breeze-input v-model="form.lastName" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="lastname" type="text"/>
                    </div>
                    <div class="mb-3">
                        <breeze-label class="block mb-2" for="firstname">
                            Prénom
                        </breeze-label>
                        <breeze-input v-model="form.firstName" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="firstname" type="text"/>
                    </div>
                    <div class="mb-3">
                        <breeze-label class="block mb-2" for="email">
                            Email
                        </breeze-label>
                        <breeze-input v-model="form.email" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="email" type="email"/>
                    </div>
                    <div class="mb-3">
                        <breeze-label class="block mb-2" for="siret">
                            Siret
                        </breeze-label>
                        <breeze-input v-model="form.siret" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="siret" type="text"/>
                    </div>
                    <div class="mb-3">
                        <breeze-label class="block mb-2" for="password">
                            password
                        </breeze-label>
                        <breeze-input v-model="form.password" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="password" type="password"/>
                    </div>
                    <label class="block mb-2" for="image">
                        Ajouter une photo
                    </label>
                    <div class="flex items-center bg-grey-lighter mb-4">
                    <label class="flex flex-row items-center px-2 py-3 bg-white rounded-lg shadow-lg tracking-wide uppercase border border-gray-200 cursor-pointer hover:bg-green-500 hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 ml-2 text-base leading-normal" v-if="!form.avatar">Choisir un fichier</span>
                        <span class="mt-2 ml-2 text-base leading-normal" v-else> {{ form.avatar.name }}</span>
                        <input type='file' class="hidden" @input="form.avatar = $event.target.files[0]" />
                    </label>
                    </div>
     
                    <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                        <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="newUser">
                            Annuler
                        </button>
                        <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
                            Ajouter
                        </button>
                    </div>                 
                </form>
            </div>
            </div>
        </div>
    </div>
<div v-if="newUser" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
</div>
</template>

<script>
import Layout from '../../Layouts/Layout.vue'
import { useForm } from "@inertiajs/inertia-vue3"
import BreezeInput from '@/Components/Input'
import BreezeLabel from '@/Components/Label'

export default {
    components:{
        Layout,
        BreezeInput,
        BreezeLabel
    },
    props: {
        users: Array
    },
    data(){
        return {
            newUser: false,
            form: {
                firstName: '',
                lastName: '',
                email: '',
                avatar: '',
                siret: '',
                password: ''
            }
        }
    },
    methods:{
        addUser(){
            this.newUser = !this.newUser;
        },
    },
    computed :{
        createUser(){
            this.newUser = !this.newUser;
            const form = useForm({
                firstName: this.form.firstName,
                lastName: this.form.lastName,
                email: this.form.email,
                avatar: this.form.avatar,
                siret: this.form.siret,
                password: this.form.password
        })
        form.post('/admin/userdashboard')
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
