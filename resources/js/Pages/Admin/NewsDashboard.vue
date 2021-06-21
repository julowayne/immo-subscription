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
                        <button class="bg-blue-200 text-blue-600 py-1 px-3 rounded focus:outline-none" @click="addNews">Ajouter</button>
                    </span>
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
                            <tr v-for="news in Allnews" :key="news" class="hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ news.title }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ moment(news.date).format("DD-MM-YYYY") }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span v-if="news.published" class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Oui</span>
                                        <span v-else class="bg-red-200 text-purple-red py-1 px-3 rounded-full text-xs">Non</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <button class="focus:outline-none " @click.prevent="editNews(news)">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        </button>
                                        <button class="focus:outline-none" @click.prevent="destroyNews(news)">
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
    <!-- modal view news -->
    <div v-if="getNews" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
        <div class="relative w-1/2 my-6 mx-auto max-w-3xl">
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                    Ajouter une actualité
                </h3>
                <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="addNews">
                <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
                    ×
                </span>
                </button>
            </div>
            <div class="relative p-6 flex-auto">
                <form method="POST" @submit.prevent="createNews">
                    <div class="mb-3">
                        <breeze-label class="block mb-2" for="title">
                            Titre
                        </breeze-label>
                        <breeze-input v-model="form.title" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="title" type="text"/>
                    </div>
                    <div class="mb-3">
                        <breeze-label class="block mb-2" for="body">
                            Contenu
                        </breeze-label>
                    <textarea v-model="form.body" class="resize-none w-full shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" name="body" id="body" cols="35" rows="2"></textarea>
                    </div>
                    <label class="block mb-2" for="image">
                        Ajouter une photo
                    </label>
                    <div class="flex items-center bg-grey-lighter mb-4">
                    <label class="flex flex-row items-center px-2 py-3 bg-white rounded-lg shadow-lg tracking-wide uppercase border border-gray-200 cursor-pointer hover:bg-green-500 hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 ml-2 text-base leading-normal" v-if="!form.image">Choisir un fichier</span>
                        <span class="mt-2 ml-2 text-base leading-normal" v-else> {{ form.image.name }}</span>
                        <input type='file' class="hidden" @input="form.image = $event.target.files[0]" />
                    </label>
                    </div>
                    <div class="mb-3">
                        <breeze-label class="block mb-2" for="date">
                            date de publication
                        </breeze-label>
                        <breeze-input v-model="form.date" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="date" type="date" :min="minDateForPicker"/>
                    </div>
                    <div class="mb-3">
                        <label
                            class="block text-gray-700 text-sm font-normal mb-2"
                            for="active"
                        >
                            Publié
                        </label>
                        <input
                            class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="active"
                            v-model="editForm.published"
                            type="checkbox"
                        />
                    </div>
                    <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                        <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="addNews">
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
<div v-if="getNews" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
<!-- modal edit news -->
    <div v-if="editNew" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
        <div class="relative w-1/2 my-6 mx-auto max-w-3xl">
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                    Modifier une actualité
                </h3>
                <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="editNews(news)">
                <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
                    ×
                </span>
                </button>
            </div>
            <div class="relative p-6 flex-auto">
                <form method="POST" @submit.prevent="updateNews()">
                    <div class="mb-3">
                        <breeze-label class="block mb-2" for="title">
                            Titre
                        </breeze-label>
                        <breeze-input v-model="editForm.title" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="title" type="text"/>
                    </div>
                    <div class="mb-3">
                        <breeze-label class="block mb-2" for="body">
                            Contenu
                        </breeze-label>
                    <textarea v-model="editForm.body" class="resize-none w-full shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" name="body" id="body" cols="35" rows="2"></textarea>
                    </div>
                    <label class="block mb-2" for="image">
                        Ajouter une photo
                    </label>
                    <div class="flex items-center bg-grey-lighter mb-4">
                    <label class="flex flex-row items-center px-2 py-3 bg-white rounded-lg shadow-lg tracking-wide uppercase border border-gray-200 cursor-pointer hover:bg-green-500 hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 ml-2 text-base leading-normal" v-if="!editForm.image">Choisir un fichier</span>
                        <span class="mt-2 ml-2 text-base leading-normal" v-else> {{ editForm.image.name }}</span>
                        <input type='file' class="hidden" @input="editForm.image = $event.target.files[0]" />
                    </label>
                    </div>
                    <div class="mb-3">
                        <breeze-label class="block mb-2" for="date">
                            date de publication
                        </breeze-label>
                        <breeze-input v-model="editForm.date" class="h-8 shadow border rounded focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" id="date" type="date" :min="minDateForPicker"/>
                    </div>
                    <div class="mb-3">
                        <label
                            class="block text-gray-700 text-sm font-normal mb-2"
                            for="active"
                        >
                            Publié
                        </label>
                        <input
                            class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="active"
                            v-model="editForm.published"
                            type="checkbox"
                        />
                    </div>
                    <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                        <button class="bg-blue-500 hover:bg-blue-700 bg-transparent border border-solid border-blue-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="editNews(news)">
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
<div v-if="editNew" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
<!-- modal delete news -->
    <div v-if="deleteNew" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
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
                <form method="DELETE" @submit.prevent="deleteNews()">
                    <button class="bg-red-500 hover:bg-red-700 bg-transparent border border-solid border-red-300 text-white font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
                        Supprimer
                    </button>
                </form>
            </div>
            </div>
        </div>
    </div>
<div v-if="deleteNew" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
</div>
</template>

<script>
import Layout from '../../Layouts/Layout.vue'
import { useForm } from "@inertiajs/inertia-vue3"
import BreezeInput from '@/Components/Input'
import BreezeLabel from '@/Components/Label'
import moment from 'moment';
    export default {
        components:{
            Layout,
            BreezeInput,
            BreezeLabel
        },
        props: {
            Allnews: Array,
            singleNews: Object,
            news: Array
        },
        data(){
            return {
                getNews: false,
                editNew: false,
                deleteNew: false,
                minDateForPicker: new Date().toISOString().substr(0, 10),
                form: {
                    title: '',
                    body: '',
                    date: '',
                    image: '',
                    published: false
                },
                editForm: {
                    title: '',
                    body: '',
                    date: '',
                    image: '',
                    published: '',
                    id: ''
                },
                deleteForm: {
                    id: ''
                }
            }
        },
        methods: {
            addNews(){
                this.getNews = !this.getNews;
            },
            editNews(news){
                this.editNew = !this.editNew;
                this.editForm = news
                this.editForm.id = id
            },
            openDeleteModal(){
                this.deleteNew = !this.deleteNew;
            },
            destroyNews(news){
                this.deleteNew = !this.deleteNew;
                this.deleteForm = news
                this.deteleForm.id = id
            },
            moment() {
                return moment();
            },
            deleteNews(){
                this.deleteNew = !this.deleteNew;
                const form = useForm({
                    id: this.deleteForm.id
                })
                form.delete('/admin/newsdashboard/delete')
            },
            },
            computed :{
                createNews(){
                    this.getNews = !this.getNews;
                    const form = useForm({
                        title: this.form.title,
                        body: this.form.body,
                        date: this.form.date,
                        image: this.form.image,
                        published: this.form.published
                })
                form.post('/admin/newsdashboard')
                },
                updateNews(){
                    this.editNew = !this.editNew;
                    const form = useForm({
                        title: this.editForm.title,
                        body: this.editForm.body,
                        date: this.editForm.date,
                        image: this.editForm.image,
                        published: this.editForm.published,
                        id: this.editForm.id
                })
                form.post('/admin/newsdashboard/edit')
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
input[type="radio"] + label span {
    transition: background .2s,
    transform .2s;
}

input[type="radio"] + label span:hover,
input[type="radio"] + label:hover span{
    transform: scale(1.2);
} 

input[type="radio"]:checked + label span {
    background-color: #20c997;
    box-shadow: 0px 0px 0px 2px white inset;
}

input[type="radio"]:checked + label{
    color: #20c997;
}
</style>
