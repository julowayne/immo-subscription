<template>
    <div>
    <layout/>
    <div class="admin p-5 sm:px-10">
        <div class="titles mt-4 mb-2 text-2xl">
            <div class="text-3xl font-bold">Admin Dashboard</div>
                <div class="mt-5 flex justify-between">
                    <span>
                        <inertia-link class="active:transform scale-100 " href="/admin/userdashboard">
                            <span class="mr-16">Utilisateurs</span>
                        </inertia-link>
                        <inertia-link class="mr-16" href="/admin/subscribedashboard">
                            Abonnements
                        </inertia-link>
                        <inertia-link href="/admin/newsdashboard"> 
                            Actualités
                        </inertia-link>
                    </span>
                    <span>
                        <button class="bg-blue-200 text-blue-600 py-1 px-3 rounded focus:outline-none p-3" @click="addUser">Ajouter</button>
                    </span>
                </div>
        </div>
      <div id="adminDashboard">
            <div class="overflow-x-auto">
                <div class="rounded">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="text-gray-600 bg-green-400 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Avatar</th>
                                <th class="py-3 px-6 text-left">Nom</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Siret</th>
                                <th class="py-3 px-6 text-center">Admin</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr v-for="user in users" :key="user" class="hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span>
                                            <img v-if="user.avatar" :src="user.avatar" class="rounded-full" alt="Photo de profil">
                                        </span>
                                    </div>
                                </td>
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
                                    <span v-if="user.isAdmin" class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Oui</span>
                                    <span v-else class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Non</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <button class="focus:outline-none " @click.prevent="editUsers(user)">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        </button>
                                        <button class="focus:outline-none" @click.prevent="destroyUsers(user)">
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
                    <div class="mb-3">
                        <label
                            class="block text-gray-700 text-sm font-normal mb-2"
                            for="active"
                        >
                            Admin
                        </label>
                        <input
                            class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="active"
                            v-model="form.isAdmin"
                            type="checkbox"
                        />
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
<div v-if="editUser" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
    <div class="relative w-1/2 my-6 mx-auto max-w-3xl">
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
        <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
            <h3 class="text-3xl font-semibold">
                Modifier un utilisateur
            </h3>
            <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="editUsers(user)">
            <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
                ×
            </span>
            </button>
        </div>
        <div class="relative p-6 flex-auto">
            <form method="POST" @submit.prevent="updateUser(id)">
                <div class="mb-3">
                    <breeze-label class="block mb-2" for="lastname">
                        Nom
                    </breeze-label>
                    <breeze-input v-model="editForm.lastname" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="lastname" type="text"/>
                </div>
                <div class="mb-3">
                    <breeze-label class="block mb-2" for="firstname">
                        Prénom
                    </breeze-label>
                    <breeze-input v-model="editForm.firstname" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="firstname" type="text"/>
                </div>
                <div class="mb-3">
                    <breeze-label class="block mb-2" for="email">
                        Email
                    </breeze-label>
                    <breeze-input v-model="editForm.email" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="email" type="email"/>
                </div>
                <div class="mb-3">
                    <breeze-label class="block mb-2" for="siret">
                        Siret
                    </breeze-label>
                    <breeze-input v-model="editForm.siret" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="siret" type="text"/>
                </div>
                <div class="mb-3">
                    <breeze-label class="block mb-2" for="password">
                        password
                    </breeze-label>
                    <breeze-input v-model="editForm.password" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="password" type="password"/>
                </div>
                <div class="mb-3">
                    <label
                        class="block text-gray-700 text-sm font-normal mb-2"
                        for="active"
                    >
                        Admin
                    </label>
                    <input
                        class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="active"
                        v-model="editForm.isAdmin"
                        type="checkbox"
                    />
                </div>
                <label class="block mb-2" for="image">
                    Ajouter une photo
                </label>
                <div class="flex items-center bg-grey-lighter mb-4">
                <label class="flex flex-row items-center px-2 py-3 bg-white rounded-lg shadow-lg tracking-wide uppercase border border-gray-200 cursor-pointer hover:bg-green-500 hover:text-white">
                    <svg class="w-8 h-8" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <span class="mt-2 ml-2 text-base leading-normal" v-if="!editForm.avatar">Choisir un fichier</span>
                    <span class="mt-2 ml-2 text-base leading-normal" v-else> {{ editForm.avatar.name }}</span>
                    <input type='file' class="hidden" @input="editForm.avatar = $event.target.files[0]" />
                </label>
                </div>
    
                <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                    <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="editUsers(user)">
                        Annuler
                    </button>
                    <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
                        Modifier
                    </button>
                </div>                 
            </form>
        </div>
        </div>
    </div>
</div>
<div v-if="editUser" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
<!-- modal delete news -->
<div v-if="deleteUsers" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
    <div class="relative w-1/2 my-6 mx-auto max-w-3xl">
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
        <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
            <h3 class="text-3xl font-semibold">
            Supprimer une actualité
            </h3>
            <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="openDeleteModal">
            <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
                ×
            </span>
            </button>
        </div>
        <div class="relative p-6 flex-auto">
            <div class="bg-orange-300 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
            <p class="font-bold text-2xl">Attention</p>
            <p>Voulez-vous vraiment supprimer cette actualité ?<br> Vous n'aurez aucun moyen de la récupérer une fois l'action réalisée.</p>
            </div>
        </div>
        <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
            <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="openDeleteModal">
                Annuler
            </button>
            <form method="DELETE" @submit.prevent="deleteUser()">
                <button class="bg-red-500 hover:bg-red-700 bg-transparent border border-solid border-red-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
                    Supprimer
                </button>
            </form>
        </div>
        </div>
    </div>
</div>
<div v-if="deleteUsers" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
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
            url: null,
            newUser: false,
            editUser: false,
            deleteUsers: false,
            form: {
                firstName: '',
                lastName: '',
                email: '',
                avatar: '',
                siret: '',
                password: '',
                isAdmin: false,
            },
            editForm: {
                firstname: '',
                lastname: '',
                email: '',
                avatar: '',
                siret: '',
                password: '',
                isAdmin: '',
                id: ''
            },
            deleteUserForm: {
                id: ''
            }
        }
    },
    methods:{
        onFileChange(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
        addUser(){
            this.newUser = !this.newUser;
        },
        editUsers(user){
            this.editUser = !this.editUser;
            this.editForm = user
            this.editForm.id = id
        },
        openDeleteModal(){
            this.deleteUsers = !this.deleteUsers;
        },
        destroyUsers(user){
            this.deleteUsers = !this.deleteUsers;
            this.deleteUserForm = user
            this.deleteUserForm.id = id
        },
        deleteUser(){
            this.deleteUsers = !this.deleteUsers;
            const form = useForm({
                id: this.deleteUserForm.id
            })
            form.delete('/admin/userdashboard/delete')
        },
    },
    computed:{
        createUser(){
            this.newUser = !this.newUser;
            const form = useForm({
                firstName: this.form.firstName,
                lastName: this.form.lastName,
                email: this.form.email,
                avatar: this.form.avatar,
                siret: this.form.siret,
                isAdmin: this.form.isAdmin,
                password: this.form.password
            })
            form.post('/admin/userdashboard')
        },
        updateUser(id){
            this.editUser = !this.editUser;
            const form = useForm({
                id: this.editForm.id,
                firstname: this.editForm.firstname,
                lastname: this.editForm.lastname,
                password: this.editForm.password,
                email: this.editForm.email,
                siret: this.editForm.siret,
                avatar: this.editForm.avatar,
                isAdmin: this.editForm.isAdmin
            })
            form.post('/admin/userdashboard/edit')
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
        img {
            margin: auto;
            max-width: 40px;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
        }
    }
</style>
